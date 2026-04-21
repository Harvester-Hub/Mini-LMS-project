<?php

class Post {

    public function allVisible() {
        global $pdo;

        $role = user()['role'] ?? 'guest';

        $stmt = $pdo->prepare("
            SELECT p.*, u.email
            FROM posts p
            JOIN users u ON p.user_id = u.id
            WHERE p.visibility='all' OR p.visibility=?
            ORDER BY p.id DESC
        ");

        $stmt->execute([$role]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($t,$c,$uid,$v) {
        global $pdo;
        $s = $pdo->prepare("INSERT INTO posts(title,content,user_id,visibility) VALUES (?,?,?,?)");
        return $s->execute([$t,$c,$uid,$v]);
    }

    public function find($id) {
        global $pdo;
        $s = $pdo->prepare("SELECT * FROM posts WHERE id=?");
        $s->execute([$id]);
        return $s->fetch();
    }

    public function update($id,$t,$c,$uid) {
        global $pdo;
        $s = $pdo->prepare("UPDATE posts SET title=?,content=? WHERE id=? AND user_id=?");
        return $s->execute([$t,$c,$id,$uid]);
    }

    public function delete($id,$uid) {
        global $pdo;
        $s = $pdo->prepare("DELETE FROM posts WHERE id=? AND user_id=?");
        return $s->execute([$id,$uid]);
    }
}
?>