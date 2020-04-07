# Voting Website

Hi! Here is a website for TinyBeans assessment!

## Installation

To play around with my project, first install WAMP.

Then, please be sure to fork this repo to your own GitHub account.
```bash
$ git clone https://github.com/LindsayKB/Voting-Website.git
```
Hit enter.

Note: I would recommended placing it inside /wamp64/www in its own folder to run the website with a WAMP server.

To set up the DB and tables, run the following commands:

```bash
CREATE DATABASE tinybeans_db

CREATE TABLE polls(
   id INT NOT NULL AUTO_INCREMENT,
   pollname VARCHAR(1000) NOT NULL,
   reg_date TIMESTAMP,
   email VARCHAR(255),
   PRIMARY KEY ( id )
);

CREATE TABLE polloptions(
   id INT NOT NULL AUTO_INCREMENT,
   optionname VARCHAR(1000),
   pollname VARCHAR(1000),
   total INT(11),
   PRIMARY KEY ( id )
);

CREATE TABLE users(
   id INT NOT NULL AUTO_INCREMENT,
   fname VARCHAR(255),
   lname VARCHAR(255),
   email VARCHAR(255),
   password VARCHAR(255),
   PRIMARY KEY ( id )
);
```


## Usage

This website can be accessed locally. All PHP files and the custom CSS are all hosted in this repo.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.