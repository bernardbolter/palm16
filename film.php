<?php
/*
Template Name: Film
*/
?>

<?php get_header(); ?>

<?php get_template_part( 'head_image' ); ?>
<?php get_template_part( 'nav' ); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div id="cat_loop_wrap">
	<div id="cat_loop_list">

		  <?php $the_query = new WP_Query( 'cat=7&posts_per_page=-1' ); ?>
	 
			<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="item">
		  		<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
		  		<?php echo get_the_post_thumbnail(); ?>
		  		<div class="cat_loop_text_box">
		  			<h2><?php echo get_post_meta($post->ID, 'Description', true) ?></h2>
		  			<div class="clear_date">
			  			<p><?php the_time('F jS, Y') ?></p>
			  			<h5><?php echo get_post_meta($post->ID, 'Language', true) ?></h5>
		  			</div>
		  		</a>
		 		</div>
		 	</div>
		 	<?php endwhile; ?>
		 	<?php endif; ?>

	</div>
</div>

<?php get_footer(); ?>