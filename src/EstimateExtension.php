<?php

namespace SilverCommerce\Checkout\AgreeToTerms;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

/**
 * Basic extension that adds terms content field to settings
 */
class EstimateExtension extends DataExtension
{
    private static $db = [
        'AgreedToTerms' => 'Boolean'
    ];

    private static $field_labels = [
        'AgreedToTerms' => 'Customer Agreed To Terms'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Customer',
            $this
                ->getOwner()
                ->dbObject('AgreedToTerms')
                ->scaffoldFormField()
                ->setTitle($this->getOwner()->fieldLabel('AgreedToTerms'))
        );
    }
}