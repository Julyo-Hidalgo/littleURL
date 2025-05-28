CREATE DATABASE ct;

USE ct;

CREATE TABLE Shortening(
	url varchar(2000),
	slug varchar(2000)
);

CREATE TABLE IANA_valid_url(
	name varchar(63)
);
