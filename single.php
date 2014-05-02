<?php
/**
 * The Template for displaying all single posts.
 *
 * @package societycentral
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?//php societycentral_post_nav(); ?>

			<?php  

			$taxo_text = "";  

			$os_list = get_the_term_list( $post->ID, 'headline', '<strong>Headlines:</strong> ', ', ', '' ); 


			if ( '' != $os_list ) {  
			$taxo_text .= "$os_list<br />\n";  
			}  

			if ( '' != $taxo_text ) {  
			?>  
			<div class="entry-utility">  
			<?php  
			echo $taxo_text;  
			?>  
			</div>  
			<?  
			} // endif  
			?> 

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>