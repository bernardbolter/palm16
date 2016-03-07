<?php get_header(); ?>
<?php get_template_part( 'nav_single' ); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="embed-box">
<?php the_content(); ?>
<style>
.issuuembed span {display:none !important;}
</style>
</div>
<div class="single_description">
 	<p><?php echo get_post_meta($post->ID, 'Description', true); ?></p>
</div>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>