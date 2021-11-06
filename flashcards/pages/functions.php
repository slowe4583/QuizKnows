<?php

/**
 * Functions.php will hold any functions that wish to be globally defined in the application.
 * That is we want to write them once here, and use them in views, as opposed to have to re-write
 * them in every single view that wish to use them.
 * 
 * An example would be a helper function that builds a url to another view
 */

 /**
  * Returns the $page_name concatenated to the BASE_URL (defined in constants.php)
  * @param string $page_name - the name of the page INCLUDING the .php extension
  *                          - Example: 'about.php', 'profile.php', etc
  * @return string  
  */
function get_url($page_name){
    return BASE_URL . '/' . $page_name;
}

?>