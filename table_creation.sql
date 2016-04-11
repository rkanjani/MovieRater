set search_path="movie_rater";

CREATE TABLE USERS
(
USER_ID SERIAL PRIMARY KEY,
FIRST_NAME VARCHAR(50) NOT NULL,
LAST_NAME VARCHAR(50) NOT NULL,
EMAIL VARCHAR(100) NOT NULL,
USERNAME VARCHAR(20) NOT NULL,
PASSWORD VARCHAR(20) NOT NULL,
CITY VARCHAR(50),
PROVINCE VARCHAR(50),
COUNTRY VARCHAR(50) );

CREATE TABLE PROFILE
(
USER_ID INT PRIMARY KEY,
AGE_RANGE INT,
DATE_OF_BIRTH DATE,
GENDER VARCHAR(1),
OCCUPATION VARCHAR(50),
DEVICE_USED VARCHAR(50),
FOREIGN KEY (USER_ID) REFERENCES USERS  );

CREATE TABLE TOPICS
(
TOPIC_ID SERIAL PRIMARY KEY,
DESCRIPTION VARCHAR(250) NOT NULL  );

CREATE TABLE MOVIE 
(
MOVIE_ID SERIAL PRIMARY KEY,
TITLE VARCHAR(100) NOT NULL,
DATE_RELEASED DATE NOT NULL
);

CREATE TABLE WATCHES
(
USER_ID INT NOT NULL,
MOVIE_ID INT NOT NULL,
DATE_RATED DATE NOT NULL,
RATING 	INT NOT NULL,
PRIMARY KEY(USER_ID, MOVIE_ID),
FOREIGN KEY (USER_ID) REFERENCES USERS,
FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE
);

CREATE TABLE MOVIE_TOPICS
(
TOPIC_ID INT,
MOVIE_ID INT,
LANGUAGE VARCHAR(50),
SUBTITLES VARCHAR(3),
COUNTRY VARCHAR(50),
PRIMARY KEY (TOPIC_ID, MOVIE_ID),
FOREIGN KEY (TOPIC_ID) REFERENCES TOPICS,
FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE
);

CREATE TABLE ACTOR
(
ACTOR_ID SERIAL PRIMARY KEY,
FIRST_NAME VARCHAR(50) NOT NULL,
LAST_NAME VARCHAR(50) NOT NULL,
DATE_OF_BIRTH DATE
);

CREATE TABLE ROLE
(
MOVIE_ID INT NOT NULL,
NAME VARCHAR(50) NOT NULL, 
ACTOR_ID INT NOT NULL,
PRIMARY KEY (MOVIE_ID,ACTOR_ID),
FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE,
FOREIGN KEY (ACTOR_ID) REFERENCES ACTOR
);

CREATE TABLE ACTOR_PLAYS
(
MOVIE_ID INT,
ACTOR_ID INT,
PRIMARY KEY(MOVIE_ID, ACTOR_ID),
FOREIGN KEY(MOVIE_ID) REFERENCES MOVIE,
FOREIGN KEY(ACTOR_ID) REFERENCES ACTOR
);

CREATE TABLE DIRECTOR
(
DIRECTOR_ID SERIAL PRIMARY KEY,
FIRST_NAME VARCHAR(50) NOT NULL,
LAST_NAME VARCHAR(50) NOT NULL,
COUNTRY VARCHAR(50)
);

CREATE TABLE DIRECTS
(
DIRECTOR_ID INT,
MOVIE_ID INT,
PRIMARY KEY(DIRECTOR_ID, MOVIE_ID),
FOREIGN KEY (DIRECTOR_ID) REFERENCES DIRECTOR,
FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE
);

CREATE TABLE STUDIO
(
STUDIO_ID SERIAL PRIMARY KEY,
NAME VARCHAR(150) NOT NULL,
COUNTRY VARCHAR(50)
);

CREATE TABLE SPONSORS
(
STUDIO_ID INT,
MOVIE_ID INT,
PRIMARY KEY(STUDIO_ID, MOVIE_ID),
FOREIGN KEY (STUDIO_ID) REFERENCES STUDIO,
FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE
);

CREATE TABLE TAG
(
TAG_ID SERIAL PRIMARY KEY,
NAME VARCHAR(50) NOT NULL
);

CREATE TABLE MOVIE_TAGS
(
	TAG_ID INT,
	MOVIE_ID INT,
	PRIMARY KEY (TAG_ID, MOVIE_ID),
	FOREIGN KEY (TAG_ID) REFERENCES TAG,
	FOREIGN KEY (MOVIE_ID) REFERENCES MOVIE;
);
