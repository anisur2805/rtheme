<style>
	.feature-img {
		max-width: 100%;
	}

	.img-owl-carousel img {
		width: 200px;
		height: 200px;
	}

	.indicators {
		display: flex;

	}
	.indicators li {
		width: 80px;
		height: 80px;
		list-style: none;
		margin: 10px 10px 0 0;

	}
	.indicators li img{
		border-radius: 15px;
		max-width: 100%;
		height: auto;
	}

</style>

<?php
	$args = array(
		'post_type'      => 'testimonial',
		'post_status'    => 'publish',
		'posts_per_page' => 1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);

	$loop = new WP_Query( $args );

	$args2 = array(
	    'post_type'      => 'testimonial',
	    'post_status'    => 'publish',
	    'posts_per_page' => -1,
	);

	$loop2 = new WP_Query( $args2 );

?>

	<div class="container d-none">
		<div class="row">
			<div class="col-md-6">
				<div class="owl-carousel testimonee-imgs d-none">
					<?php
						while ( $loop->have_posts() ): $loop->the_post();
						    echo '<li>' . get_the_post_thumbnail() . '</li>';
						endwhile;
						wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="col-md-6">
			<?php $i = 0; while ( $loop->have_posts() ): $loop->the_post(); ?>
				<div class="owl-carousel <?php $i++;?>">
					<div class="inside-testimonial">
						<?php
					    the_post_thumbnail();
					    the_title( '<h3>', '</h3>' );
					    the_excerpt( );
					    the_content();
					    ?>
					</div>
				</div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>

	<section class="testimonial_area">

		<div class="carousel slide testimonial_slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="row">
					<div class="col-md-6">
						<?php $i =0; while ( $loop->have_posts() ): $loop->the_post();?>
						<div class="owl-carousel owl-theme owl-loaded owl-refresh owl-nav testimonial_slide">

							<div class="owl-stage-outer">
						        <div class="owl-stage">
									<div class="owl-item">
										<div class="testimonial_content">
											<?php the_content();?>
											<div class="media">
												<!-- <div class="feature-img"><?php // the_post_thumbnail(); ?></div> -->
												<div class="media-body">
													<a href="#"> <?php the_title( '<h3>', '</h3>' );?></a>
													<h6><?php the_excerpt();?></h6>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>


						<?php endwhile; wp_reset_postdata(); ?>
						</div>
						<div class="col-md-6">

							<ul class="indicators">
								<?php
								$i = 0;
								$j = 1;
								while ( $loop2->have_posts() ):
								    $loop2->the_post();
								    echo '<li data-target=".testimonial_slide" data-slide-to="' . $i++ . '" class="testimonial_'.$j++.'">' . get_the_post_thumbnail() . '</li>';
								endwhile; wp_reset_postdata(); ?>
							</ul>

						</div>
					</div>
				</div>

			<!-- <div class="nav_control">
				<a class="control-prev" href=".testimonial_slide" role="button" data-slide="prev">
					<i class="fas fa"> <h3><b> < </b> </h3> </i>
				</a>
				<a class="control-next" href=".testimonial_slide" role="button" data-slide="next">
					<i class="fas fa"> <h3><b>></b></h3> </i>
				</a>
			</div> -->

		</div>
	</section>
