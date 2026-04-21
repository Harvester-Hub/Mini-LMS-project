<?php

class AuthController {

    public function login() {
        global $pdo;

        if ($_POST) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                header("Location:?page=home");
                exit;
            }
        }

        render('login');
    }

    public function register() {
        global $pdo;

        if ($_POST) {
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $role = $_POST['role'] ?? 'student';

            $stmt = $pdo->prepare("INSERT INTO users(email,password,role) VALUES (?,?,?)");
            $stmt->execute([$email, $password, $role]);

            header("Location:?page=login");
            exit;
        }

        render('register');
    }
}
?> 