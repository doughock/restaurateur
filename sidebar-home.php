<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
	<div id="sidebar-home-wrap">
		<div id="sidebar-home" class="widget-area" role="complementary">
			<div id="sidefix" class="clearfix">
			<?php if ( ! dynamic_sidebar( 'sidebar-alt-home' ) ) : ?>

				<aside id="recent-posts" class="widget">
					<div class="widget-title"><?php _e( 'Latest Posts', 'restaurateur' ); ?></div>
					<ul>
						<?php
							$args = array( 'numberposts' => '10', 'post_status' => 'publish' );
							$recent_posts = wp_get_recent_posts( $args );
							
							foreach( $recent_posts as $recent ){
								if ($recent["post_title"] == '') {
									 $recent["post_title"] = __('View Post', 'restaurateur');
								}
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . $recent["post_title"] .'</a> </li> ';
							}
						?>
                    </ul>
				</aside>

                
                <aside id="categories" class="widget">
					<div class="widget-title"><?php _e( 'Categories', 'restaurateur' ); ?></div>
					<ul>
						<?php wp_list_categories( array( 
							'title_li' => '',
							'hierarchical' => 0
						) ); ?>
					</ul>
				</aside>
                
                <aside id="archives" class="widget">
					<div class="widget-title"><?php _e( 'Archives', 'restaurateur' ); ?></div>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>
                
                <aside id="recent-comments" class="widget">
            		<div class="widget-title"><?php _e( 'Recent Comments', 'restaurateur' ); ?></div>
					<ul>
					<?php restaurateur_recent_comments(); ?>
                    </ul>
           		</aside>
			</div>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
     </div>
