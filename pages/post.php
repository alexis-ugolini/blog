<?php

$posts = new Model_Post();
$post = $posts->getPost();
$date = new DateTime($post['date_crea']);
$date_crea = $date->getTimestamp();
$date = new DateTime($post['date_modif']);
$date_modif = $date->getTimestamp();
