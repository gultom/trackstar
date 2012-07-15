DROP DATABASE trackstar;
CREATE DATABASE trackstar;
USE trackstar;

CREATE TABLE projects (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(128),
    description text,
    create_time DATETIME,
    create_userid INTEGER,
    update_time DATETIME,
    update_userid INTEGER
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS issues (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name varchar(256) NOT NULL,
    description text,
    project_id INTEGER, 
    type_id INTEGER,
    status_id INTEGER,
    owner_id INTEGER,
    requester_id INTEGER,
    create_time DATETIME,
    create_userid INTEGER,
    update_time DATETIME,
    update_userid INTEGER
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS users (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email varchar(256),
    username varchar(256),
    password varchar(256),
    last_login_time datetime,
    create_time DATETIME,
    create_userid INTEGER,
    update_time DATETIME,
    update_userid INTEGER
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS project_user_assignment (
    project_id int not null,
    user_id int not null,
    create_time datetime ,
    create_userid integer,
    update_time datetime,
    update_userid integer,
    PRIMARY KEY (project_id, user_id)
) ENGINE = InnoDB;

-- CREATE RELATIONSHIPS
ALTER TABLE projects ADD CONSTRAINT FK_ProjectCreateUser FOREIGN KEY (create_userid)
REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE projects ADD CONSTRAINT FK_ProjectUpdateUser FOREIGN KEY (update_userid)
REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE issues ADD CONSTRAINT FK_IssueProject FOREIGN KEY (project_id)
REFERENCES projects(id) 
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE issues ADD CONSTRAINT FK_IssueOwner FOREIGN KEY (owner_id)
REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE issues ADD CONSTRAINT FK_IssueRequester FOREIGN KEY (requester_id)
REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE project_user_assignment ADD CONSTRAINT FK_ProjectUser FOREIGN KEY (project_id)
REFERENCES projects(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

ALTER TABLE project_user_assignment ADD CONSTRAINT FK_UserProject FOREIGN KEY (user_id)
REFERENCES users(id)
ON DELETE CASCADE
ON UPDATE RESTRICT;

-- insert some seed data so we can just begin using the database
INSERT INTO users 
    (email, username, password)
VALUES
    ('test1@notanaddress.com', 'Test_User_One', md5('test1')),
    ('test2@notanaddress.com', 'Test_User_Two', md5('test2'));