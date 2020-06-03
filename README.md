# SilverCommerce Agree To Terms Checkbox

Adds an "Agree To Terms" checkbox (that is required) to the SilverCommerce checkout process and
saves the result against the order.

## Install

Install via composer:

    composer require silvercommerce/checkout-agree-to-terms

## Usage

Setup is pretty simple. In your SilverStripe admin, visit SiteConfig (Settings) > Shop Tab.

Expand "Checkout Settings" and then tick "Require Customer to Agree to Terms"

You must then provide the terms and conditions content in the field below OR (if the CMS is installed)
you can link to a terms and conditions page.

The content will then automatically be loaded into a modal on the checkout page.

Finally, you can review if a user has checked the option by checking the "Customer" tab on an order.