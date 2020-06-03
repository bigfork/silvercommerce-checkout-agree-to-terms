<?php

namespace SilverCommerce\Checkout\AgreeToTerms;

use SilverStripe\Forms\Form;
use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * Add the agreed to terms checkbox if setup in siteconfig
 */
class CheckoutExtension extends Extension
{
    /**
     * Can the Agree to terms checkbox be added to the customer form?
     *
     * @return boolean 
     */
    public function requireAgreeToTerms()
    {
        $config = SiteConfig::current_site_config();

        if (!$config->CheckoutRequireTerms) {
            return false;
        }
        
        if (!empty($config->CheckoutTermsContent)) {
            return true;
        }
        
        if (isset($config->CheckoutTermsPageID) && $config->CheckoutTermsPage()->exists()) {
            return true;
        }

        return false;
    }

    /**
     * Add required agree to terms field to customer form
     *
     * @param Form $form
     */
    public function updateCustomerForm(Form $form)
    {
        $config = SiteConfig::current_site_config();

        if ($this->getOwner()->requireAgreeToTerms()) {
            $fields = $form->Fields();
            $validator = $form->getValidator();
            $content = null;

            if (!empty($config->CheckoutTermsContent)) {
                $content = $config->CheckoutTermsContent;
            }

            if (empty($content) && isset($config->CheckoutTermsPageID)) {
                $content = $config->CheckoutTermsPage()->Content;
            }

            $fields->insertAfter(
                'DuplicateDelivery',
                AgreeToTermsField::create(
                    'AgreedToTerms',
                    _t(
                        __CLASS__ . '.AgreedToTermsTitle',
                        'I agree to the Terms and Conditions'
                    )
                )->setForm($form)
                ->setPopupContent($content)
            );

            $validator->addRequiredField('AgreedToTerms');
            $form->setValidator($validator);
        }
    }
}
