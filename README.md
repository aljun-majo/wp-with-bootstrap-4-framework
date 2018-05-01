# WordPress Theme with Bootstrap 4 Framework
Underscores starter theme to integrate Bootstrap 4 like wp_nav_menu function, add bootstrap 4 navigation markup using WP Bootstrap Navwalker, add bootstrap 4 grid in theme php templates, add bootstrap carousel slider, add custom post types and custom fields.

### Steps:

#### 1.) Add Custom Navigation Walker 
  - Custom WordPress nav walker class is downloaded from -> [wp-bootstrap-navwalker](https://github.com/wp-bootstrap/wp-bootstrap-navwalker)
  - Put class-wp-bootstrap-navwalker.php in theme folder/dir (e.g. `/inc/class-wp-bootstrap-navwalker.php')
  - Add this line of code in functions.php file (see line 11)
    `require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';`

#### 2.) Enqueuing Scripts and Styles in functions.php
  - Enqueue Styles ( _'/css/style.css'_ - style.css is generated from sass files with bootstrap SASS)
  ```
     wp_enqueue_style( 'tga-underscores-custom', get_template_directory_uri() . '/css/style.css' );
  ```
  - Enqueue Scripts ( bootstrap JS and custom JS)
  ```
    wp_enqueue_script( 'tga-underscores-popper', get_template_directory_uri() . '/js/bootstrap/popper.min.js', array('jquery') '20180215', true );
    wp_enqueue_script( 'tga-underscores-bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.js', array('jquery') '20180215', true ); 	
    wp_enqueue_script( 'tga-underscores-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20180215', true );
  ```
  

#### 3.) Add Bootstrap 4 HTML markup for Page Navigation in header.php file

  - From this markup   
       ```
       wp_nav_menu( array(
          'theme_location' => 'menu-1',
          'menu_id'        => 'primary-menu',
        ) );
       ```

  - To this Markup  [gist](https://gist.github.com/jun20/dc8fcb5ecbace58da43f8a1bd0f36b69)
      ```
          wp_nav_menu( array(
                      'theme_location'    => 'menu-1',
                      'menu_id'      	    => 'primary-menu',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'bs-example-navbar-collapse-1',
                      'menu_class'        => 'nav navbar-nav ml-auto',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker()
          ) );
       ```   


Happy Coding :)
