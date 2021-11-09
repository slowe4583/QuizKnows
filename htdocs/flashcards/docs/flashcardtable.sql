
// Step 1. Drop & Create database.
DROP DATABASE IF EXISTS flashcards;
CREATE DATABASE IF NOT EXISTS flashcards;

/*
* Step 2. Use the database
*/
USE flashcards;

/*
* Step 3. Create all tables
*/
CREATE TABLE subject (
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
	subject_name VARCHAR(32) NOT NULL
);

CREATE TABLE card (
	id INT(11) PRIMARY KEY AUTO_INCREMENT,
    subject_id INT(11) NOT NULL,
	question TEXT NOT NULL,
	answer TEXT NOT NULL
);

/*
* Step 4. Define Foreign Key Relations
*/
ALTER TABLE card ADD CONSTRAINT fk_card_subject_id__subject_subject_id FOREIGN KEY (subject_id) REFERENCES subject(id);

/*
* Step 5.
*/
INSERT INTO subject (`subject_name`) VALUES ("Chance Set");
