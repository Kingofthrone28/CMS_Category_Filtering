<?php 
/** 
 Template Name: Portfolio New
	Template file for pages without the title displayed
 */		

get_header(); ?>
	<?php
        // Check if post/s exist
        if (have_posts()) : 
        
			echo "<div "; thmplt_main_section_class( array('main_section') );  echo "> \n";
        
            // Start the loop.		 		
            while ( have_posts() ) : the_post(); ?>
                <article  id='post-<?php the_ID(); ?>' <?php post_class(); ?>  >    
                    <?php the_title("<h1 class='topheader'>","</h1>"); ?>
                  <ul id="filters">
                    <?php
                        // Query the Portfolio taxonomy
                        $terms = get_terms('portfolio_categories');
                        $count = count($terms);
                            echo '<li><a href="javascript:void(0)" data-filter=".all" class="active">All</a></li>';
                            // loop through the category terms and extract data name from the database 
                             if ( $count > 0 ){
                            foreach ( $terms as $term ) {
                                $termname = strtolower($term->name);
                                $termname = str_replace(' ', '_', $termname);
                                echo '<li><a href="javascript:void(0)" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                            }
                        }
                    ?>
                  </ul>
                  <div id="portfolio">
                  <?php
                    //Portfolio Section
                        //WP_Query arguments
                        $args = array (
                          'post_type'			=> 'portfolio_new',
                          'order'				=> 'ASC',
                          'post_status'		=> 'publish',
                          'posts_per_page'	=> -1
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ):
                      ?>
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <?php
                          // ACF variables to query in the loop
                          $title = get_field('title');;
                          $image = get_field('image');
                          $terms = get_the_terms( $post->ID, 'portfolio_categories' );						
                          if ( $terms && ! is_wp_error( $terms ) ) : 
                          $links = array();
                            foreach ( $terms as $term ) {
                                $links[] = $term->name;
                            }
                              $tax_links = join( " ", str_replace(' ', '_', $links));          
                            $tax = strtolower($tax_links);
                           else :
	                        $tax = '';
                        endif;  
                       ?>
                         <div class="col-md-4 col-sm-6 col-xs-12 portfolio-container gallery all <?php echo $tax; ?>">
                           <a href="<?php echo $image['url']; ?>" title ="<?php echo $image['url']; ?>" data-fancybox="gallery" > 
                            <div class="portfolio-image-container">
                              <div class="portfolio-wrapper">
                               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class='img-responsive' />
                                  <h2><?php echo $title; ?></h2>
                               </div>
                             </div>
                           </a>
                         </div>
					       	<?php endwhile;?>
                  <script>
                    $(document).ready(function() {
                    //Portfolio fancybox
                     $('.gallery a[data-fancybox="gallery"]').fancybox({
                        	openEffect : 'none',
    	                    closeEffect	: 'none',
                            helpers : {
                              title : {
                                type : 'inside'
                              }
                            }
                      	});
                      });
                 </script>
					      <?php
                  //End Portfolio Section
                  endif; ?>
               </div>
             </article>
           <?php 
            endwhile;  
			   echo "</div>";
        endif;  
	?>

<?php get_footer(); ?>