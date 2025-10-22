CREATE DATABASE IF NOT EXISTS db_playlistmusical;
USE db_playlistmusical;

CREATE TABLE autor (
  id_autor INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL
);

CREATE TABLE canciones (
  id_cancion INT AUTO_INCREMENT PRIMARY KEY,
  nombre_cancion VARCHAR(100) NOT NULL,
  anio INT NOT NULL,
  album VARCHAR(100),
  duracion VARCHAR(20),
  mood_cancion VARCHAR(50),
  genero_musical VARCHAR(50),
  id_autor INT NOT NULL,
  FOREIGN KEY (id_autor) REFERENCES autor(id_autor)
);

INSERT INTO autor (nombre) VALUES ('Taylor Swift'), ('Adele'), ('Bad Bunny');
INSERT INTO canciones (nombre_cancion, anio, album, duracion, mood_cancion, genero_musical, id_autor)
VALUES ('Shake It Off', 2014, '1989', '3:39', 'Happy', 'Pop', 1);