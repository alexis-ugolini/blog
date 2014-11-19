<?php

function my_autoload($class) {
    $filename = str_replace('_', '/', $class).'.class.php';
    if (file_exists($filename)) {
        require_once($filename);
    }
    else {
        error_log($filename.' non trouvé');
    }
}
spl_autoload_register('my_autoload');
if (isset($_GET['page']) && !empty($_GET['page'])) {
    if (file_exists('pages/'.$_GET['page'].'.php')) {
        $page = 'pages/'.$_GET['page'].'.php';
    }
    else {
        $page = 'pages/page.php';
    }
}
include($page);
include('templates/page.phtml');