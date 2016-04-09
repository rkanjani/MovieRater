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
('Ryan', 'Reynolds', '1976-10-23'), //Deadpool
('Morena', 'Baccarin', '1979-06-02'), //Deadpool
('Gerard', 'Butler', '1969-11-12'), //London Has Fallen
('Aaron', 'Eckhart', '1968-03-12'), //London Has Fallen
('Daisy', 'Ridley', '1992-04-10'), //Star Wars Force Awakens
('John', 'Boyega', '1992-03-17'), //Star Wars Force Awakens
('Brad', 'Pitt', '1963-12-18'), //World War Z
('Mireille', 'Enos', '1975-09-22'), //World War Z
('Patrick', 'Swayze', '1952-02-18'), //Dirty Dancing
('Jennifer', 'Grey', '1960-03-26'), //Dirty Dancing
('Gena', 'Rowlands', '1930-06-19'), //The Notebook
('James', 'Garner', '1928-04-07'), //The Notebook
('Ellen', 'Page', '1987-02-21'), //Juno
('Michael', 'Cera', '1988-06-07'), //Juno
('Mike', 'Myers', '1963-05-25'), //Shrek
('Eddie', 'Murphy', '1961-04-03'), //Shrek
('Robert', 'Downey Jr', '1965-04-04'), //The Avengers
('Chris', 'Evans', '1981-06-13'), //The Avengers
('Keanu', 'Reeves', '1964-09-02'), //The Matrix
('Laurence', 'Fishburne', '1961-07-30'), //The Matrix


INSERT INTO ACTOR_PLAYS(movie_id, actor_id) VALUES
(1,1),(1,2),(2,3),(7,4);

INSERT INTO DIRECTOR(first_name, last_name, country) VALUES
('Jeffrey Jacob', 'Abrams', 'United States'), //Star Wars The Force Awakens
('Babak', 'Najafi', 'Iran'), //London Has Fallen
('Marc', 'Forster', 'Germany'), //World War Z
('Emile', 'Ardolino', 'United States'), //Dirty Dancing
('Nick', 'Cassavetes', 'United States'), //The Notebook
('Jason', 'Reitman', 'Canada'), //Juno
('Andrew', 'Adamson', 'New Zealand'), //Shrek
('Joss', 'Whedon', 'United States'), //The Avengers
('Lana', 'Wachowski', 'United States'), //The Matrix
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

INSERT INTO PROFILE(user_id, age_range, date_of_birth, gender, device_used) VALUES
(1, 20, '1996-06-03', 'm', 'Computer');
