<?php

namespace SilverCommerce\Checkout\AgreeToTerms;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataExtension;

/**
 * Additional extension that adds ability to link to a terms page, if the CMS is installed
 */
class SiteConfigCMSExtension extends DataExtension
{
    private static $has_one = [
        'CheckoutTermsPage' => SiteTree::class
    ];

    private static $field_labels = [
        'CheckoutTermsPage' => 'Link to existing Terms and Conditions'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Shop.CheckoutSettings',
            TreeDropdownField::create(
                'CheckoutTermsPageID',
                $this->getOwner()->fieldLabel('CheckoutTermsPage'),
                SiteTree::class
            )
        );
    }
}