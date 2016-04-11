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
('The Matrix', '1999-03-21'), 
('Fight Club', '1999-10-15'), 
('Step Brothers', '2008-07-25'),
('A Nightmare on Elm Street', '1984-11-16'),
('The Magnificent Seven', '1960-10-23'),
('The Cabin in the Woods', '2012-04-13'),
('Wreck-It Ralph', '2012-11-02'),
('The Dark Knight', '2008-07-18'),
('Legend', '2015-11-20'),
('Talladega Nights', '2006-08-04'),
('American History X', '1998-11-20'), --Rohan below
{'Inside Out', '2015-06-19'},
{'Up', '2005-05-29'},
{'Hangover 1', '2009-06-05'},
{'Hangover 2', '2011-05-26'},
{'Hangover 3', '2013-05-23'},
{'Toy Story 1', '1995-11-22'},
{'Toy Story 2', '1999-11-24'},
{'Toy Story 3', '2010-06-18'},
{'Monsters Inc', '2001-11-02'},
{'Finding Nemo', '2003-05-30'},
{'The Haunting in Connecticut', '2009-03-27'},
{'The Strangers', '2008-05-30'};


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
('Jennifer', 'Grey', '1960-03-26'), --10
('Gena', 'Rowlands', '1930-06-19'), 
('James', 'Garner', '1928-04-07'), 
('Ellen', 'Page', '1987-02-21'), 
('Michael', 'Cera', '1988-06-07'), 
('Mike', 'Myers', '1963-05-25'), 
('Eddie', 'Murphy', '1961-04-03'), 
('Robert', 'Downey Jr', '1965-04-04'), 
('Chris', 'Evans', '1981-06-13'),
('Keanu', 'Reeves', '1964-09-02'), 
('Laurence', 'Fishburne', '1961-07-30'), --20
('Edward', 'Norton', '1969-08-18'),
('Will', 'Ferrell', '1967-07-16'),
('John', 'Reilly', '1965-05-24'),
('John', 'Saxon', '1935-08-05'),
('Ronee', 'Blakley', '1945-08-24'),
('Yul', 'Brynner', '1985-10-10'),
('Eli', 'Wallch', '1915-12-07'),
('Kristen', 'Connolly', '1980-07-12'),
('Chris', 'Hemsworth', '1983-08-11'),
('Sarah', 'Silverm', '1970-12-01'), --30
('Cristian', 'Bale', '1974-01-30'),
('Heath', 'Ledger', '1979-04-04'),
('Paul', 'Anderson', '1980-02-05'),
('Tom', 'Hardy', '1977-09-15'),
('Edward', 'Furlong', '1977-08-02');

INSERT INTO ACTOR_PLAYS(movie_id, actor_id) VALUES
(1,1),(1,2),(2,3),(2,4),(3,5),(3,6),(4,7),(4,8),(5,9),(5,10),
(6,11),(6,12),(7,13),(7,14),(8,15),(8,16),(9,17),(9,18),(10,19),(10,20)
(11,21), (11,7), (12,22), (12,23), (13,24), (13,25), (14,26), (14,27)
(15,28), (15,29), (16,23), (16,30), (17,31), (17,32), (18,33), (18,34),
(19,23), (19,24), (20,21), (20,35);

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
('Tim', 'Miller', 'United States'), --10
('David', 'Fincher', 'United States'),
('Adam', 'McKay', 'United States'),
('Wes', 'Craven', 'United States'),
('John', 'Sturges', 'United States'),
('Drew', 'Goddard', 'United States'),
('Rich', 'Moore', 'United States'),
('Christopher', 'Nolan', 'England'),
('Brian', 'Helgland', 'United States'),
('Tony', 'Kaye', 'England');

INSERT INTO DIRECTS(director_id, movie_id) VALUES
(1,3),(2,2),(3,4),(4,5),(5,6),(6,7),(7,8),(8,9),(9,10),(10,1),
(11,11), (12,12), (13,13), (14,14), (15,15), (16,16), (17,17), (18,18),
(19,12), (20,19);

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
nature of his reality and his role in the war against its controllers.'), --10
('An insomniac office worker, looking for a way to change his life, 
	crosses paths with a devil-may-care soap maker, forming an underground 
	fight club that evolves into something much, much more.'),
('Two aimless middle-aged losers still living at home are forced 
	against their will to become room-mates when their parents marry.'),
('Several people are hunted by a cruel serial killer who kills his victims 
	in their dreams. While the survivors are trying to find the reason for 
	being chosen, the murderer wont lose any chance to kill them as soon as 
	they fall asleep.'),
('An oppressed Mexican peasant village assembles seven gunfighters to help 
	defend their homes.'),
('Five friends go for a break at a remote cabin in the woods, where they get 
	more than they bargained for. Together, they must discover the truth behind 
	the cabin in the woods.'),
('A video game villain wants to be a hero and sets out to fulfill his dream, 
	but his quest brings havoc to the whole arcade where he lives.'),
('When the menace known as the Joker wreaks havoc and chaos on the people 
	of Gotham, the caped crusader must come to terms with one of the greatest 
	psychological tests of his ability to fight injustice.'),
('The film tells the story of the identical twin gangsters Reggie and Ronnie 
	Kray, two of the most notorious criminals in British history, and their 
	organised crime empire in the East End of London during the 1960s.'),
('#1 NASCAR driver Ricky Bobby stays atop the heap thanks to a pact with his 
	best friend and teammate, Cal Naughton, Jr. But when a French Formula One 
	driver, makes his way up the ladder, Ricky Bobby\'s talent and devotion are 
	put to the test'),
('A former neo-nazi skinhead tries to prevent his younger brother from going down 
	the same wrong path that he did.');


INSERT INTO MOVIE_TOPICS(topic_id, movie_id) VALUES
(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10)
(11,11),(12,12), (13,13),(14,14), (15,15), (16,16), (17,17), (18,18),
(19,19), (20,20);

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
('Silver Pictures', 'United States'),--10
('Fox 2000 Pictures', 'United States'),
('Columbia Pictures', 'United States'),
('New Line Cinema', 'United States'),
('The Mirisch Company', 'United States'),
('Lionsgate', 'Canada'),
('Walt Disney Pictures', 'Canada'),
('Legendary Pictures', 'United States'),
('Universal Pictures', 'United States');

INSERT INTO SPONSORS(studio_id, movie_id) VALUES
(1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),
(11,11), (12,12), (13,13), (14,14), (15,15), (16,16), (17,17), (18,18),
(19,12), (20,3);

INSERT INTO ROLE(movie_id, actor_id, name) VALUES
(1,1,'Wade Wilson: Deadpool');

INSERT INTO USERS(first_name, last_name, email, username, password) VALUES
('Tyler', 'Metade', 'tyler@email.com', 'tmetade', 'password'),
('Rohan', 'Kanjani', 'rohan@email.com', 'rohan', 'password'),
('Randy', 'Layhe', 'rlayhe@email.com', 'randy', '123'),
('Jim', 'Lahye', 'jim@eamil.com', 'jim', '12ab');

INSERT INTO WATCHES(user_id, movie_id, date_rated, rating) VALUES
(1, 1, '2016-04-06', 5);

INSERT INTO PROFILE(user_id, age_range, date_of_birth, gender, device_used) VALUES
(1, 20, '1996-03-03', 'm', 'Computer'),
(2, 20, '1996-04-07', 'o', 'phone'),
(3, 34, '1954-04-13', 'o', 'tablet'),
(4, 55, '1963-12-12', 'm', 'Computer');

INSERT INTO TAG (NAME) VALUES
('Action'), ('Adventure'), ('Thriller'), ('Drama'), ('Romance'), ('Comedy'), ('Family'), --7
('Sci-Fi'), ('Horror'), ('Western'), ('Mystery'), ('Fantasy'), ('Animation'), ('Crime'), --14
('Biography'), ('History'), ('Sport');

INSERT INTO MOVIE_TAGS (movie_id, tag_id) VALUES
(1,1),(1,2), (1,6), (2,1), (2,3), (3,1), (3,2), (3,8), (4,1), (4,2), (4,3), (5,4), (5,5),
(6,4), (6,5), (7,4), (7,5), (7,6), (8,2), (8,6), (8,7), (9,1), (9,2), (9,8), (10,1), (10,8),
(11,4), (12,6), (13,9), (14,1), (14,2), (14,10), (15,9), (15,3), (15,11), (15,12), (16,13),
(16,2), (16,6), (16,7), (16,8) (17,14), (17,1), (17,4), (18,15), (18,16), (18,14), (18,4),
(18,3), (19,17), (19,1), (19,6), (20,14), (20,4);
