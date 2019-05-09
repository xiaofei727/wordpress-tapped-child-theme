<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Presents_List  extends WP_List_Table {

    /**
     * Initialize the table list.
     */
    public function __construct() {
        parent::__construct( array(
            'singular' => __( 'Present', 'sp' ),
            'plural'   => __( 'Presents', 'sp' ),
            'ajax'     => false
        ) );
    }

  
    /**
     * Retrieve customer’s data from the database
     *
     * @param int $per_page
     * @param int $page_number
     *
     * @return mixed
     */
    public static function get_presents( $per_page = 5, $page_number = 1 ) {

      global $wpdb;

      $sql = "SELECT * FROM {$wpdb->prefix}presents";


      $search = '';

        if ( ! empty( $_REQUEST['s'] ) ) {
            $search = "AND full_name LIKE '%" . esc_sql( $wpdb->esc_like( $_REQUEST['s'] ) ) . "%' ";
        }


      if ( ! empty( $_REQUEST['orderby'] ) ) {
        $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
        $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
      }

      $sql .= " WHERE 1 = 1 $search";

      $sql .= " LIMIT $per_page";

      $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


      $result = $wpdb->get_results( $sql, 'ARRAY_A' );

      return $result;
    }

    /**
     * Delete a customer record.
     *
     * @param int $id customer ID
     */
    public static function delete_present( $id ) {
      global $wpdb;

      $wpdb->delete(
        "{$wpdb->prefix}presents",
        [ 'id' => $id ],
        [ '%d' ]
      );
    }

    /**
     * Returns the count of records in the database.
     *
     * @return null|string
     */
    public static function record_count() {
      global $wpdb;

      $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}presents";

      return $wpdb->get_var( $sql );
    }

    /** Text displayed when no customer data is available */
    public function no_items() {
      _e( 'No presents avaliable.', 'sp' );
    }

    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_full_name( $item ) {

      // create a nonce
      $delete_nonce = wp_create_nonce( 'sp_delete_present' );

      $title = '<strong>' . $item['full_name'] . '</strong>';

      $actions = [
        'delete' => sprintf( '<a href="?page=%s&action=%s&present=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item['id'] ), $delete_nonce )
      ];

      return $title . $this->row_actions( $actions );
    }

    /**
     * Render a column when no column specific method exists.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default( $item, $column_name ) {
      switch ( $column_name ) {
        case 'email':
        case 'phone':
        case 'event':
        case 'present':
        case 'keg':
        case 'message':
          return $item[ $column_name ];
        default:
          return print_r( $item, true ); //Show the whole array for troubleshooting purposes
      }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb( $item ) {
      return sprintf(
        '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
      );
    }

    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
      $columns = [
        'cb'      => '<input type="checkbox" />',
        'full_name'    => __( 'Full Name', 'sp' ),
        'email' => __( 'Email', 'sp' ),
        'phone' => __( 'Phone', 'sp' ),
        'event'    => __( 'Event', 'sp' ),
        'present'    => __( 'Present', 'sp' ),
        'keg'    => __( 'Keg', 'sp' ),
        'message'    => __( 'Message', 'sp' ),
      ];

      return $columns;
    }

    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
      $sortable_columns = array(
        'full_name' => array( 'full_name', true ),
        'email' => array( 'email', false )
      );

      return $sortable_columns;
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
      $actions = [
        'bulk-delete' => 'Delete'
      ];

      return $actions;
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

      $this->_column_headers = $this->get_column_info();

      /** Process bulk action */
      $this->process_bulk_action();

      $per_page     = $this->get_items_per_page( 'customers_per_page', 5 );
      $current_page = $this->get_pagenum();
      $total_items  = self::record_count();

      $this->set_pagination_args( [
        'total_items' => $total_items, //WE have to calculate the total number of items
        'per_page'    => $per_page //WE have to determine how many items to show on a page
      ] );


      $this->items = self::get_presents( $per_page, $current_page );
    }

    public function process_bulk_action() {

      //Detect when a bulk action is being triggered...
      if ( 'delete' === $this->current_action() ) {

        // In our file that handles the request, verify the nonce.
        $nonce = esc_attr( $_REQUEST['_wpnonce'] );

        if ( ! wp_verify_nonce( $nonce, 'sp_delete_present' ) ) {
          die( 'Go get a life script kiddies' );
        }
        else {
          self::delete_present( absint( $_GET['present'] ) );
          
//           wp_redirect( admin_url( '/admin.php?page=wp_list_table_class' ), 301 );
//          exit;
        }

      }

      // If the delete bulk action is triggered
      if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
           || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
      ) {

        $delete_ids = esc_sql( $_POST['bulk-delete'] );

        // loop over the array of record IDs and delete them
        foreach ( $delete_ids as $id ) {
          self::delete_present( $id );

        }

//        wp_redirect( esc_url( add_query_arg() ) );
//        exit;
      }
    }
}