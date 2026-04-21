<?php
class Grade {
    public function byStudent($id){
        global $pdo;
        $s=$pdo->prepare("SELECT * FROM grades WHERE student_id=?");
        $s->execute([$id]);
        return $s->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($sid,$sub,$g){
        global $pdo;
        $s=$pdo->prepare("INSERT INTO grades(student_id,subject,grade) VALUES (?,?,?)");
        return $s->execute([$sid,$sub,$g]);
    }
}
?>