<?php include('list_tables/dashboard_present_table.php') ?>
<?php include('list_tables/page_present_table.php') ?>
<?php include('list_tables/page_present_plugin.php') ?>

<?php include('add_dashboard_present_table.php') ?>
<?php //include('add_custom_post_type.php') ?>
<?php // include('add_admin_page.php') ?>

<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

?>


<?php
// Form submit handler
add_action( 'admin_post_nopriv_reserve_form', 'process_tapped_form_data' );
add_action( 'admin_post_reserve_form', 'process_tapped_form_data' );

function process_tapped_form_data() {
	global $wpdb;

	// include upgrade-functions for maybe_create_table;
	if ( !function_exists( 'maybe_create_table' ) ) { 
	    require_once ABSPATH . '/wp-admin/install-helper.php'; 
	} 

	// Create database table SQL. 
	$create_ddl = "CREATE TABLE `wp_presents`( `id` INT(11) NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(255) NOT NULL , `email` VARCHAR(255) NOT NULL , `phone` VARCHAR(255) NOT NULL , `event` VARCHAR(255) NOT NULL , `present` VARCHAR(255) NOT NULL , `keg` VARCHAR(255) NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`))";

 	
  	$table_name = $wpdb->prefix . 'presents';
	$full_name = $_POST['full_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$event = $_POST['event'];
	$present = $_POST['present'];
	$keg = '';
	if($present == 'Keg')
	{
		$keg = $_POST['keg'];
	}
	$message = $_POST['message'];

	
	// create the table, as needed
	maybe_create_table( $table_name, $create_ddl );

	// insert data to the table
	$success = $wpdb->insert($table_name, array(
		   "full_name" => $full_name,
		   "email" => $email,
		   "phone" => $phone,
		   "event" => $event,
		   "present" => $present ,
		   "keg" => $keg ,
		   "message" => $message ,
		),
		array( '%s', '%s', '%s', '%s', '%s', '%s', '%s' )
	);

 	if($success) {
 		echo '<script>window.location="' . site_url('/') . '"</script>';
// 		echo "redirect to : " . site_url('/');
	 	wp_redirect( site_url('/') ); // <-- here goes address of site that user should be redirected after submitting that form
	 	exit();
  	} else {
	   echo 'not';
   	}


	die;
  
}


?>


