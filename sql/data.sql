-- Table for Web Developers
CREATE TABLE web_devs (
    web_dev_id INT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    date_of_birth DATE,
    specialization TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Projects
CREATE TABLE projects (
    project_id INT PRIMARY KEY,
    project_name VARCHAR(50),
    technologies_used TEXT,
    web_dev_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (web_dev_id) REFERENCES web_devs(web_dev_id)
);

-- Table for Video Game Publishers
CREATE TABLE publishers (
    publisher_id INT PRIMARY KEY,
    name VARCHAR(100) UNIQUE,
    country VARCHAR(50),
    founded_year INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for Video Games
CREATE TABLE video_games (
    game_id INT PRIMARY KEY,
    title VARCHAR(100) UNIQUE,
    genre VARCHAR(50),
    release_date DATE,
    publisher_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (publisher_id) REFERENCES publishers(publisher_id)
);

-- Insert sample data into web_devs table
INSERT INTO web_devs (web_dev_id, username, first_name, last_name, date_of_birth, specialization)
VALUES
(1, 'morthread', 'Kenji', 'Gonzales', '2001-09-19', 'webdev'),
(2, 'ris', 'Gabriel', 'Arcega', '2002-07-21', 'frontend'),
(3, 'maestro', 'Aeron', 'Dualan', '2000-06-25', 'backend');

-- Insert sample data into projects table
INSERT INTO projects (project_id, project_name, technologies_used, web_dev_id)
VALUES
(1, 'Website Redesign', 'HTML, CSS, JavaScript', 1),
(2, 'E-commerce Platform', 'React, Node.js, MongoDB', 2),
(3, 'Analytics Dashboard', 'Python, Django, PostgreSQL', 3);

-- Insert sample data into publishers table
INSERT INTO publishers (publisher_id, name, country, founded_year)
VALUES
(1, 'Electronic Arts', 'USA', 1982),
(2, 'Nintendo', 'Japan', 1889),
(3, 'Ubisoft', 'France', 1986);

-- Insert sample data into video_games table
INSERT INTO video_games (game_id, title, genre, release_date, publisher_id)
VALUES
(1, 'The Sims', 'Simulation', '2000-02-04', 1),
(2, 'Super Mario Bros.', 'Platform', '1985-09-13', 2),
(3, 'Assassin\'s Creed', 'Action-Adventure', '2007-11-13', 3);

