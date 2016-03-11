<?php
/*
Template Name: Selfies with Icons
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

<div class="about_wrapper">

	<div id="about_celebs" class="clearfix">

		<?php $args = array( 'post_type' => 'chilling_with', 'posts_per_page' => -1, 'order' => 'ASC' ); ?>
		<?php $celeb_loop = new WP_Query( $args ); ?>


			<?php if ( $celeb_loop->have_posts() ) : ?>
			<?php while ( $celeb_loop->have_posts() ) : $celeb_loop->the_post(); ?>

			<div class="about_celeb_wrap">
				<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
				<img src="<?php echo $feat_image ?>" alt="photo chilling with <?php the_title() ?>" />
				<p><?php the_title() ?></p>
			</div>

	 		<?php endwhile; ?>
		<?php endif; ?>

		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div> <!-- about_celebs -->
</div>

<?php get_footer(); ?>
