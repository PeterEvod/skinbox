/*
 *
 * SW_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function floris_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.floris-radio-img-'+labelclass).removeClass('floris-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('floris-radio-img-selected');
}//function