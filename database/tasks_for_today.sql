-- Import into an existing empty database selected in phpMyAdmin.
-- Relative dates make the sample valid on the day it is imported.
CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  status VARCHAR(20) NOT NULL DEFAULT 'pending',
  task_date DATE NOT NULL,
  created_at DATETIME NOT NULL
);
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  created_at DATETIME NOT NULL
);
-- Fresh database only: do not import twice or duplicate demo rows.
INSERT INTO tasks (title,status,task_date,created_at) VALUES
('Review project requirements','done',DATE_SUB(CURDATE(), INTERVAL 1 DAY),NOW()),
('Set up database','done',DATE_SUB(CURDATE(), INTERVAL 1 DAY),NOW()),
('Check team messages','pending',CURDATE(),NOW()),
('Prepare task dashboard','in progress',CURDATE(),NOW()),
('Test task list page','pending',CURDATE(),NOW()),
('Review profile page','pending',CURDATE(),NOW()),
('Prepare presentation','pending',DATE_ADD(CURDATE(), INTERVAL 1 DAY),NOW()),
('Submit project links','pending',DATE_ADD(CURDATE(), INTERVAL 1 DAY),NOW());
INSERT INTO users (username,full_name,email,created_at) VALUES
('demo_user','Demo User','demo@example.com',NOW());
