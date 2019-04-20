Create database TravelManager;

Use TravelManager;

CREATE TABLE Users (
   user_id INTEGER NOT NULL AUTO_INCREMENT, 
   username VARCHAR(128),
   email VARCHAR(128),
   password VARCHAR(128),
   PRIMARY KEY(user_id),
   INDEX(email)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE PlanInfo (
	plan_id INTEGER NOT NULL AUTO_INCREMENT,
	user_id INTEGER,
	plan_name VARCHAR(128),
	date_start VARCHAR(128),
	date_end VARCHAR(128),
	city_start VARCHAR(128),
	state_start VARCHAR(128),
	code_start VARCHAR(128),
	city_end VARCHAR(128),
	state_end VARCHAR(128),
	code_end VARCHAR(128),
	notes TINYTEXT,
	PRIMARY KEY (plan_id),
	FOREIGN KEY (user_id) REFERENCES Users (user_id)


);


CREATE TABLE Tasks (
	plan_id INTEGER,
	user_id INTEGER,
	task_id INTEGER NOT NULL AUTO_INCREMENT,
	task_name VARCHAR(128),
	task_details TEXT,
	completed BOOLEAN,
	PRIMARY KEY(task_id),
	FOREIGN KEY (user_id) REFERENCES Users (user_id),
	FOREIGN KEY (plan_id) REFERENCES PlanInfo (plan_id)




) ENGINE=InnoDB CHARSET=utf8;
