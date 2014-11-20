<?php

$posts = new Model_Post();
$post = $posts->getPost((int)$_GET['post']);
