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

$_user = array();
if (isset($_SERVER['user']) && !empty($_SERVER['user']) && is_int($_SERVER['user'])) {
    $_users = new Model_User;
    $_user = $_users->getUser();
}

$_page = (isset($_GET['page']) && !empty($_GET['page']) && file_exists('pages/'.$_GET['page'].'.php'))?$_GET['page']:'accueil';
include('pages/'.$_page.'.php');

$_pages = array(
    'accueil' => array(
        'title'=>'Blog blog',
        'styles'=>array('style', 'post'),
        'scripts'=>array('accueil')
    ),
    'post' => array(
        'title'=>@$post['title'],
        'styles'=>array('style', 'post'),
        'scripts'=>array('accueil')
    )
);
$_p = count(explode('/', $_SERVER['REQUEST_URI']))-count(explode('/', $_SERVER['PHP_SELF']));
$_path = '';
for ($i=0; $i<$_p; $i++) {
    $_path .= '../';
}
include('templates/page.phtml');