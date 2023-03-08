<?php

// Fairly easy implementation of openAI Dalle in PHP. enjoy !
// PS- Thats the beauty of PHP. its easy !

// include this and you can generate 1 picture here (png)  !

require_once 'Dalle.php';

$openai = New Dalle();

if(!isset($_GET['prompt']))
$prompt = "Photo of a very confused robot.";
else
$prompt = $_GET['prompt'];

// Let's get a response.
// Usage : generation(prompt, image size i.e 1024x1024);
$response = $openai->generation( $prompt, "512x512");

// Let's get the answer from openAI within the response.
$img =(json_decode($response)->data[0]->url);
// Take pic content
$pic=file_get_contents($img);

// display pic

header('Content-Type: image/png');
echo $pic;

?>
