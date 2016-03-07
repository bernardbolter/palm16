<?php
/*
Template Name: Photo
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'head_image' ); ?>
<?php get_template_part( 'nav' ); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div id="photo_bio_box" class="clearfix">
	<p class="photo_bio_plus"><i class="fa fa-plus"></i></p>
	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	<h1 class="photo_bio_text">
		<?php the_content(); ?>		
	</h1>
	<?php endwhile; ?>
	<?php endif; ?>
</div> <!-- photo_bio_box -->

<div id="photo_loop_wrap">
	<div id="photo_loop_container">

		<?php $args = array( 'post_type' => 'photographs', 'posts_per_page' => -1, 'order' => 'ASC' ); ?>
		<?php $photo_loop = new WP_Query( $args ); ?>

	 
			<?php if ( $photo_loop->have_posts() ) : ?>
			<?php while ( $photo_loop->have_posts() ) : $photo_loop->the_post(); ?>

			<div class="photo_box">
				<a rel="palm_gallery" href="<?php echo get_field('large_photograph'); ?>" class="swipebox" title="<?php the_title() ?>, <?php echo get_field('photo_place_and_date'); ?>">
					<img src="<?php echo get_field('small_photograph'); ?>" alt="<?php the_title() ?>">
					<p><?php the_title() ?><span class="photo_date"><?php echo get_field('photo_place_and_date'); ?></span></p>
				</a>
	 		</div> <!-- photo_box -->

	 		<?php endwhile; ?>
		<?php endif; ?>
 
		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div> <!-- photo_loop_container -->
</div> <!-- photo_loop_wrap -->

<?php get_footer(); ?>