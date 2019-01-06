Create database TravelManager;

Use TravelManager;

CREATE TABLE users (
   user_id INTEGER NOT NULL AUTO_INCREMENT, 
   username VARCHAR(128),
   email VARCHAR(128),
   password VARCHAR(128),
   PRIMARY KEY(user_id),
   INDEX(email)
) ENGINE=InnoDB CHARSET=utf8;

