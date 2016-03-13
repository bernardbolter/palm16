<?php
/*
Template Name: Radio Interviews
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
</div> <!-- photo_bio_box -->

<?php endwhile; ?>
<?php endif; ?>

<div class="radio_bottom_wrapper clearfix">
	<div class="radio_video_wrapper">

		<?php $radio_video_args = array( 'post_type' => 'radio_video', 'posts_per_page' => -1, 'order' => 'ASC' ); ?>
		<?php $radio_video_loop = new WP_Query( $radio_video_args ); ?>

			<?php if ( $radio_video_loop->have_posts() ) : ?>
			<?php while ( $radio_video_loop->have_posts() ) : $radio_video_loop->the_post(); ?>

		<div class="audio_video_box">
				<div class="audio_video_wrapper"><?php echo get_field('radio_video_link'); ?></div>
				<h2 class="audio_video_desc"><?php echo get_field('radio_interview_video_text'); ?></h2>
			</a>
		</div> <!-- photo_box -->

		<?php endwhile; ?>
	<?php endif; ?>

	</div> <!-- radio-video-wrapper -->

	<div class="radio-audio-wrap">

		<h1 class="aduio_files_title">Audio:</h1>

		<?php $args = array( 'post_type' => 'radio-interviews', 'posts_per_page' => -1, 'order' => 'ASC' ); ?>
		<?php $radio_loop = new WP_Query( $args ); ?>


			<?php if ( $radio_loop->have_posts() ) : ?>
			<?php while ( $radio_loop->have_posts() ) : $radio_loop->the_post(); ?>

			<div class="radio_box">
					<div class="radio_player_wrap">
						<?php
							$radio_url = get_field('radio_audio_files');
							echo do_shortcode('[audio $radio_url]');
						?>
					</div>
				<div class="radio_text_box">
					<h2 class="radio_title"><?php echo get_field('radio_audio_title'); ?></h2>
					<h5 class="radio_desc"><?php echo get_field('radio_audio_description'); ?></h5>
				</div>
	 		</div> <!-- radio_box -->

	<?php endwhile; ?>
<?php endif; ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<div class="radio-interview-image">
		<?php $about_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<img src="<?php echo $about_image ?>" alt="Portrait of Erik Augustin Palm" />
	</div>

<?php endwhile; ?>
<?php endif; ?>

</div> <!-- radio_audio_wrap -->

</div> <!-- radio_bottom_wrapper -->

<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>

<?php get_footer(); ?>
