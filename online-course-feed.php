<?php
/* Plugin Name: Online Course Feed
 * Version: 1.0.2
 * Author: Jeff Everhart
 * Author URI: http://altlab.vcu.edu/team-members/jeff-everhart/
 * License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Description: This plugin grabs the online course feed from the VP for Instruction data feed. This exist because we don't understand CORS.
 *
*/


function get_data() {
   $file = file_get_contents('https://vpforinstruction.vcu.edu/JSON/JSONdataJS.aspx');
   return json_decode($file);
}

add_action( 'rest_api_init', function () {
    register_rest_route( 'online-course-feed/v1', '/data', array(
        'methods' => 'GET',
        'callback' => 'get_data',
    ) );
} );


?>