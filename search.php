<?php
get_header();
?>
    <div>
        <h2>Search results</h2>

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
                    the_excerpt();
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