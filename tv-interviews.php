<?php
/*
Template Name: TV Interviews
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'head_image' ); ?>
<?php get_template_part( 'nav' ); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div id="video_bio_box" class="clearfix">
	<p class="video_bio_plus"><i class="fa fa-plus"></i></p>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<h1 class="video_bio_text">
		<?php the_content(); ?>
	</h1>
	<?php endwhile; ?>
	<?php endif; ?>
</div> <!-- photo_bio_box -->

<div id="tv-interview_wrap">
	<div id="tv-interviews_loop_container">

		<?php $args = array( 'post_type' => 'tv-interviews', 'posts_per_page' => -1, 'order' => 'ASC' ); ?>
		<?php $photo_loop = new WP_Query( $args ); ?>


			<?php if ( $photo_loop->have_posts() ) : ?>
			<?php while ( $photo_loop->have_posts() ) : $photo_loop->the_post(); ?>

			<div class="video_box">
					<div class="video_wrapper"><?php echo get_field('vimeo_link'); ?></div>
					<h2 class="video_desc"><?php echo get_field('tv_interviews_description'); ?></h2>
				</a>
	 		</div> <!-- photo_box -->

	 		<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div> <!-- photo_loop_container -->
</div> <!-- photo_loop_wrap -->

<?php get_footer(); ?>
