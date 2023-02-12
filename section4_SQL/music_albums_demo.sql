CREATE DATABASE Music
DEFAULT CHARACTER SET utf8;

USE music;

CREATE TABLE Artist (
  artist_id INTEGER NOT NULL AUTO_INCREMENT, 
  name VARCHAR(255),
  PRIMARY KEY(artist_id)
) ENGINE = InnoDB; /* InnoDB is a general-purpose storage engine that balances high reliability and high performance. */

CREATE TABLE Album (
  album_id INTEGER NOT NULL AUTO_INCREMENT, 
  title VARCHAR(255),
  artist_id INTEGER, 
  PRIMARY KEY(album_id),
  INDEX USING BTREE (title),

  CONSTRAINT FOREIGN KEY (artist_id) 
    REFERENCES Artist (artist_id) 
    ON DELETE CASCADE ON UPDATE CASCADE /* We are telling MySQL to "clean up" broken references */
) ENGINE = InnoDB;

CREATE TABLE Genre (
  genre_id INTEGER NOT NULL AUTO_INCREMENT,
  name VARCHAR(255),
  PRIMARY KEY(genre_id),
  INDEX USING BTREE (name)
) ENGINE = InnoDB;

CREATE TABLE Track (
  track_id INTEGER NOT NULL AUTO_INCREMENT,
  title VARCHAR(255),
  len INTEGER,
  rating INTEGER, 
  count INTEGER,
  album_id INTEGER, 
  genre_id INTEGER, 
  PRIMARY KEY(track_id),
  INDEX USING BTREE (title),

  CONSTRAINT FOREIGN KEY (album_id) REFERENCES Album (album_id) 
    ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FOREIGN KEY (genre_id) REFERENCES Genre (genre_id) 
    ON DELETE CASCADE ON UPDATE CASCADE 
) ENGINE = InnoDB;

INSERT INTO Artist (name) VALUES ('Led Zepplin');
INSERT INTO Artist (name) VALUES ('AC/DC');

INSERT INTO Genre (name) VALUES ('Rock');
INSERT INTO Genre (name) VALUES ('Metal');

INSERT INTO Album (title, artist_id) VALUES ('Who Made Who', 2);
INSERT INTO Album (title, artist_id) VALUES ('IV', 1);

INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Black Dog', 5, 297, 0, 6, 1);
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Stairway', 5, 482, 0, 6, 1);
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('About to Rock', 5, 313, 0, 5, 2);
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Who Made Who', 5, 207, 0, 5, 2);


SELECT Album.title, Artist.name FROM Album JOIN Artist ON Album.artist_id = Artist.artist_id;

SELECT Album.title, Album.artist_id, Artist.artist_id,Artist.name 
FROM Album JOIN Artist ON Album.artist_id = Artist.artist_id; /* to also see the related id's */

/* Joining two tables without an ON clause gives all possible combinations of rows. */
SELECT Track.title, 
    Track.genre_id, 
    Genre.genre_id, 
   Genre.name 
FROM Track JOIN Genre;

/* can get pretty complex */
SELECT Track.title, Artist.name, Album.title, Genre.name FROM Track JOIN Genre JOIN Album JOIN Artist ON Track.genre_id = Genre.genre_id AND Track.album_id = Album.album_id AND Album.artist_id = Artist.artist_id


/* Assignment */
INSERT INTO Artist (name) VALUES ('Drake');
INSERT INTO Artist (name) VALUES ('J.Cole');
INSERT INTO Artist (name) VALUES ('Tupac');

INSERT INTO Genre (name) VALUES ('Rap');
INSERT INTO Genre (name) VALUES ('Hip=Hop');
INSERT INTO Genre (name) VALUES ('Rock');
INSERT INTO Genre (name) VALUES ('R&B');

INSERT INTO Album (title, artist_id) VALUES ('Take Care', 1);
INSERT INTO Album (title, artist_id) VALUES ('More Life', 1);
INSERT INTO Album (title, artist_id) VALUES ('4 your eyez only', 2);
INSERT INTO Album (title, artist_id) VALUES ('all eyez on me', 3);

/* Drake */
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Marvin Room', 5, 297, 0, 1, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Take care', 5, 345, 0, 1, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Underground Kings', 5, 427, 0, 1, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Good ones go', 5, 497, 0, 1, 4);

INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('HYFR', 5, 347, 0, 1, 4);

/* Drake 2 */
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Passionfruit', 5, 297, 0, 2, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Blem', 5, 345, 0, 2, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Gyalchester', 5, 427, 0, 2, 4);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Portland', 5, 497, 0, 2, 4);

INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Free Smoke', 5, 347, 0, 2, 4);

/* J.Cole */
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('4 your eyez only', 5, 297, 0, 3, 2);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Deja vu', 5, 345, 0, 3, 2);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('She is mine', 5, 427, 0, 3, 2);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Folding Clothes', 5, 497, 0, 3, 2);

INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Change', 5, 347, 0, 3, 2);
 
/* Tupac */
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('All About U', 5, 297, 0, 4, 1);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('No More Pain', 5, 345, 0, 4, 1);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Heartz of a Men', 5, 427, 0, 4, 1);
 
INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Life Goes On', 5, 497, 0, 4, 1);

INSERT INTO Track 
  (title, rating, len, count, album_id, genre_id) 
  VALUES ('Skandalouz', 5, 347, 0, 4, 1);


/* all the data joined up sorted in ascending order by the album title */
SELECT Track.title, Artist.name, Album.title, Genre.name
FROM Track JOIN Genre JOIN Album JOIN Artist
ON Track.genre_id = Genre.genre_id AND Track.album_id = Album.album_id AND Album.artist_id = Artist.artist_id;

/* all of the genres for a particular artist. */ 
SELECT DISTINCT Artist.name, Genre.name
FROM Track JOIN Album JOIN Genre JOIN Artist
ON Album.album_id = Track.album_id AND Track.genre_id = Genre.genre_id AND Album.artist_id = Artist.artist_id
WHERE Artist.name = 'Drake';
 

