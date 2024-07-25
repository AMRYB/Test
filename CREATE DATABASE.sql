CREATE DATABASE students_db;

USE students_db;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    grade INT
);
INSERT INTO students (id, username, password, grade) VALUES (231052121, '231052121', '$2y$10$e0MYzXyjpJS2rXzjY4hAeO./vV2/M1w/.EpHErj4S3A4Yf9cY6cWO', 85);
