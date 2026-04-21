<?php

class ProfileController {

    public function index() {
        $u = user();
        if (!$u) {
            header("Location:?page=login");
            exit;
        }

        global $pdo;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$u['id']]);
        $profile = $stmt->fetch();

        render('profile', ['profile' => $profile]);
    }
}
?>