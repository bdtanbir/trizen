

<div class="card-item blog-card">
	<div class="card-img">
        <?php the_post_thumbnail(); ?>
		<div class="post-format icon-element">
			<i class="la la-photo"></i>
		</div>
		<div class="card-body">
            <?php
                the_category();
                if(!empty(get_the_title())) {
            ?>
                <h3 class="card-title line-height-26">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
            <?php } ?>
			<p class="card-meta">
				<span class="post__date"> <?php the_time( get_option( 'date_format' ) ); ?></span>
				<span class="post-dot"></span>
				<span class="post__time"><?php esc_html_e('5 Mins read', 'trizen'); ?></span>
			</p>
		</div>
	</div>
	<div class="card-footer d-flex align-items-center justify-content-between">
		<div class="author-content d-flex align-items-center">
			<div class="author-img">
                <?php echo get_avatar(get_the_ID()); ?>
			</div>
			<div class="author-bio">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author__title">
                    <?php echo get_the_author(); ?>
                </a>
			</div>
		</div>
		<div class="post-share">
			<ul>
				<li>
					<i class="la la-share icon-element"></i>
					<ul class="post-share-dropdown d-flex align-items-center">
						<li><a href="//facebook.com/sharer.php?u=<?php the_permalink(); ?>"><i class="lab la-facebook-f"></i></a></li>
						<li><a href="//twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title();  ?>"><i class="lab la-twitter"></i></a></li>
						<li><a href="//plus.google.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="lab la-google-plus"></i></a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
