CREATE DATABASE ct;

USE ct;

CREATE TABLE Shortening(
	url varchar(2000) UNIQUE,
	slug varchar(8) UNIQUE
);

CREATE TABLE IANA_valid_url(
	name varchar(63) UNIQUE
);
