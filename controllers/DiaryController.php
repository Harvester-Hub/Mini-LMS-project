<?php

class DiaryController {

    public function index() {
        $u = user();
        if (!$u) return;

        global $pdo;

        $grade = new Grade();

        if ($u['role'] === 'student') {
            render('diary_student', [
                'grades' => $grade->byStudent($u['id'])
            ]);
        }

        if ($u['role'] === 'teacher') {

            $students = $pdo->query("
                SELECT id, email
                FROM users
                WHERE role = 'student'
            ")->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $pdo->prepare("
                SELECT subject
                FROM teacher_subjects
                WHERE teacher_id = ?
            ");

            $stmt->execute([$u['id']]);
            $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($_POST) {

                $subject = trim($_POST['subject'] ?? '');
                $studentId = (int)($_POST['student_id'] ?? 0);
                $gradeValue = (int)($_POST['grade'] ?? 0);

                $check = $pdo->prepare("
                    SELECT 1
                    FROM teacher_subjects
                    WHERE teacher_id = ? AND subject = ?
                ");

                $check->execute([$u['id'], $subject]);

                if (!$check->fetchColumn()) {
                    die("No access to this subject");
                }

                $grade->add($studentId, $subject, $gradeValue);
            }

            render('diary_teacher', [
                'students' => $students,
                'subjects' => $subjects
            ]);

            return;
        }
    }
}
?>