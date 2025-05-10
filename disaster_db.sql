CREATE DATABASE disaster_db;
USE disaster_db;

-- Disasters Table
CREATE TABLE disasters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    type VARCHAR(50),
    location VARCHAR(100),
    date DATE,
    severity ENUM('Low', 'Medium', 'High')
);

-- Rescue Teams Table
CREATE TABLE rescue_teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_name VARCHAR(100),
    members_count INT,
    contact VARCHAR(50)
);

-- Victims Table
CREATE TABLE victims (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    status ENUM('Safe', 'Injured', 'Missing'),
    disaster_id INT,
    assigned_team_id INT,
    FOREIGN KEY (disaster_id) REFERENCES disasters(id),
    FOREIGN KEY (assigned_team_id) REFERENCES rescue_teams(id)
);

-- Resources Table
CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_type VARCHAR(50),
    quantity INT,
    location VARCHAR(100)
);
