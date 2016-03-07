<?php
/*
Template Name: About
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'head_image' ); ?>
<?php get_template_part( 'nav' ); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div class="about_wrapper">
	<div id="about_top_box" class="clearfix">

		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		
		<?php $about_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<img src="<?php echo $about_image ?>" alt="Portrait of Erik Augustin Palm" />
		<?php the_content(); ?>
		
		<?php endwhile; ?>
		<?php endif; ?>	

	</div> <!-- about_top_box -->


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

	<div id="about_mid_box" class="clearfix">

		<?php $about_two_loop = new WP_Query( 'page_id=260' ); ?>

	 
			<?php if ( $about_two_loop->have_posts() ) : ?>
			<?php while ( $about_two_loop->have_posts() ) : $about_two_loop->the_post(); ?>

			<?php the_content(); ?>			

	 		<?php endwhile; ?>
			<?php endif; ?>
 
		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div> <!-- about_mid_box -->

	<div id="about_bot_box" class="clearfix">

		<?php $about_email_loop = new WP_Query( 'page_id=263' ); ?>

			<?php if ( $about_email_loop->have_posts() ) : ?>
			<?php while ( $about_email_loop->have_posts() ) : $about_email_loop->the_post(); ?>

			<?php the_content(); ?>			

	 		<?php endwhile; ?>
			<?php endif; ?>
 
		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div> <!-- about_bot_box -->

	<div id="about_clients_box">
		<p class="about_clients_header">CLIENTS <span class="about_header_client_small">(IN SELECTION)</span>:</p>

		<?php $about_clients_loop = new WP_Query( 'page_id=266' ); ?>

			<?php if ( $about_clients_loop->have_posts() ) : ?>
			<?php while ( $about_clients_loop->have_posts() ) : $about_clients_loop->the_post(); ?>

			<?php the_content(); ?>			

	 		<?php endwhile; ?>
			<?php endif; ?>
 
		<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

	</div>
</div> <!-- about_wrapper -->

<?php get_footer(); ?>