DROP DATABASE IF EXISTS DeepbookDB;
CREATE DATABASE DeepbookDB;
USE DeepbookDB;

CREATE TABLE Platform (
    PlatformID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    Name varchar (100) NULL,
    Description text NULL
)ENGINE=InnoDB;

CREATE TABLE users (
    userID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    usersUid varchar(100) NULL,
    usersEmail varchar(50) NULL,
    usersPwd varchar (64) NULL
)ENGINE=InnoDB;

CREATE TABLE Comments (
    commentID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    content varchar(255) NULL,
    userID int NOT NULL,
    FOREIGN KEY (userID) REFERENCES Users (userID)
)ENGINE=InnoDB;

CREATE TABLE Posts (
    postID int AUTO_INCREMENT NOT NULL PRIMARY KEY,
    reaction int NOT NULL,
    post text,
    photo varchar(255) NULL
)ENGINE=InnoDB;

CREATE TABLE userCanCreate (
    postID int NOT NULL,
    commentID int NOT NULL,
    CONSTRAINT PK_Deepbook PRIMARY KEY ( commentID, postID),
    FOREIGN KEY (commentID) REFERENCES Comments (commentID),
    FOREIGN KEY (postID) REFERENCES Posts (postID)

)ENGINE=InnoDB;