CREATE DATABASE IF NOT EXISTS getthecuedatabase;

USE getthecuedatabase;

CREATE TABLE users (
    UserId INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(25),
    Levels_Beat INT(15),
    Collectables_Got INT(15),
    Highscore INT(25),
)

CREATE TABLE levels (
    LevelId INT AUTO_INCREMENT PRIMARY KEY,
    CollectableId INT(15),
    LevelName VARCHAR(50),
)

--Dummy Data--
INSERT INTO users (Username, Levels_Beat, Collectables_Got, Highscore) VALUES
('test', 2, 1, 200)

INSERT INTO levels (CollectableId, LevelName) VALUES 
(1, "TestLevel")