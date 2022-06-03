<?php
/**
 * Plugin Name:       Practice Plugin Shortcode
 * Plugin URI:        https://abc.com/plugins/the-basics/
 * Description:       Plugin is made for practice
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bijit Deb
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 //don't call the file directly
 if ( !defined( 'ABSPATH' ) ) exit;

 echo( 'hello world' );


 function practice_contact_form( $atts, $contact ){
     $atts = shortcode_atts(array(
         'email' => get_option('admin_email'),
         'submit' => __( 'Send Email', 'practice' )
     ),$atts);

     $submit = false;
     if(isset( $_POST['practice_submit'])){
         $subject = $_POST['practice_subject'];
         $name = $_POST['practice_name'];
         $email = $_POST['practice_email'];
         $message = $_POST['practice_message'];

         $submit = true;
     }

     ob_start();
     ?>

     <?php if( $submit ){?>
         <h1><?php _e( 'Email sent successfully', 'practice' ); ?></h1>
    <?php }  ?>
    <form action="" id="practice_contact" method="post">
    <p>
        <label for="name"> Name </label>
        <input type="taxt" name="practice_name" value="">
    </p>
    <p>
        <label for="email"> Email </label>
        <input type="email" name="practice_email" value="">
    </p>
    <p>
        <label for="subject"> Subject </label>
        <input type="taxt" name="practice_subject" value="">
    </p>
    <p>
        <label for="message"> Message </label>
        <textarea  name="practice_message" id="message" cols="30" rows="5"></textarea>
    </p>
    <p>
        <input type= "submit" name="practice_submit" value="<?php echo esc_attr( $atts['submit'] );?>">
    </p>


    </form>
    <?php

     return ob_get_clean();


 }


 add_shortcode( 'practice_contact', 'practice_contact_form' );
 

function foobar_func( $atts ){

    var_dump($atts);
	return "foo and bar";
}
add_shortcode( 'foobar', 'foobar_func' );