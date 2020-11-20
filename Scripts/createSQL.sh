#!/bin/bash
/opt/bitnami/mysql/bin/mysql -u root -p$(cat /home/bitnami/bitnami_application_password) -D EsportsEncyclopedia << EOF
CREATE TABLE Games(
	GameID INT AUTO_INCREMENT,
	Title VARCHAR(50),
	ImagePath VARCHAR(100),
	IconPath VARCHAR(100),
	GameDesc VARCHAR(5000),
	Tags VARCHAR(300),
	PRIMARY KEY(GameID)
);
CREATE TABLE Sponsors(
	SponsorID INT AUTO_INCREMENT,
	Name VARCHAR(50),
	Imagepath VARCHAR(100),
	IconPath VARCHAR(100),
	SponsorDesc VARCHAR(5000),
	Tags VARCHAR(300),
	PRIMARY KEY(SponsorID)
);
CREATE TABLE Teams(
	TeamID INT AUTO_INCREMENT,
	GameID INT,
	SponsorID INT,
	TeamName VARCHAR(40),
	ImagePath VARCHAR(100),
	TeamDesc VARCHAR(5000),
	Tags VARCHAR(300),
	PRIMARY KEY(TeamID),
	FOREIGN KEY(GameID) REFERENCES Sponsors(SponsorID),
	FOREIGN KEY(SponsorID) REFERENCES Sponsors(SponsorID)
);
CREATE TABLE Players(
	PlayerID INT AUTO_INCREMENT,
	GameID INT,
	TeamID INT,
	InGameName VARCHAR(30),
	FullName VARCHAR(40),
	Country VARCHAR(40),
	DOB DATE,
	PlayerDesc VARCHAR(5000),
	Settings VARCHAR(500),
	ImagePath VARCHAR(100),
	Tags VARCHAR(300),
	PRIMARY KEY(PlayerID),
	FOREIGN KEY(GameID) REFERENCES Sponsors(SponsorID),
	FOREIGN KEY(TeamID) REFERENCES Teams(TeamID)
);
CREATE TABLE Users(
	UserID INT AUTO_INCREMENT,
	Username VARCHAR(20),
	Password VARCHAR(20),
	PRIMARY KEY(UserID)
);
EOF
