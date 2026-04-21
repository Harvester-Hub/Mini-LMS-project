<?php

session_start();
require_once 'config/db.php';
require_once 'core/helpers.php';

require_once 'models/Post.php';
require_once 'models/Grade.php';
require_once 'models/TeacherSubject.php';

require_once 'controllers/AuthController.php';
require_once 'controllers/PostController.php';
require_once 'controllers/DiaryController.php';
require_once 'controllers/ProfileController.php';

$page = $_GET['page'] ?? 'home';

function render($view, $data = []) {
    extract($data);
    require "views/layout/header.php";
    require "views/$view.php";
    require "views/layout/footer.php";
}

switch ($page) {
    case 'home': render('home'); break;
    case 'posts': (new PostController())->index(); break;
    case 'add': (new PostController())->create(); break;
    case 'edit': (new PostController())->edit(); break;
    case 'delete': (new PostController())->delete(); break;

    case 'profile': (new ProfileController())->index(); break;
    case 'diary': (new DiaryController())->index(); break;

    case 'login': (new AuthController())->login(); break;
    case 'register': (new AuthController())->register(); break;
    case 'logout': session_destroy(); header('Location:?page=home'); break;

    case 'api_posts':
        header('Content-Type: application/json');
        echo json_encode((new Post())->allVisible());
        break;

    default: render('404');
}
?>