<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="featured-image" style="background-image: url('. htmlspecialchars( get_the_post_thumbnail_url() ) . ')"></div>';}
	?>
    <header class="entry-header">

		<?php
            switch (get_the_title()) {
                case 'Park':
                    break;
                case 'Contact':
	                the_title( '<h1 class="entry-title text-center" itemprop="headline">', '</h1>' );
	                break;
                default:
	                the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
                    break;
            }
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'zacklive' ),
			'after'  => '</div>',
		) );
		?>
    </div><!-- .entry-content -->
    <?php /*
    <footer class="entry-footer">
		<?php zacklive_entry_footer(); ?>
    </footer><!-- .entry-footer --> */ ?>
</article><!-- #post-## -->