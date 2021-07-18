<?php
$start = get('start',"");
$end   = get('end',"");
$date  = get('date', date('d/m/Y h:i a'). '-'. date('d/m/Y h:i a', strtotime('+1 day')));
$has_icon = (isset($has_icon))? $has_icon: false;
if(!empty($start)){
	$starttext = $start;
	$start = $start;
} else {
	$starttext = getDateFormatMomentText();
	$start = "";
}

if(!empty($end)){
	$endtext = $end;
	$end = $end;
} else {
	$endtext = getDateFormatMomentText();
	$end = "";
}
?>


<div class="input-box form-date-search position-relative" data-format="<?php echo getDateFormatMoment() ?>">
    <div class="date-wrapper clearfix">
        <div class="check-in-wrapper">
            <label class="label-text">
				<?php esc_html_e('Check In Out', 'trizen'); ?>
            </label>
            <div class="d-flex form-group form-control">
                <span class="la la-calendar form-icon"></span>
                <div class="render check-in-render"><?php echo esc_html($starttext); ?></div><span>-</span><div class="render check-out-render"><?php echo esc_html($endtext); ?></div>
            </div>
        </div>
    </div>
    <input type="hidden" class="check-in-input" value="<?php echo esc_attr($start) ?>" name="start">
    <input type="hidden" class="check-out-input" value="<?php echo esc_attr($end) ?>" name="end">
    <input type="text" class="check-in-out position-absolute invisible" value="<?php echo esc_attr($date); ?>" name="date">
</div>