<?php

declare(strict_types=1);

use App\Database\Database;

$commandSeeder = $argv[2];

if ($commandSeeder === 'questions') {

    $db = new Database();
    $pdo = $db->conn();

    $questions = require APP_PATH . '/bin/Repository/questionsRepository.php';

    $pdo->beginTransaction();

    $sql = "INSERT INTO questions (title, question_text, answer1, answer2, answer3,answer4, true_answer)
        VALUES (:title, :question_text, :answer1, :answer2, :answer3, :answer4, :true_answer)
        ";

    $stmt = $pdo->prepare($sql);

    foreach ($questions as $question) {
        $stmt->execute([
            ':title' => $question['title'],
            ':question_text' => $question['question_text'],
            ':answer1' => $question['answer1'],
            ':answer2' => $question['answer2'],
            ':answer3' => $question['answer3'],
            ':answer4' => $question['answer4'],
            ':true_answer' => $question['true_answer'],
        ]);
    }
    $pdo->commit();
}
