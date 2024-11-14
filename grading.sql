CREATE DATABASE Mygrading;
USE Mygrading;

CREATE TABLE Students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL
);


CREATE TABLE Grades (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    Homework_1 INT CHECK (Homework_1 BETWEEN 0 AND 110),
    Homework_2 INT CHECK (Homework_2 BETWEEN 0 AND 110),
    Homework_3 INT CHECK (Homework_3 BETWEEN 0 AND 110),
    Homework_4 INT CHECK (Homework_4 BETWEEN 0 AND 110),
    Homework_5 INT CHECK (Homework_5 BETWEEN 0 AND 110),
    Quizz_1 INT CHECK (Quizz_1 BETWEEN 0 AND 110),
    Quizz_2 INT CHECK (Quizz_2 BETWEEN 0 AND 110),
    Quizz_3 INT CHECK (Quizz_3 BETWEEN 0 AND 110),
    Quizz_4 INT CHECK (Quizz_4 BETWEEN 0 AND 110),
    Quizz_5 INT CHECK (Quizz_5 BETWEEN 0 AND 110),
    Midterm INT CHECK (Midterm BETWEEN 0 AND 110),
    Final INT CHECK (Final BETWEEN 0 AND 110),
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

INSERT INTO Students (first_name, last_name) VALUES ('Lionel', 'Messi'),
                                                          ('Lamine', 'Yamal'),
                                                          ('Thierno', 'Diallo');


