INSERT INTO MOVIE (title, date_released) VALUES
('Dead Pool', '2016-02-08'),
('London Has Fallen', '2016-03-01'),
('Star Wars The Force Awakens', '2015-12-14'),
('World War Z', '2013-06-21'),
('Dirty Dancing', '1987-08-21'),
('The Notebook', '2004-06-25'),
('Juno', '2007-12-25'),
('Shrek', '2001-05-18'),
('The Avengers', '2012-05-12'),
('The Matrix', '1999-03-21');

INSERT INTO ACTOR(first_name, last_name, date_of_birth) VALUES
('Ryan', 'Reynolds', '1976-10-23'), 
('Morena', 'Baccarin', '1979-06-02'), 
('Gerard', 'Butler', '1969-11-12'), 
('Aaron', 'Eckhart', '1968-03-12'), 
('Daisy', 'Ridley', '1992-04-10'), 
('John', 'Boyega', '1992-03-17'), 
('Brad', 'Pitt', '1963-12-18'), 
('Mireille', 'Enos', '1975-09-22'), 
('Patrick', 'Swayze', '1952-02-18'),
('Jennifer', 'Grey', '1960-03-26'), 
('Gena', 'Rowlands', '1930-06-19'), 
('James', 'Garner', '1928-04-07'), 
('Ellen', 'Page', '1987-02-21'), 
('Michael', 'Cera', '1988-06-07'), 
('Mike', 'Myers', '1963-05-25'), 
('Eddie', 'Murphy', '1961-04-03'), 
('Robert', 'Downey Jr', '1965-04-04'), 
('Chris', 'Evans', '1981-06-13'),
('Keanu', 'Reeves', '1964-09-02'), 
('Laurence', 'Fishburne', '1961-07-30'); 


INSERT INTO ACTOR_PLAYS(movie_id, actor_id) VALUES
(1,1),(1,2),(2,3),(2,4),(3,5),(3,6),(4,7),(4,8),(5,9),(5,10),
(6,11),(6,12),(7,13),(7,14),(8,15),(8,16),(9,17),(9,18),(10,19),(10,20);

INSERT INTO DIRECTOR(first_name, last_name, country) VALUES
('Jeffrey Jacob', 'Abrams', 'United States'), 
('Babak', 'Najafi', 'Iran'), 
('Marc', 'Forster', 'Germany'), 
('Emile', 'Ardolino', 'United States'), 
('Nick', 'Cassavetes', 'United States'), 
('Jason', 'Reitman', 'Canada'), 
('Andrew', 'Adamson', 'New Zealand'), 
('Joss', 'Whedon', 'United States'), 
('Lana', 'Wachowski', 'United States'), 
('Tim', 'Miller', 'United States');

INSERT INTO DIRECTS(director_id, movie_id) VALUES
(1,3),(2,2),(3,4),(4,5),(5,6),(6,7),(7,8),(8,9),(9,10),(10,1);

INSERT INTO TOPICS(description) VALUES
('A former Special Forces operative turned mercenary is 
subjected to a rogue experiment that leaves him with 
accelerated healing powers, adopting the alter ego Deadpool.'),
('After the death of the British prime minister, the worlds
 most powerful leaders gather in London to pay their respects. 
 Without warning, terrorists unleash a devastating attack that 
 leaves the city in chaos and ruins. '),
('Three decades after the defeat of the Galactic Empire,
 a new threat arises. The First Order attempts to rule the
  galaxy and only a ragtag group of heroes can stop them, 
  along with the help of the Resistance.'),
('Former United Nations employee Gerry Lane traverses the 
  world in a race against time to stop the Zombie pandemic 
  that is toppling armies and governments, and threatening 
  to destroy humanity itself'),
('Spending the summer at a Catskills resort with her family, 
Frances "Baby" Houseman falls in love with the camps dance 
instructor, Johnny Castle.'),
('A poor and passionate young man falls in love with a rich 
young woman and gives her a sense of freedom. They soon 
are separated by their social differences.'),
('Faced with an unplanned pregnancy, an offbeat young woman
 makes an unusual decision regarding her unborn child.'),
('After his swamp is filled with magical creatures, an ogre 
agrees to rescue a princess for a villainous lord in order 
to get his land back.'),
('Earths mightiest heroes must come together and learn to fight 
as a team if they are to stop the mischievous Loki and his 
alien army from enslaving humanity.'),
('A computer hacker learns from mysterious rebels about the true 
nature of his reality and his role in the war against its controllers.');


INSERT INTO MOVIE_TOPICS(topic_id, movie_id) VALUES
(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);

INSERT INTO STUDIO(name, country) VALUES
('20th Century Fox', 'United States'),
('G-BASE Productions', 'United States'),
('Lucasfilms Ltd.', 'United States'),
('Skydance Productions', 'United States'),
('Great American Films', 'United States'),
('Avery Pix', 'United States'),
('Mandate Pictures', 'United States'),
('Pacific Data Images', 'United States'),
('Marvel Studios', 'United States'),
('Silver Pictures', 'United States');

INSERT INTO SPONSORS(studio_id, movie_id) VALUES
(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10);

INSERT INTO ROLE(movie_id, actor_id, name) VALUES
(1,1,'Wade Wilson: Deadpool');

INSERT INTO USERS(first_name, last_name, email, username, password) VALUES
('Tyler', 'Metade', 'tyler@email.com', 'tmetade', 'password');

INSERT INTO WATCHES(user_id, movie_id, date_rated, rating) VALUES
(1, 1, '2016-04-06', 5);

INSERT INTO PROFILE(user_id, age_range, date_of_birth, gender, device_used) VALUES
(1, 20, '1996-06-03', 'm', 'Computer');

INSERT INTO TAG (NAME) VALUES
('Action'), ('Adventure'), ('Thriller'), ('Drama'), ('Romance'), ('Comedy'), ('Family'), 
('Sci-Fi')

INSERT INTO MOVIE_TAGS (movie_id, tag_id) VALUES
(1,1),(1,2), (1,6), (2,1), (2,3), (3,1), (3,2), (3,8), (4,1), (4,2), (4,3), (5,4), (5,5),
(6,4), (6,5), (7,4), (7,5), (7,6), (8,2), (8,6), (8,7), (9,1), (9,2), (9,8), (10,1), (10,8);
