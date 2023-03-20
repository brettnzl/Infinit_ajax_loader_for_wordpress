<?php 
function rd_infinite_scroll() {
    global $wp_query;

    if( ! is_singular() ) {

        $total_pages = $wp_query->max_num_pages;
        $next_page = ( get_query_var('paged') > 1 ) ? get_query_var('paged') + 1 : 2;
        $load_more_html = '<div class="rd-load-more"><a href="#" data-nextpage="'.$next_page.'" data-totalpages="'.$total_pages.'">Load More</a></div>';

        return $load_more_html;
    }
}

add_shortcode( 'rd_pagination', 'rd_infinite_scroll' );


function rd_load_more_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'rd-infinite-scroll', get_stylesheet_directory_uri() . '/includes/rd-pagination/js/rd-infinite-scroll.js', array( 'jquery' ), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'rd_load_more_scripts' );

function rd_load_more_ajax_handler() {
    $next_page = $_POST['next_page'];
    $total_pages = $_POST['total_pages'];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $next_page
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) :

        while ( $query->have_posts() ) : $query->the_post(); ?>

            <div class="col-md-4 col-md-6">
                <?php get_template_part('partials/cards/category-post') ?>
            </div>

        <?php endwhile;

    endif;

    wp_reset_postdata();

    if( $next_page == $total_pages ) {
        die();
    }

    wp_die();
}

add_action( 'wp_ajax_rd_load_more', 'rd_load_more_ajax_handler' );
add_action( 'wp_ajax_nopriv_rd_load_more', 'rd_load_more_ajax_handler' );

function rd_ajax_url() {
    echo '<script type="text/javascript">var ajaxurl = "' . admin_url('admin-ajax.php') . '";</script>';
}

add_action( 'wp_head', 'rd_ajax_url' );


?>