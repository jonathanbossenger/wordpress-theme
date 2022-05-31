<?php
get_header();
?>
    <div>
        <h2>Posts</h2>

		<?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_title(
                        sprintf(
                            '<h3><a href="%s">',
                            get_permalink()
                        ),
                        '</a></h3>'
                    );
                    the_content();
	                ?>
                    <hr>
	                <?php
                }
            }
		?>

    </div>
<?php
get_footer();
?>