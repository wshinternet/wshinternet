// Creating the widget 
class wpb_widget extends Wshiternet_Widget_Template {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'wsh_widget', 
  
// Widget name will appear in UI
__('WSH Internet Widget Template', 'wsh_widget_domain'), 
  
// Widget description
array( 'description' => __( 'Sample widget based on WSH Internet Widget Template', 'wpb_widget_domain' ), ) 
);
}
  
// Creating widget front-end
  
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
  
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
  
// This is where you run the code and display the output
echo __( 'Hello, WSH Internet World!', 'wsh_widget_domain' );
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wsh_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
 
// Class wsh_widget ends here
} 
 
 
// Register and load the widget
function wsh_load_widget() {
    register_widget( 'wsh_widget' );
}
add_action( 'widgets_init', 'wsh_load_widget' );
