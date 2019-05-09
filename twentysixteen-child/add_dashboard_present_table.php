<?php
// Dashboard Table
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
 
wp_add_dashboard_widget('custom_help_widget', 'Present ', 'custom_dashboard_help');

}
 
function custom_dashboard_help() {

    global $wpdb;
    // $result = $wpdb->get_results ( "SELECT * FROM wp_presents" );
    // $rowcount = $wpdb->num_rows;
 //    echo '
 //    <div class="main">
  // <ul>
  // <li class="post-count">
  // <a href="edit.php?post_type=present">'  . $rowcount . ' Presents</a></li>
  // </ul>
  // </div>';

  $_table_list = new Dashboard_Present_Table();
  echo '<form method="post">';
  $_table_list->prepare_items();
  $_table_list->search_box( __( 'Search', 'sp' ), 'key' );
  $_table_list->display();
  echo '</form>';

    // foreach ( $result as $print )   {
     //  echo '<p>' . $print->full_name . '</p>';
    // }
}

?>

