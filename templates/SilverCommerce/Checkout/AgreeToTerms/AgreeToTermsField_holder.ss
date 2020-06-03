<% require css("silvercommerce/checkout-agree-to-terms: client/css/tingle.min.css") %>
<% require css("silvercommerce/checkout-agree-to-terms: client/css/AgreeToTermsField.css") %>
<% require javascript("silvercommerce/checkout-agree-to-terms: client/js/tingle.min.js") %>
<% require javascript("silvercommerce/checkout-agree-to-terms: client/js/AgreeToTermsField.js") %>

<div id="$HolderID" class="field alert alert-danger pt-4 my-3<% if extraClass %> $extraClass<% end_if %>">
	$Field

    <label class="right" for="$ID">
		<%t SilverCommerce\Checkout\AgreeToTerms\AgreeToTermsField.Title 'I agree to the Terms and Conditions of sale' %>
	</label>

	<a class="agree-terms-modal-link">
		<%t SilverCommerce\Checkout\AgreeToTerms\AgreeToTermsField.ViewTermsAndConditions 'View Terms and Conditions' %>
	</a>

	<% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
	<% if $Description %><span class="description">$Description</span><% end_if %>

	<div class="content-modal" data-modal="true" style="display: none;">{$PopupContent}</div>
</div>
