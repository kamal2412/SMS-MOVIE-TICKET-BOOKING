<?php 
$to = "testwork0@gmail.com";
$subject = "Hi!";
$body = "Hi How are you?";
$headers = "From: testmail0@testwork0.20megsfree.com";
if (mail($to, $subject, $body, $headers)) {
    echo ("Message successfully sent!");
} else {
    echo ("Message delivery failed...");
}?>