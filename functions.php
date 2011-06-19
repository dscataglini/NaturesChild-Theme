<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => true
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes
// 
// define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
// define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
// define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
// define('THEMATIC_COMPATIBLE_FEEDLINKS', true);




// Add a widgetized aside just below the header
function childtheme_leaderasides() { ?>

    <?php if (is_home() && ( is_sidebar_active('1st-leader-aside') || is_sidebar_active('2nd-leader-aside') || is_sidebar_active('3rd-leader-aside') )) { // one of the leader asides has a widget ?>
    <div id="leader">
        <div id="leader-container" class="yui3-g">
          <div id="leader-container2" class="yui3-g">
        
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('1st-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="first-leader" class="aside sub-aside yui3-u-1-3">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('1st-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #first-leader .aside -->'. "\n";
            } ?>                
        
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('2nd-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="second-leader" class="aside sub-aside yui3-u-1-3">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('2nd-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #second-leader .aside -->'. "\n";
            } ?>       
       
            <?php if ( function_exists('dynamic_sidebar') && is_sidebar_active('3rd-leader-aside') ) { // there are active widgets for this aside
                echo '<div id="third-leader" class="aside sub-aside yui3-u-1-3">'. "\n" . '<ul class="xoxo">' . "\n";
                dynamic_sidebar('3rd-leader-aside');
                echo '</ul>' . "\n" . '</div><!-- #third-leader .aside -->'. "\n";
            } ?>        
          </div>
        </div><!-- #leader-container -->    
    </div><!-- #leader -->
    <?php } ?>

<?php }
add_action('widget_area_single_top','childtheme_leaderasides',6);

// Add a widgetized aside just below the header
function childtheme_2_cols_pitch() { ?>

    <?php if (is_home() && ( is_sidebar_active('2-column-pitch'))) { // one of the leader asides has a widget ?>
    <div id="pitch-2-column" class="leader-style">
        <ul class="xoxo">
            <?php dynamic_sidebar('2-column-pitch'); ?>
        </ul><!-- #leader-container -->    
    </div><!-- #leader -->
    <?php } ?>

<?php }
add_action('widget_area_single_top','childtheme_2_cols_pitch',6);

function childtheme_3_cols_pitch() { ?>

    <?php if (is_home() && ( is_sidebar_active('3-column-pitch'))) { // one of the leader asides has a widget ?>
    <div id="pitch-3-column"  class="leader-style">
      <div class="second-column-tail">
          <ul class="xoxo">
                <?php dynamic_sidebar('3-column-pitch'); ?>
        </ul>
      </div><!-- #leader-container -->    
    </div><!-- #leader -->
    <?php } ?>

<?php }
add_action('widget_area_single_top','childtheme_3_cols_pitch',6);



// Register new widgetized areaa and the new widgets
function childtheme_widgets_init() {
    
    // Register new widgetized areas
    register_sidebar(array(
       	'name' => '1st leader Aside',
       	'id' => '1st-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => '2nd leader Aside',
       	'id' => '2nd-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
   
    register_sidebar(array(
       	'name' => '3rd leader Aside',
       	'id' => '3rd-leader-aside',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
      
    // Register new widgetized areas
    register_sidebar(array(
       	'name' => '2 column Pitch',
       	'id' => '2-column-pitch',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer cols-2-pitch %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  

    register_sidebar(array(
       	'name' => '3 column Pitch',
       	'id' => '3-column-pitch',
       	'before_widget' => '<li id="%1$s" class="widgetcontainer cols-3-pitch %2$s">',
       	'after_widget' => "</li>",
		'before_title' => "<h3 class=\"widgettitle\">",
		'after_title' => "</h3>\n",
    ));  
   
    
    
}
add_action( 'init', 'childtheme_widgets_init' );



	function childtheme_override_single_post() { 
		
				thematic_abovepost(); ?>
			<div class="hentry-wrapper">
				<div id="post-<?php the_ID();
					echo '" ';
					if (!(THEMATIC_COMPATIBLE_POST_CLASS)) {
						post_class();
						echo '>';
					} else {
						echo 'class="';
						thematic_post_class();
						echo '">';
					}
     				thematic_postheader(); ?>
					<div class="entry-content">
            <?php thematic_content(); ?>

						<?php wp_link_pages('before=<div class="page-link">' .__('Pages:', 'thematic') . '&after=</div>') ?>
					</div>
					<!-- .entry-content -->
					<?php thematic_postfooter(); ?>
				</div>
			</div><!-- #post -->
		<?php

			thematic_belowpost();
	}
  require_once(TEMPLATEPATH . '/../natureschild/extensions/button_widget.php');
?>