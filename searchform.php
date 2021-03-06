

<div class="contact-form-action search-input-form">
    <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-box">
            <div class="form-group mb-0">
                <input class="form-control pl-3" type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__('Type your keywords...', 'trizen'); ?>">
                <button class="search-btn" type="submit"><i class="la la-search"></i></button>
            </div>
        </div>
    </form>
</div>

