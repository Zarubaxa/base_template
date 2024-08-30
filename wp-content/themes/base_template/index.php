<?php
get_header();
?>
<body>

<div id="main" class="container">
    <div id="content" class="content" role="main">
        <h1 class="page-title">Рецепты</h1>
        <ul class="recipes-list">


        <?php
        $args = array(
            'post_type' => 'recipes',
            'showposts'=> 15,
            'orderby' => 'name',
            'order' => 'ASC'
        );

        $recipes = get_posts($args);
        foreach ($recipes as $post) :
            setup_postdata($post);
            ?>
            <li>
                <div class="img-block">
                    <a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail() ?></a>
                </div>
                <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
    </div><!-- #content -->
</div><!-- #container -->

<?php wp_footer() ?>
</body>
</html>