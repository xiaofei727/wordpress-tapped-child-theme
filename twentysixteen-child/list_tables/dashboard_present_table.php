<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Dashboard_Present_Table extends WP_List_Table {

    /**
     * Initialize the table list.
     */
    public function __construct() {
        parent::__construct( array(
            'singular' => __( 'present', 'sp' ),
            'plural'   => __( 'presents', 'sp' ),
            'ajax'     => false
        ) );
    }

    /**
     * Get list columns.
     *
     * @return array
     */
    public function get_columns() {
        return array(
            'cb'            => '<input type="checkbox" />',
            'full_name'         => __( 'Full Name', 'sp' ),
            'event'         => __( 'Event', 'sp' ),
            'present'         => __( 'Present', 'sp' ),
        );
    }



    /**
     * Column cb.
     */
    public function column_cb( $item ) {
        return sprintf( '<input type="checkbox" name="item[]" value="%1$s" />', $item['id'] );
    }

    

    /**
     * Return ID column
     */
    public function column_id( $item ) {
        return $item['id'];
    }

    /**
     * Return full_name column
     */
    public function column_full_name( $item ) {
        return $item['full_name'];
    }

    
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
     * Get bulk actions.
     *
     * @return array
     */
    protected function get_bulk_actions() {
        return array(

        );
    }

    /**
     * Prepare table list items.
     */
    public function prepare_items() {
        global $wpdb;

        $per_page = 5;
        $columns  = $this->get_columns();
        $hidden   = array();
        $sortable = $this->get_sortable_columns();

        // Column headers
        $this->_column_headers = array( $columns, $hidden, $sortable );

        $current_page = $this->get_pagenum();
        if ( 1 < $current_page ) {
            $offset = $per_page * ( $current_page - 1 );
        } else {
            $offset = 0;
        }

        $search = '';

        if ( ! empty( $_REQUEST['s'] ) ) {
            $search = "AND full_name LIKE '%" . esc_sql( $wpdb->esc_like( $_REQUEST['s'] ) ) . "%' ";
        }

        $items = $wpdb->get_results(
            "SELECT id, full_name, event, present FROM {$wpdb->prefix}presents WHERE 1 = 1 {$search}" .
            $wpdb->prepare( "ORDER BY id ASC LIMIT %d OFFSET %d;", $per_page, $offset ), ARRAY_A
        );

        $count = $wpdb->get_var( "SELECT COUNT(id) FROM {$wpdb->prefix}presents WHERE 1 = 1 {$search};" );

        $this->items = $items;

        // Set the pagination
        $this->set_pagination_args( array(
            'total_items' => $count,
            'per_page'    => $per_page,
            'total_pages' => ceil( $count / $per_page )
        ) );
    }
}