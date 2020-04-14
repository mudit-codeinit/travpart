<style>
	.vote-inner > div i {
    display: block;
    font-size: 36px;
    color: #c0c3ca;
    height: 50px;
}

.vote-inner > div label {
    cursor: pointer;
}

.vote-inner > div {
    text-align: center;
    cursor: pointer;
    padding: 10px;
    border-right: 1px solid rgba(192, 195, 202, 0.22);
    flex: 1 1 auto;
}

.vote-inner {
    display: flex;
    justify-content: center;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 25px;
}

.vote-inner > div span {
    display: block;
    font-size: 12px;
    font-weight: bold;
    color: #333333;
    margin: 0 !important;
}

.vote-inner > div:not(.views):hover i {
    color: #1a6d84;
}

.vote-inner > div input {
    opacity: 0!important;
    position: absolute;
}

.singleinput0 label{
	margin-top: 7px;
}

.singleinput0 label span{
	margin-top: 6px!important;
}

.blog-comment-section{
  margin-top: 50px;
  margin-bottom: 50px;
}

.blog-comment-section h2{
  font-size: 24px;
    font-weight: bold;
    color: #333333;
    margin-bottom: 15px;
    margin-top: 40px;
}

.blog-comment-section h3{
  font-size: 24px;
    font-weight: bold;
    color: #333333;
    margin-bottom: 15px;
    margin-top: 30px;
}

.blog-comment-section textarea{
  width: 100%;
  max-width: 400px;
  min-height: 100px;
}

.blog-comment-section textarea:focus{
    background-color: #F5F5F5;
}

.blog-comment-section button{
  margin-top: 30px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
  border-radius: 6px;
  text-transform: capitalize;
  color: #368a8b;
}

.blog-comment-section button:hover{
  background-color: #e6e6e6;
  border-color: #adadad;
}

/* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

@media (min-width: 1281px) {
  

  
}

/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
  

  
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
  

  
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
  

  
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
.vote-inner{
	margin-top: 20px;
	margin-bottom: 0;
}

.hentry {
    margin: 0;
  
}

.content-area {
    margin-bottom: 0px;
}

#footer {
   margin-top: 0px!important;
}

.norm_row.sfsi_wDiv{
	right: 0;
}


  
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
.vote-inner{
	margin-top: 20px;
	margin-bottom: 0;
}

.hentry {
    margin: 0;
  
}

.content-area {
    margin-bottom: 0px;
}

#footer {
   margin-top: 0px!important;
}

</style>

<?php

/**

 * Template part for displaying single posts.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package Aberration Lite

 */



?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">



		<?php if( esc_attr(get_theme_mod( 'show_single_thumbnail', 1 ) ) ) :  

		echo '<div class="featured-image-wrapper">';         

					the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'itemprop' => "image"));

		echo '</div>';

         endif; ?>





	<header class="entry-header">

		

		<h1 class="entry-title" itemprop="headline">	

			<?php if(the_title( '', '', false ) !='') the_title(); 

			else esc_html_e('Untitled', 'aberration-lite'); ?>

		</h1>

        

		<div class="entry-meta">

		<?php aberration_lite_single_posted_on(); ?>

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->





	<div class="entry-content" itemprop="text">

		<?php the_content(); ?>

                

                <?php  // For content split into multiple pages

				aberration_lite_multipage_nav();  ?>

              

	</div><!-- .entry-content -->



	<footer class="entry-footer" itemscope itemtype="http://schema.org/WPFooter">

    

 		<?php // For post navigation with next and previous

			if( esc_attr(get_theme_mod( 'show_next_prev', 1 ) ) ) {

			aberration_lite_post_pagination();	

			}

		?>   

        

		<?php 

		if ( !has_post_format( 'quote' ) && is_single())  :

		aberration_lite_entry_footer(); 

		endif;

		?>   

                     	

		<?php	// Author bio.

		if( esc_attr(get_theme_mod( 'show_author_bio', 1 ) ) ) {

			if ( !has_post_format( 'quote' ) && is_single() && get_the_author_meta( 'description' ) ) :

				get_template_part( 'author-bio' );

			endif;

		}

		?> 



		

        

	</footer>

<div class="col-md-12">
	<div class="vote-inner">

		<div class="singleinput0">
			<label class="singlepage-label" for="s1"><a class="a2a_dd addtoany_share_save addtoany_share" href="https://www.addtoany.com/share#url=https%3A%2F%2Fwww.travpart.com%2Fbest-things-to-do-in-paris%2F&amp;title=best%20things%20to%20do%20in%20paris"><img src="https://www.travpart.com/wp-content/uploads/2019/10/share2.png" alt="Share"></a><span class="radio" style="margin-top: 0px;"><span>0</span> Share</span></label>
		</div>	

        <div class="singleinput1" style="color:red;">
            <input type="radio" id="s1" name="sc_type" value="0" style="width: auto;" checked="">
          <label class="singlepage-label" for="s1"><i class="fa fa-thumbs-up"></i><span class="radio" style="margin-top: 0px;"><span>4</span> Like</span></label>
        <script type="text/javascript">
           
              $(document).ready(function () {
                  $(".fa-thumbs-up").click(function () {
                    var white= $(this).css('color');
                      if (white === 'rgb(192, 195, 202)') {
                          $(this).css("color", "rgb(26,106,129)");
                      } else {
                          $(this).css("color", 'rgb(192, 195, 202)');
                      }
                       var blue= $('.fa-thumbs-down').css('color');

                     if (blue === 'rgb(26,106,129)') {
                          $('.fa-thumbs-down').css("color", "rgb(192, 195, 202)");
                      } 
                      else {
                          $('.fa-thumbs-down').css("color", 'rgb(192, 195, 202)');
                      }
                  });


                   $(".fa-thumbs-down").click(function () { 
                    var white= $(this).css('color');
                      if (white === 'rgb(192, 195, 202)') {
                          $(this).css("color", "rgb(26,106,129)");
                      } else {
                          $(this).css("color", 'rgb(192, 195, 202)');
                      }
                       var blue= $('.fa-thumbs-up').css('color');
                     if (blue === 'rgb(26,106,129)') {
                          $('.fa-thumbs-up').css("color", "rgb(192, 195, 202)");
                      } 
                       else {
                          $('.fa-thumbs-up').css("color", 'rgb(192, 195, 202)');
                      }
                  });
              });
           </script>
       
        </div>
        <div class="singleinput2">
            <input type="radio" id="s2" name="sc_type" value="1" style="width: auto;">
          <label class="singlepage-label" for="s2"><i class="fa fa-thumbs-down"></i><span class="radio1"><span>0</span> Dislike</span></label>
        </div>
		  <?php
if ( is_single() ){
    global $post;
    $count_post = esc_attr( get_post_meta( $post->ID, '_post_views_count', true) );
    if( $count_post == ''){
      $count_post = 1;
      add_post_meta( $post->ID, '_post_views_count', $count_post);
    }else{
      $count_post = (int)$count_post + 1;
      update_post_meta( $post->ID, '_post_views_count', $count_post);
    }
  }
		?>
      <div class="viewcuscount">
        <i class="fa fa-eye"></i>
         <span><span><?php echo number_format($count_post)+450; ?></span> views</span>
      </div>

		<div class="button-flw">
          <div id="submitFollowAgent" class="b-follow" title="Follow Travel Advisor">
			<i class="fa fa-user-plus"></i>
			<span><span>0</span>Followers</span>
		</div>
        

        </div>
        
      <div class="views">
        <i class="fa fa-comment"></i>
        <span><span>2</span> Comments</span>
      </div>
    </div>
</div>

<div class="col-md-12">
  <div class="blog-comment-section">
      <h2>No Comment posted yet!</h2>
      <h3>Leave a comment</h3>

      <textarea name="text" required="true" class="singletextarea"></textarea>

      <button type="button" class="post-btn">Post Comment</button>
  </div>
</div>


</article>