jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
   // $('article[data-permalink]').socialButtons(config);

	function initProductChild () {
		$('.select_child').click(function() {
			$('.select_child').removeClass('check');
			$(this).addClass('check');
			
			var id = $(this).find('input[name="select_child"]').val();
			$('input[name="virtuemart_product_id[]"]').val(id);
			$('input[name="pid"]').val(id);
			
			var price = $(this).closest('.uk-child-products').find('span.PricesalesPrice').html();
			$('.uk-product-full-price span.PricesalesPrice').html(price);
		});
	}
	
	initProductChild();
});
