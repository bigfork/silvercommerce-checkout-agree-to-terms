<% require css("i-lateral/silverstripe-gallery: node_modules/tingle.js/dist/tingle.min.css") %>
<% require javascript("i-lateral/silverstripe-gallery: node_modules/tingle.js/dist/tingle.min.js") %>

<div id="$HolderID" class="field alert alert-warning pt-4 my-3<% if extraClass %> $extraClass<% end_if %>">
	$Field

    <label class="right" for="$ID">
		<%t SilverCommerce\Checkout\AgreeToTerms\AgreeToTermsField.Title 'I agree to the' %>
		<a href="{$TermsLink}" class="agree-terms-modal-link">
			<%t SilverCommerce\Checkout\AgreeToTerms\AgreeToTermsField.TermsAndConditions 'Terms and Conditions' %>
		</a>
	</label>

	<% if $Message %><span class="message $MessageType">$Message</span><% end_if %>
	<% if $Description %><span class="description">$Description</span><% end_if %>

	<div class="content-modal" data-modal="true" style="display: none;">{$PopupContent}</div>
</div>
