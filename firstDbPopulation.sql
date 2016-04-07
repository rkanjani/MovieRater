INSERT INTO MOVIE (title, date_released) VALUES
('Dead Pool', '2016-02-08'),
('London Has Fallen', '2016-03-01'),
('Star Wars: The Force Awakens', '2015-12-14'),
('World War Z', '2013-06-21'),
('Dirty Dancing', '1987-08-21'),
('The Notebook', '2004-06-25'),
('Juno', '2007-12-25'),
('Shrek', '2001-05-18'),
('The Avengers', '2012-05-12'),
('The Matrix', '1999-03-21');

INSERT INTO ACTOR(first_name, last_name, date_of_birth) VALUES
('Ryan', 'Reynolds', '1976-10-23'),
('Michael', 'Cera', '1988-06-07');

INSERT INTO ACTOR_PLAYS(movie_id, actor_id) VALUES
(1,1),
(7,2);

INSERT INTO DIRECTOR(first_name, last_name, country) VALUES
('Jeffrey Jacob', 'Abrams', 'United States'),
('Joss', 'Whedon', 'United States');

INSERT INTO DIRECTS(director_id, movie_id) VALUES
(1,3),
(2,9);

INSERT INTO TOPICS(description) VALUES
('After the death of the British prime minister, the worlds
 most powerful leaders gather in London to pay their respects. 
 Without warning, terrorists unleash a devastating attack that 
 leaves the city in chaos and ruins. ');

INSERT INTO MOVIE_TOPICS(topic_id, movie_id) VALUES
(1,2);

INSERT INTO STUDIO(name, country) VALUES
('Silver Pictures', 'United States');

INSERT INTO SPONSORS(studio_id, movie_id) VALUES
(1,10);

INSERT INTO ROLE(movie_id, actor_id, name) VALUES
(1,1,'Wade Wilson: Deadpool');

INSERT INTO USERS(first_name, last_name, email, username, password) VALUES
('Tyler', 'Metade', 'tyler@email.com', 'tmetade', 'password');

INSERT INTO WATCHES(user_id, movie_id, date_rated, rating) VALUES
(1, 1, '2016-04-06', 10);

INSERT INTO PROFILE(user_id, age_range, year_born, gender, device_used) VALUES
(1, 20, 1996, 'm', 'Computer');