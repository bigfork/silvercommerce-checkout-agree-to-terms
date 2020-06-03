<?php

namespace SilverCommerce\Checkout\AgreeToTerms;

use SilverStripe\Forms\CheckboxField;

/**
 * Special type of Checkbox that loads provided terms and conditions into a modal
 */
class AgreeToTermsField extends CheckboxField
{
    /**
     * Content to be loaded into the terms modal
     *
     * @var string
     */
    protected $popup_content = null;

    /**
     * Get content to be loaded into the terms modal
     *
     * @return  string
     */ 
    public function getPopupContent()
    {
        return $this->popup_content;
    }

    /**
     * Set content to be loaded into the terms modal
     *
     * @param  string  $popup_content  Content to be loaded into the terms modal
     *
     * @return  self
     */ 
    public function setPopupContent(string $popup_content)
    {
        $this->popup_content = $popup_content;
        return $this;
    }
}