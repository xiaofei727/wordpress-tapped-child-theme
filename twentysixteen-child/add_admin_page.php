<?php


/* add new admin page */

function sports_bench_team_admin_menu() {
 global $team_page;
 add_menu_page( __( 'Teams', 'sports-bench' ), __( 'Teams', 'sports-bench' ), 'edit_posts', 'show_presents', 'sports_bench_teams_page_handler', 'dashicons-groups', 21 ) ;
}

add_action( 'admin_menu', 'sports_bench_team_admin_menu' );

function sports_bench_teams_page_handler() {

	echo ' Team page';

}

function sports_bench_teams_form_page_handler() {

  	$table_name = "wp_presents";
  	global $wpdb;
  	echo '<form method="POST" action="?page=add_data">
	 <label>Team Name: </label><input type="text" name="team_name" /><br />
	 <label>Team City: </label><input type="text" name="team_city" /><br />
	 <label>Team State: </label><input type="text" name="team_state" /><br />
	 <label>Team Stadium: </label><input type="text" name="team_stadium" /><br />
	<input type="submit" value="submit" />
	</form>';

  	$default_row = $wpdb->get_row( "SELECT * FROM $table_name ORDER BY team_id DESC LIMIT 1" );

	if ( $default_row != null ) {
	 $id = $default_row->team_id + 1;
	} else {
	 $id = 1;
	}
	 $default = array(
	 'team_id' => $id,
	 'team_name' => '',
	 'team_city' => '',
	 'team_state' => '',
	 'team_stadium' => '',
	);
	$item = shortcode_atts( $default, $_REQUEST );

 	$wpdb->insert( $table_name, $item );

}