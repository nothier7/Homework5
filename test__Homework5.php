<?php
    function calculateFinalGrade($homeworks, $quizzes, $midterm, $final) {
    $homeworkWeight = 0.4;
    $quizWeight = 0.2;
    $midtermWeight = 0.2;
    $finalWeight = 0.2;

    $homeworkAvg = !empty($homeworks) ? array_sum($homeworks) / count($homeworks) : 0;
    $quizAvg = !empty($quizzes) ? array_sum($quizzes) / count($quizzes) : 0;

    $finalGrade = ($homeworkAvg * $homeworkWeight) + ($quizAvg * $quizWeight) + 
                  ($midterm * $midtermWeight) + ($final * $finalWeight);

    return round($finalGrade);
}


function assertEqual($actual, $expected, $testName) {
    if ($actual === $expected) {
        echo "$testName passed.\n";
    } else {
        echo "$testName failed: Expected $expected but got $actual.\n";
    }
}



function generateGoodScores() {
    $homeworks = [75, 89, 103, 55, 100];
    $quizzes = [65, 78, 99, 76, 69];
    $midterm = 86;
    $final = 90;
    return [$homeworks, $quizzes, $midterm, $final];
}

function test_calculation_is_correct() {
    [$homeworks, $quizzes, $midterm, $final] = generateGoodScores();
    $result = calculateFinalGrade($homeworks, $quizzes, $midterm, $final);
    assertEqual($result, 87, "test_calculation_is_correct");
}

function test_calculation_succeeds_with_no_homeworks() {
    [$homeworks, $quizzes, $midterm, $final] = generateGoodScores();
    $homeworks = [];  
    $result = calculateFinalGrade($homeworks, $quizzes, $midterm, $final);
    assertEqual($result, 70, "test_calculation_succeeds_with_no_homeworks");
}

function test_calculation_succeeds_with_no_quizzes() {
    [$homeworks, $quizzes, $midterm, $final] = generateGoodScores();
    $quizzes = []; 
    $result = calculateFinalGrade($homeworks, $quizzes, $midterm, $final);
    assertEqual($result, 79, "test_calculation_succeeds_with_no_quizzes");
}

function test_calculation_succeeds_with_1_quiz() {
    [$homeworks, $quizzes, $midterm, $final] = generateGoodScores();
    $quizzes = [30];  
    $result = calculateFinalGrade($homeworks, $quizzes, $midterm, $final);
    assertEqual($result, 87, "test_calculation_succeeds_with_1_quiz");
}



