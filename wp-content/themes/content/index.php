<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package WordPress
 * @subpackage Spicepress
 */
 
get_header();
?>
 <!-- Page Title Section -->
		<section class="page-title-section">		
			<div class="overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
						   <?php 	$our_title = get_the_title( get_option('page_for_posts', true) );
									echo '<div class="page-title wow bounceInLeft animated" ata-wow-delay="0.4s"><h1>'.$our_title.'</h1></div>';
						   ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<?php
								echo '<ul class="page-breadcrumb wow bounceInRight animated" ata-wow-delay="0.4s">';
									$homeLink = home_url();
									$our_title = get_the_title( get_option('page_for_posts', true) );
								    echo '<li><a href="'.$homeLink.'">'.$our_title .'</a></li>';
									echo '<li class="active"><a href="'.$our_title .'">'.get_bloginfo( 'name' ).'</a></li>';
								 echo '</ul>'
							?>
						</div>
					</div>
				</div>	
			</div>
		</section>
		<!-- <div class="page-seperate"></div> -->
		<!-- /Page Title Section -->
		<div class="alert text-center" style="margin-bottom: -20px;" role="alert">
			<?php 
			// 	if( !is_user_logged_in() ){
			// ?>
			<!--<label><a style="color: #ffffff" href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login"><input type="submit" class="search-submit" value="登录"></a></label>-->
			<?php  

			// 	}

				get_search_form(); 
			?>
		</div>
						
		<!-- Blog & Sidebar Section -->
		<section class="blog-section">
			<div class="container">
				<div class="row" id="blog-masonry">
					<?php 
					if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content. get_post_format
						echo '<div class="item">';
						get_template_part( 'content','');
						echo '</div>';
					endwhile;
				endif;
				?>
				</div>
				<?php
				// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
				?>	
			</div>
		</section>
<!-- /Blog & Sidebar Section -->
<?php get_footer(); ?>