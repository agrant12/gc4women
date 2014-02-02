<?php get_header(); ?>
    <?php 
        $post_category_ids = array();
        $post_terms = get_the_terms($post_id, 'category');
        if ($post_terms && !is_wp_error($post_terms)) {
        foreach ($post_terms as $post_term) {
            $post_category_ids[] = $post_term->slug;
        }
    }
    ?>
    <div class="container">
        <div class="main">
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

            <div class="post">
                <div class="post-header">
                    <h2><em><?php the_title(); ?></em></h2>
                    <?php if (in_array("features", $post_category_ids) || in_array("champions", $post_category_ids) || in_array("headlines", $post_category_ids)): ?>
                        <span><?php the_date(); ?> | <em>published in</em> <?php the_category(', ') ?></em></span>
                    <?php endif; ?>
                </div>
                <?php the_post_thumbnail(get_post_type(), 'secondary-image', NULL, 'category-thumb'); ?>
                <div class="entry">   
                <?php the_content(); ?>

                <p class="postmetadata">
                    <?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
                    <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
                </p>
            </div>

            <div class="comments-template">
                <?php comments_template(); ?>
            </div>
        </div>

        <?php endwhile; ?>

        <div class="navigation">  
            <?php previous_post_link('< %link') ?> <?php next_post_link(' %link >') ?>
        </div>

        <?php endif; ?>

        </div>
        <?php get_sidebar(); ?>  
    </div> 
<?php get_footer(); ?>