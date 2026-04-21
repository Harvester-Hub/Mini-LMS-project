<?php

class PostController {

    public function index() {
        render('posts', ['posts' => (new Post())->allVisible()]);
    }

    public function create() {
        if (!user()) return;

        if ($_POST) {
            if (!check_csrf($_POST['csrf'])) return;

            (new Post())->create(
                $_POST['title'],
                $_POST['content'],
                user()['id'],
                $_POST['visibility']
            );
        }

        render('add');
    }

    public function edit() {
        $p = (new Post())->find($_GET['id']);

        if ($_POST) {
            (new Post())->update($_GET['id'], $_POST['title'], $_POST['content'], user()['id']);
            header("Location:?page=posts");
        }

        render('edit', ['post' => $p]);
    }

    public function delete() {
        (new Post())->delete($_GET['id'], user()['id']);
        header("Location:?page=posts");
    }
}
?>