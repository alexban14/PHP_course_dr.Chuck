CREATE DATABASE roster;
USE roster;

ALTER DATABASE roster CHARACTER SET utf8;

CREATE TABLE `User` (
    user_id     INTEGER NOT NULL AUTO_INCREMENT,
    name        VARCHAR(128) UNIQUE,
    PRIMARY KEY(user_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE Course (
    course_id     INTEGER NOT NULL AUTO_INCREMENT,
    title         VARCHAR(128) UNIQUE,
    PRIMARY KEY(course_id)
) ENGINE=InnoDB CHARACTER SET=utf8;

CREATE TABLE Member (
    user_id       INTEGER,
    course_id     INTEGER,
    role          INTEGER,

    CONSTRAINT FOREIGN KEY (user_id) REFERENCES `User` (user_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FOREIGN KEY (course_id) REFERENCES Course (course_id) ON DELETE CASCADE ON UPDATE CASCADE,
    
    PRIMARY KEY (user_id, course_id)
) ENGINE=InnoDB CHARACTER SET=utf8;


INSERT INTO `User` (name) VALUES ('Murry');
INSERT INTO `User` (name) VALUES ('Ellelouise');
INSERT INTO `User` (name) VALUES ('Kiegan');
INSERT INTO `User` (name) VALUES ('Mitchel');
INSERT INTO `User` (name) VALUES ('Ranya');
INSERT INTO `User` (name) VALUES ('Otilija');
INSERT INTO `User` (name) VALUES ('Iestyn');
INSERT INTO `User` (name) VALUES ('Jules');
INSERT INTO `User` (name) VALUES ('Manolo');
INSERT INTO `User` (name) VALUES ('Sohan');
INSERT INTO `User` (name) VALUES ('Toluwanimi');
INSERT INTO `User` (name) VALUES ('Charlize');
INSERT INTO `User` (name) VALUES ('Crystal');
INSERT INTO `User` (name) VALUES ('Hajra');
INSERT INTO `User` (name) VALUES ('Rhianna');

INSERT INTO Course (title) VALUES ('si106');
INSERT INTO Course (title) VALUES ('si110');
INSERT INTO Course (title) VALUES ('si206');

INSERT INTO `member` (user_id, course_id, `role`) VALUES (1, 1, 1);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (2, 1, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (3, 1, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (4, 1, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (5, 1, 0);

INSERT INTO `member` (user_id, course_id, `role`) VALUES (6, 2, 1);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (7, 2, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (8, 2, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (9, 2, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (10, 2, 0);

INSERT INTO `member` (user_id, course_id, `role`) VALUES (11, 3, 1);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (12, 3, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (13, 3, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (14, 3, 0);
INSERT INTO `member` (user_id, course_id, `role`) VALUES (15, 3, 0);

SELECT `User`.name, Course.title, Member.role
    FROM `User` JOIN Member JOIN Course
    ON `User`.user_id = Member.user_id AND Member.course_id = Course.course_id
    ORDER BY Course.title, Member.role DESC, `User`.name;
    
 