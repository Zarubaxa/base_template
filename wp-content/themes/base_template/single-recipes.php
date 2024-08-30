<?php
get_header();
?>
<div class="container">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'head_menu',
        'container_class' => 'main-menu'
    ) );
    ?>

    <div class="content">
        <div class="post single">
            <?php the_post();?>
            <article class="single_article">
                <h1 class="single_title"><?php the_title();?></h1>
                <div class="article-img">
                    <?php
                    if(has_post_thumbnail()) {

                        the_post_thumbnail();
                    }
                    ?>
                </div>



                <?php if ( have_rows( 'block' ) ) : ?>
                    <ul>
                    <?php while ( have_rows( 'block' ) ) : the_row(); ?>
                        <li><b><?php the_sub_field( 'ingredient' ); ?></b> - <span><?php the_sub_field( 'kolichestvo' ); ?></span> <?php the_sub_field( 'edinicza_izmereniya' ); ?></li>



                        <?php if ( get_sub_field( 'speczialnyj_ingredient' ) == 1 ) : ?>
                            <?php
                            the_sub_field('opisanie_speczialnogo_ingredienta');
                            ?>
                        <?php else : ?>
                            <?php // echo 'false'; ?>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <?php // No rows found ?>
                <?php endif; ?>
                <?php the_content();?>
            </article>
        </div>
    </div>
</div>


<?php
get_footer();
?>