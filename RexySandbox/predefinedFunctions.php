<?php 
// Sanitize the god damn inputs
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = cleanInput($data);
    return $data;
}
function cleanInput($data) {
    $search = array(
        '/&/i',  // ampersand
        '/</i',  // less than
        '/>/i',  // greater than
        '/"/i',  // quote
        '/\'/i'  // apostrophe
    );

    $replace = array(
        '',
        '',
        '',
        '',
        ''
    );

    $data = preg_replace($search, $replace, $data);

    return $data;
}
