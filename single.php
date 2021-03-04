<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package trizen
 */

get_header();
get_template_part('inc/breadcrumb');
the_post();
?>

	<section class="card-area section--padding blog-details-wrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="card-item blog-card blog-card-layout-2 blog-single-card mb-5">
						<?php if(!empty(get_the_post_thumbnail())) { ?>
							<div class="card-img before-none">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php } ?>
						<div class="card-body px-0 pb-0">
							<?php the_category(); ?>
							<p class="card-meta pb-3">
								<span class="post__author"><?php trizen_posted_by(); ?></span>
								<span class="post-dot"></span>
								<span class="post__date"> <?php the_time( get_option( 'date_format' ) ); ?></span>
								<span class="post-dot"></span>
								<span class="post__time"><?php comments_popup_link('0 Comment', '1 Comment', '% Comments', 'comments-link', ' Comments off'); ?></span>
							</p>
							<div class="section-block"></div>
							<?php
							the_content();

							wp_link_pages(array(
								'before'           => '<div class="page-links">',
								'after'            => '</div>',
								'nextpagelink'     => __('<i class="la la-angle-double-right"></i>', 'trizen'),
								'previouspagelink' => __('<i class="la la-angle-double-left"></i>', 'trizen'),
							));
							?>
							<div class="section-block"></div>
							<div class="post-tag-wrap d-flex align-items-center justify-content-between py-4">
								<ul class="tag-list">
									<?php the_tags('<li>', ' ', '</li> '); ?>
								</ul>
								<?php get_template_part('template-parts/blog/social-share'); ?>
							</div>
							<div class="section-block"></div>
							<div class="post-navigation d-flex justify-content-between py-4">
								<?php previous_post_link('%link', '<i class="la la-arrow-left mr-2"></i> %title'); ?>
								<?php next_post_link('%link', '%title <i class="la la-arrow-right ml-2"></i>'); ?>
							</div>
							<div class="section-block"></div>
							<div class="post-author-wrap">
								<div class="author-content pt-5">
									<div class="d-flex">
										<div class="author-img author-img-md mr-4">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
												<?php echo get_avatar(get_the_ID()); ?>
											</a>
										</div>
										<div class="author-bio">
											<h4 class="author__title">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
													<?php echo get_the_author(); ?>
												</a>
											</h4>
											<span class="author__meta">
												<?php esc_html_e('About the Author', 'trizen'); ?>
											</span>
											<?php if(!empty(get_the_author_meta('description'))) { ?>
												<p class="author__text pt-1">
													<?php echo get_the_author_meta('description'); ?>
												</p>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php get_template_part('template-parts/blog/related-blog-post'); ?>
					<div class="section-block"></div>
					<div class="comment-forum pt-5">
						<?php if( comments_open() ) { ?>
							<h3 class="title">
								<?php comments_popup_link('0 Comment', '1 Comment', '% Comments', 'comments-link', 'Comments are off for this post'); ?>
							</h3>
							<div class="form-box-test mt-5">
								<?php
								comments_template();
								?>
							</div>
						<?php } else { ?>
							<h3 class="title">
								<?php comments_popup_link('0 Comment', '1 Comment', '% Comments', 'comments-link', 'Comments are off for this post'); ?>
							</h3>
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="sidebar mb-0">
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">Search Post</h3>
							<div class="contact-form-action">
								<form action="#">
									<div class="input-box">
										<div class="form-group mb-0">
											<input class="form-control pl-3" type="text" placeholder="Type your keywords...">
											<button class="search-btn" type="submit"><i class="la la-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">Categories</h3>
							<div class="sidebar-category">
								<div class="custom-checkbox">
									<input type="checkbox" id="cat1">
									<label for="cat1">All <span class="font-size-13 ml-1">(55)</span></label>
								</div>
								<div class="custom-checkbox">
									<input type="checkbox" id="cat2">
									<label for="cat2">Active Adventure Tours <span class="font-size-13 ml-1">(8)</span></label>
								</div>
								<div class="custom-checkbox">
									<input type="checkbox" id="cat3">
									<label for="cat3">Ecotourism <span class="font-size-13 ml-1">(5)</span></label>
								</div>
								<div class="custom-checkbox">
									<input type="checkbox" id="cat4">
									<label for="cat4">Escorted Tours <span class="font-size-13 ml-1">(2)</span></label>
								</div>
								<div class="custom-checkbox">
									<input type="checkbox" id="cat5">
									<label for="cat5">Group Tours <span class="font-size-13 ml-1">(11)</span></label>
								</div>
								<div class="custom-checkbox">
									<input type="checkbox" id="cat6">
									<label for="cat6">Ligula <span class="font-size-13 ml-1">(3)</span></label>
								</div>
								<div class="collapse" id="categoryMenu">
									<div class="custom-checkbox">
										<input type="checkbox" id="cat7">
										<label for="cat7">Family Tours <span class="font-size-13 ml-1">(4)</span></label>
									</div>
									<div class="custom-checkbox">
										<input type="checkbox" id="cat8">
										<label for="cat8">City Trips <span class="font-size-13 ml-1">(5)</span></label>
									</div>
									<div class="custom-checkbox">
										<input type="checkbox" id="cat9">
										<label for="cat9">National Parks Tours <span class="font-size-13 ml-1">(3)</span></label>
									</div>
									<div class="custom-checkbox">
										<input type="checkbox" id="cat10">
										<label for="cat10">Vacations <span class="font-size-13 ml-1">(3)</span></label>
									</div>
									<div class="custom-checkbox">
										<input type="checkbox" id="cat11">
										<label for="cat11">Early booking <span class="font-size-13 ml-1">(7)</span></label>
									</div>
									<div class="custom-checkbox">
										<input type="checkbox" id="cat12">
										<label for="cat12">Last minute <span class="font-size-13 ml-1">(2)</span></label>
									</div>
								</div><!-- end collapse -->
								<a class="btn-text" data-toggle="collapse" href="#categoryMenu" role="button" aria-expanded="false" aria-controls="categoryMenu">
									<span class="show-more">Show More <i class="la la-angle-down"></i></span>
									<span class="show-less">Show Less <i class="la la-angle-up"></i></span>
								</a>
							</div>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<div class="section-tab section-tab-2 pb-3">
								<ul class="nav nav-tabs" id="myTab3" role="tablist">
									<li class="nav-item">
										<a class="nav-link" id="recent-tab" data-toggle="tab" href="#recent" role="tab" aria-controls="recent" aria-selected="true">
											Recent
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="false">
											Popular
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="new-tab" data-toggle="tab" href="#new" role="tab" aria-controls="new" aria-selected="false">
											New
										</a>
									</li>
								</ul>
							</div>
							<div class="tab-content" id="myTabContent">
								<div class="tab-pane " id="recent" role="tabpanel" aria-labelledby="recent-tab">
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img4.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">Pack wisely before traveling</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img5.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card mb-0">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img6.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">Introducing this amazing city</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
								</div>
								<div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img7.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">The Castle on the Cliff: Majestic, Magic</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img8.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card mb-0">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img9.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">All Aboard the Rocky Mountaineer</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
								</div>
								<div class="tab-pane " id="new" role="tabpanel" aria-labelledby="new-tab">
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img7.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">The Castle on the Cliff: Majestic, Magic</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img8.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">Change your place and get the fresh air</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
									<div class="card-item card-item-list recent-post-card mb-0">
										<div class="card-img">
											<a href="blog-single.html" class="d-block">
												<img src="images/small-img9.jpg" alt="blog-img">
											</a>
										</div>
										<div class="card-body">
											<h3 class="card-title"><a href="blog-single.html">All Aboard the Rocky Mountaineer</a></h3>
											<p class="card-meta">
												<span class="post__date"> 1 March, 2020</span>
												<span class="post-dot"></span>
												<span class="post__time">3 Mins read</span>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">Archives</h3>
							<div class="sidebar-list">
								<ul class="list-items">
									<li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">June 2015</a></li>
									<li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">May 2016</a></li>
									<li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">April 2017</a></li>
									<li><i class="la la-dot-circle mr-2 text-color"></i><a href="#">February 2019</a></li>
								</ul>
							</div>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">Tag Cloud</h3>
							<ul class="tag-list">
								<li><a href="#">Travel</a></li>
								<li><a href="#">Adventure</a></li>
								<li><a href="#">Tour</a></li>
								<li><a href="#">Nature</a></li>
								<li><a href="#">Island</a></li>
								<li><a href="#">Parks</a></li>
								<li><a href="#">Cruise</a></li>
								<li><a href="#">Mountains</a></li>
								<li><a href="#">Bar</a></li>
								<li><a href="#">Beaches</a></li>
								<li><a href="#">Nightlife</a></li>
							</ul>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">About us</h3>
							<div class="sidebar-about">
								<div class="sidebar-about-img">
									<img src="images/destination-img3.jpg" alt="">
									<p class="font-size-28 font-weight-bold text-white">Trizen</p>
								</div>
								<p class="pt-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem eaque ipsa quae ab illo inventore incididunt ut labore et dolore magna</p>
							</div>
						</div><!-- end sidebar-widget -->
						<div class="sidebar-widget">
							<h3 class="title stroke-shape">Follow & Connect</h3>
							<ul class="social-profile">
								<li><a href="#"><i class="lab la-facebook-f"></i></a></li>
								<li><a href="#"><i class="lab la-twitter"></i></a></li>
								<li><a href="#"><i class="lab la-instagram"></i></a></li>
								<li><a href="#"><i class="lab la-linkedin-in"></i></a></li>
							</ul>
						</div><!-- end sidebar-widget -->
					</div><!-- end sidebar -->
				</div>
			</div>
		</div>
	</section>

<?php
get_template_part('template-parts/footer/static-cta');
get_footer();
