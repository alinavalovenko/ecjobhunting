<?php

/**
 * Template Name: Default
 */

get_header(); ?>
    <main>
        <?php if (have_posts()):
            while (have_posts()): the_post(); ?>
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            <?php endwhile;
        else:
            get_template_part('content', 'none');
        endif; ?>
    </main>

<?php get_footer();
