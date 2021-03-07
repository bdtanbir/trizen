/*====== Quantity ========*/
jQuery(document).on('click', '.qtyDec, .qtyInc', function () {
    var $button = jQuery(this);
    numberButtonFunc($button);
});

function numberButtonFunc($button) {
    var oldValue = $button.parent().find("input").val();
    var total = 0;
    jQuery('input[type="text"]').each(function () {
        total += parseInt(jQuery(this).val());
    });
    var newVal;
    if ($button.hasClass('qtyInc')) {
        newVal = parseFloat(oldValue) + 1;
    } else {
        if (oldValue > 0) {
            newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }
    $button.parent().find("input").val(newVal).trigger('change');
}

jQuery('.gty-container').each(function () {
    var parent = jQuery(this);
    // Adult quantity number
    jQuery('input[name="adult_number"]', parent).change(function () {
        var adults = parseInt(jQuery(this).val());
        var html = adults;
        if (typeof adults == 'number') {
            if (adults < 2) {
                html = adults + ' ' + jQuery('.adult', parent).data('text');
            } else {
                html = adults + ' ' + jQuery('.adult', parent).data('text-multi');
            }
        }
        jQuery('.adult', parent).html(html);
    });
    jQuery('input[name="adult_number"]', parent).trigger('change');

    // Children quantity number
    jQuery('input[name="child_number"]', parent).change(function () {
        var children = parseInt(jQuery(this).val());
        var html = children;
        if (typeof children == 'number') {
            if (children < 2) {
                html = children + ' ' + jQuery('.children', parent).data('text');
            } else {
                html = children + ' ' + jQuery('.children', parent).data('text-multi');
            }
        }
        jQuery('.children', parent).html(html);
    });
    jQuery('input[name="child_number"]', parent).trigger('change');


});