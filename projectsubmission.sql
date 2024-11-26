CREATE DATABASE IF NOT EXISTS projectsubmission;

USE projectsubmission;

CREATE TABLE IF NOT EXISTS submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentName VARCHAR(100) NOT NULL,
    universityRoll VARCHAR(50) NOT NULL,
    classRoll VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    filePath VARCHAR(255) NOT NULL,
    submissionTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
