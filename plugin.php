<?php

/*
 * Plugin Name:       Darker 
 * Description:       Dark Themed Contact Form.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Sibabalwe Mafestire
 */

function test(){
    $example = "Test is working.....";
    return $example;
}
add_shortcode('show', 'test')


function formContact(){

    $content = '';

    $content .= '<form method="post" action="https://dev-raven-bags.pantheonsite.io/elementor-132/" >'
    
    $content .= '<label for="fullName">Full Name</label>';
    $content .= '<br />';
    $content .= '<input type="text" name="fullName" placeholder="Enter your Full Name">';

    $content .= '<label for="email">Email Address</label>';
    $content .= '<br />';
    $content .= '<input type="email" name="email" placeholder="e.g john@mail.com>';

    $content .= '<label for="message">Message</label>';
    $content .= '<br />';
    $content .= '<textarea name="message" placeholder="Message...">';

    $content .= '<input type="submit" name="send" value="Submit"'

    $content .= '</form>';

    return $content;
}

add_shortcode('contact', 'formContact');

function capture(){

    if(array_key_exists('send', $_POST)){
        $to = "seabaraven@gmail.com";
        $subject = "Blog";
        $body = '';

        $body .= 'Name: '.$_POST['fullName']. ' <br /> ';
        $body .= 'Email: '.$_POST['email'].' <br /> ';
        $body .= 'Message: '$_POST['send'].' <br />';

        wp_mail($to,$subject,$body);
    }
}

add_action('wp_head', 'capture')
?>