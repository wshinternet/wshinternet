if ( !function_exists( 'add_plugins_page' ) ) { 
    require_once ABSPATH . '/wp-admin/includes/plugin.php'; 
} 
  
// The text to be displayed in the title tags of the page when the menu is selected. 
$page_title = ''; 
  
// The text to be used for the menu. 
$menu_title = ''; 
  
// The capability required for this menu to be displayed to the user. 
$capability = ''; 
  
// The slug name to refer to this menu by (should be unique for this menu). 
$menu_slug = ''; 
  
// The function to be called to output the content for this page. 
$function = ''; 
  
// NOTICE! Understand what this does before running. 
$result = add_plugins_page($page_title, $menu_title, $capability, $menu_slug, $function); 
