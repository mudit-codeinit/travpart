<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Aberration Lite
 */

get_header(); ?>
<style>
#error-button{text-align: center;margin-top:20px;}
#error-button a, #error-button a:visited{color:black;border:1px solid black;}
@media only screen and (max-width: 600px) {
.error-404{min-height:300px;}
.site-main{margin-top:200px;}

}
</style>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
               
                <img class="error-image" src="https://www.travpart.com/wp-content/uploads/2019/01/404-error-page-not-found.jpg" alt="Error Page Image" />
                <div>
                
				<!-- <header class="page-header">
					<h1 id="error-title"><?php esc_html_e( '404', 'aberration-lite' ); ?></h1>
				</header>                
                <p id="error-message"><?php esc_html_e( 'It appears the page you were wanting to see is no longer available.', 'aberration-lite' ); ?></p> -->
                <p id="error-button"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html_e( 'Back to Home', 'aberration-lite' ); ?></a></p>
                </div>

			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
