<?php

namespace SilverCommerce\Checkout\AgreeToTerms;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

/**
 * Basic extension that adds terms content field to settings
 */
class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'CheckoutRequireTerms' => 'Boolean',
        'CheckoutTermsContent' => 'HTMLText'
    ];

    private static $field_labels = [
        'CheckoutRequireTerms' => 'Require Customer to Agree to Terms',
        'CheckoutTermsContent' => 'Terms and Conditions Content'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab(
            'Root.Shop.CheckoutSettings',
            [
                $this
                    ->getOwner()
                    ->dbObject('CheckoutRequireTerms')
                    ->scaffoldFormField()
                    ->setTitle($this->getOwner()->fieldLabel('CheckoutRequireTerms'))
                    ->setDescription(
                        _t(
                            __CLASS__ . '.CheckoutRequireTermsDescription',
                            'You must also provide terms content or select a page (if CMS installed)'
                        )
                    ),
                $this
                    ->getOwner()
                    ->dbObject('CheckoutTermsContent')
                    ->scaffoldFormField()
                    ->setTitle($this->getOwner()->fieldLabel('CheckoutTermsContent'))
            ]
        );
    }
}