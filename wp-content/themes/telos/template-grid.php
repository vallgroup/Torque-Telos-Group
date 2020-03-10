<article id="post-<?php the_ID(); ?>" <?php post_class('gallery-item'); ?>>
    <a href="<?php echo the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail'); ?>
    <span class="title-bar"><?php the_title(); ?></span>
    </a>
</article>