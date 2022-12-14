function cnb_setup_legacy() {
    // Option to Hide Icon is only visible when the full width button is selected
    const radioValue = jQuery("input[name='cnb[appearance]']:checked").val();
    const textValue = jQuery("input[name='cnb[text]']").val();
    if(radioValue !== 'full' && radioValue !== 'tfull') {
        jQuery('#hideIconTR').hide();
    } else if(textValue.length < 1) {
        jQuery('#hideIconTR').hide();
    }
    jQuery('input[name="cnb[appearance]"]').on("change",function(){
        const radioValue = jQuery("input[name='cnb[appearance]']:checked").val();
        const textValue = jQuery("input[name='cnb[text]']").val();
        if(radioValue !== 'full' && radioValue !== 'tfull') {
            jQuery('#hideIconTR').hide();
        } else if(textValue.length > 0 ) {
            jQuery('#hideIconTR').show();
        }
    });
}

jQuery( function() {
    cnb_setup_legacy();
})