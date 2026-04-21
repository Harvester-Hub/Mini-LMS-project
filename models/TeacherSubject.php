<?php

class TeacherSubject {

    public function allowed($tid,$sub) {
        global $pdo;

        $s = $pdo->prepare("
            SELECT * FROM teacher_subjects
            WHERE teacher_id=? AND subject=?
        ");

        $s->execute([$tid,$sub]);
        return $s->fetch();
    }
}
?>