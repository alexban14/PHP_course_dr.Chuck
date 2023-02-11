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

