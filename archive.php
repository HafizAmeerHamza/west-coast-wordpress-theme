<?php

/**
 * template for displaying archive posts
*/

get_header();
?>

<article id="primary" class="content-area">
    <main id="main" class="site-main">
        
        <?php if( have_posts() ) : ?>

            <header class="archive-page-header">
                <?php 
                    the_archive_title('<h1 class="archive-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <?php
                while( have_posts() ) :
                    the_post();
                    get_template_part('template-parts/post/content');
                endwhile;

                echo paginate_links( [
                    'prev_text' => esc_html__('Prev', 'herobiz'),
                    'next_text' => esc_html__('Next', 'herobiz'),
                ] );
                
            else :
                get_template_part('template-parts/page/content', 'none');
            endif; ?>
    </main>
</article>

<?php
get_footer();