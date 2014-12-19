<?php

get_header(); ?>

<div class="main">
    <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
    <div class="post">
        <h2><?php the_title(); ?></h2>
        <header class="post-header">
            <p class="date"><span class="calender"></span><?php the_date(); ?></p>
            <p><span class="author"></span>by <span style="color:#FBAD1E;"><?php the_author(); ?></span></p>
            <p class="tags">
            <?php $posttags = get_the_tags(); ?>
            <?php if ($posttags): ?>
                <span class="tag"></span>
                <?php foreach($posttags as $tag): ?>
                    <?php echo $tag->name . ' '; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            </p>
            <p class="comments">
                <?php
                    $comments = get_comments_number();
                    if (empty($comments)) {
                        echo 'No comments';
                    } else if (!empty($comments)) {
                        if ($comments < 2) {
                            echo '<span class="comment"></span><a href="' . get_comments_link() .'">' . $comments . ' comment</a>';
                        } else {
                            echo '<span class="comment"></span><a href="' . get_comments_link() .'">' . $comments . ' comments</a>';
                        }
                    } 
                ?>
            </p>
            <div class="clearfix"></div>
        </header>
       <div class="entry">
            
            <?php the_content(); ?>
            <p class="postmetadata">
                <?php _e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?><br />
                <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
            </p>
            <div id="comments" class="comments-template">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>

    <?php endwhile; ?>
    <div class="navigation">  
        <?php previous_post_link('< %link') ?> <?php next_post_link(' %link >') ?>
    </div>
    <?php endif; ?>
</div>
<?php get_sidebar(); ?>  
<?php get_footer(); ?>



    