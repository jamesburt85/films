<?php 

/**********************************************
 * Getting YouTube ID
 **********************************************/
function getYouTubeID($video) {
    if (preg_match('/(?<=(?:v|i)=)[a-zA-Z0-9-]+(?=&)|(?<=(?:v|i)\/)[^&\n]+|(?<=embed\/)[^"&\n]+|(?<=(?:v|i)=)[^&\n]+|(?<=youtu.be\/)[^&\n]+/', $video, $matches)) {

        //echo "A match was found: ";
        return $matches[0];
    } else {

        //echo "A match was not found.";
        return false;
    }
}

function getVimeoID($video) {
    // if () {
        $vim = substr(parse_url($video, PHP_URL_PATH), 1);
        return $vim;
    // } else {

        //echo "A match was not found.";
        // return false;
    // }
}

function getVideoType($url) {
    if (strpos($url, 'youtu') > 0) {
        return 'youtube';
    } elseif (strpos($url, 'vimeo') > 0) {
        return 'vimeo';
    } else {
        return 'unknown';
    }
}
    
// // detect if video URL is vimeo or Youtube
// function videoType($url) {
//     if (strpos($url, 'youtube') > 0) {
//         return 'youtube';
//     } elseif (strpos($url, 'vimeo') > 0) {
//         return 'vimeo';
//     } else {
//         return 'unknown';
//     }
// }
