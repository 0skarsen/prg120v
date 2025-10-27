CREATE DATABASE IF NOT EXISTS prg120;
USE prg120;

CREATE TABLE IF NOT EXISTS klasse (
  klassekode CHAR(5) NOT NULL,
  klassenavn VARCHAR(50) NOT NULL,
  studiumkode VARCHAR(50) NOT NULL,
  PRIMARY KEY (klassekode)
);

CREATE TABLE IF NOT EXISTS student (
  brukernavn CHAR(7) NOT NULL,
  fornavn VARCHAR(50) NOT NULL,
  etternavn VARCHAR(50) NOT NULL,
  klassekode CHAR(5) NOT NULL,
  PRIMARY KEY (brukernavn),
  FOREIGN KEY (klassekode) REFERENCES klasse(klassekode)
);
