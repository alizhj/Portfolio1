<?php
/* ******************************************************* */
/* ****************** NAVIGATION MENU ******************** */
/* ******************************************************* */

register_nav_menus(array(
    'primary' => __('Primary Menu'),
    'home' => __('Home Menu')
    ));

/* ******************************************************* */
/* ********************* JAVASCRIPT ********************** */
/* ******************************************************* */

function load_wp_media_files() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_wp_media_files');

wp_enqueue_script('mob-nav', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'));

/* ******************************************************* */
/* ******************** CUSTOM STYLES ******************** */
/* ******************************************************* */

function my_theme_add_editor_styles() {
    add_editor_style('css/custom-editor-style.css');

}
add_action('admin_init', 'my_theme_add_editor_styles');

/* ******************************************************* */
/* ****************** FEATURE IMAGE ********************** */
/* ******************************************************* */

//Add featured image

function support_setup(){
    add_theme_support('post-thumbnails');
    
}
add_action('after_setup_theme', 'support_setup');

//Add featured image 2 

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => __('Secondary Image', 'Portfolio_2015'),
            'id' => 'secondary-image',
            'post_type' => 'portfolio'
        )
    );
}

/* ******************************************************* */
/* ************************ CPT ************************** */
/* ******************************************************* */

//Creates Custom Post Type for Portfolio
function portfolio_init(){
    $args = array(
        'public'            => true,
        'has_archive'       => true,
        'show_ui'           => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,
        'rewrite'           => array('slug' => 'portfolio'),
        'query_var'         => true,
        'menu_icon'         => 'dashicons-portfolio',
        'label'             => 'Portfolio',
        'supports'          => array(
                                'title',
                                'editor',
                                'excerpt',
                                'custom-fields',
                                'thumbnail',
                                'page-attributes',)
        );
    register_post_type('portfolio', $args);


}
add_action('init', 'portfolio_init');

/* ******************************************************* */
/* ***************** TAXONOMY/CATEGORY ******************* */
/* ******************************************************* */

//Creates Taxonomy for Portfolio-projects

function portfolio_project_taxonomy(){
    $labels = array(
        'name'              => _x('Portfolio-projects', 'Portfolio_2015'), 
        'singular name'     => _x('Portfolio-project', 'Portfolio_2015'),
        'search_items'      => __('Search Portfolio-project', 'Portfolio_2015'),
        'parent_item'       => __('Parent Portfolio-project', 'Portfolio_2015'),
        'edit_item'         => __('Edit Portfolio-project', 'Portfolio_2015'),
        'update_item'       => __('Update Portfolio-project', 'Portfolio_2015'),
        'add_new_item'      => __('Add New Portfolio-project', 'Portfolio_2015'),
        'new_item_name'     => __('New Portfolio-project'),
        'menu_name'         => __('Portfolio-projects')
        );
        
    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        );

    register_taxonomy('portfolio_category', 'portfolio', $args);
}

add_action('init', 'portfolio_project_taxonomy', 0);

/* ******************************************************* */
/* *********************** TAGS ************************** */
/* ******************************************************* */

//create tags with skills to apply on portfolio-projects
function create_tag_taxonomies() {
 
  $labels = array(
    'name'                          => _x( 'Skills', 'taxonomy general name', 'Portfolio_2015' ),
    'singular_name'                 => _x( 'Skills', 'taxonomy singular name', 'Portfolio_2015' ),
    'search_items'                  => __( 'Search Skills', 'Portfolio_2015' ),
    'popular_items'                 => __( 'Popular Skills','Portfolio_2015' ),
    'all_items'                     => __( 'All Skills' ,'Portfolio_2015'),
    'parent_item'                   => null,
    'parent_item_colon'             => null,
    'edit_item'                     => __( 'Edit Skill','Portfolio_2015' ), 
    'update_item'                   => __( 'Update Skill','Portfolio_2015' ),
    'add_new_item'                  => __( 'Add New Skill','Portfolio_2015' ),
    'new_item_name'                 => __( 'New Skill Name','Portfolio_2015' ),
    'separate_items_with_commas'    => null,
    'add_or_remove_items'           => __( 'Add or remove skills', 'Portfolio_2015' ),
    'choose_from_most_used'         => __( 'Choose from the most used skills', 'Portfolio_2015' ),
    'menu_name'                     => __( 'Skills' ,'Portfolio_2015'),
  ); 

  register_taxonomy('skill','portfolio', array(
    'hierarchical'                  => false,
    'labels'                        => $labels,
    'show_ui'                       => true,
    'update_count_callback'         => '_update_post_term_count',
    'query_var'                     => true,
    'rewrite'                       => array( 'slug' => 'skill' ),
  ));
}
add_action( 'init', 'create_tag_taxonomies', 0 );


/* ******************************************************* */
/* ********************* METABOX ************************* */
/* ******************************************************* */

//Metabox for changeing the name on the front-page

function setup_name_metabox(){
    add_meta_box('start_name', __('Your name', 'Portfolio_2015'), 'show_start_name', 'page', 'side', 'high');
}

function show_start_name(){
    global $post;
    $firstname = get_post_meta($post->ID, 'portfolio-firstname', true);
    $surname = get_post_meta($post->ID, 'portfolio-surname', true);


    ?>
    <label for="firstname"> <? _e('Firstname' , 'Portfolio_2015')?> </label><br/>
    <input type="text" name="portfolio-firstname" value=<?php echo $firstname;?> /><br/>
    <label for="surname"> <? _e('Surname' , 'Portfolio_2015')?> </label><br/>
    <input type="text" name="portfolio-surname" value=<?php echo $surname;?> /> 
    <?php
}

function save_start_name($post_ID){
    update_post_meta($post_ID, 'portfolio-firstname', $_POST['portfolio-firstname']);
    update_post_meta($post_ID, 'portfolio-surname', $_POST['portfolio-surname']);

}

add_action('add_meta_boxes', 'setup_name_metabox');
add_action('save_post', 'save_start_name');

/* ******************************************************* */
/* ******************* THEME OPTIONS ********************* */
/* ******************************************************* */


function theme_portfolio_options(){
    add_theme_page('Portfolio-settings', 'Portfolio-settings',  'administrator', 'Portfolio2015_settings', 'print_portfolio_settings');
}

add_action ('admin_menu', 'theme_portfolio_options');

function print_portfolio_settings(){
    ?>
    <h1><? _e('Settings for Portfolio 2015', 'Portfolio_2015')?></h1>

    <?php
        if(isset($_POST['saved'])){

            update_option('page_facebook', $_POST["facebook"]);
            update_option('page_linkedin', $_POST["linkedin"]);
            update_option('page_instagram', $_POST["instagram"]);
            update_option('page_youtube', $_POST["youtube"]);

            update_option('page_copyright', $_POST["copyright"]);
            update_option('page_copyyear', $_POST["copyyear"]);
           
            ?>
            <div class="updated settings-error">
                <p>Saved</p>
            </div><!-- #updated settings-error -->
            <?php
        }

        $facebook = get_option('page_facebook');
        $linkedin = get_option('page_linkedin');
        $instagram = get_option('page_instagram');
        $youtube = get_option('page_youtube'); 

        $copyright = get_option('page_copyright');
        $copyyear = get_option('page_copyyear');
    ?>

    <form method="post" action="">

        <!-- ************* STARTPAGE SETTINGS ************ -->
        <h3><?_e('Startpage settings (social media)', 'Portfolio_2015')?></h3>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="facebook">Facebook</label>
                    </th>
                    <td>
                        <input type="text" name="facebook" class="regular-text" value="<?php echo $facebook; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="linkedin">Linkedin</label>
                    </th>
                    <td>
                        <input type="text" name="linkedin" class="regular-text" value="<?php echo $linkedin; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="instagram">Instagram</label>
                    </th>
                    <td>
                        <input type="text" name="instagram" class="regular-text" value="<?php echo $instagram; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="youtube">YouTube</label>
                    </th>
                    <td>
                        <input type="text" name="youtube" class="regular-text" value="<?php echo $youtube; ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        
        <!-- ************* FOOTER SETTINGS ************ -->
        
        <h3><? _e('Footer settings', 'Portfolio_2015')?></h3>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="copyright"><? _e('Copyright (use &copy)', 'Portfolio_2015')?></label>
                    </th>
                    <td>
                        <input type="text" name="copyright" class="regular-text" value="<?php echo $copyright; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="copyyear"><? _e('Copyyear', 'Portfolio_2015')?></label>
                    </th>
                    <td>
                        <input type="text" name="copyyear" class="regular-text" value="<?php echo $copyyear; ?>"/>
                    </td>
                </tr>
            </tbody>
        </table>


        <input type="submit" value="<? _e('Save changes', 'Portfolio_2015')?>" name="saved" class="button button-primary" /> 
    <?    
}

 
/* ******************************************************* */
/* ********************* SIDEBAR ************************* */
/* ******************************************************* */

function sidebar(){
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => __('Sidebar', 'Portfolio_2015'),
        'description' => __('sidebar shown in the blogpart', 'Portfolio_2015'),
        'before_widget' => '<li>',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'sidebar');

/* ******************************************************* */
/* ********************* LANGUAGES *********************** */
/* ******************************************************* */

load_theme_textdomain('Portfolio_2015', get_template_directory() . '/languages');

?>