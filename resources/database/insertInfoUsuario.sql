CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255),
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    genero VARCHAR(255),
    rol VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO usuarios (nombre, username, email, password, genero, rol) VALUES ('admin', 'admin', 'admin@gmail.com', '$2y$10$ILPjCkrxYj1VTpcAvItz3OpvXur1NTksl21Jvss0yeR3HzO6cHwxi', 'Masculino', 'Administrador'),
('Jane','Jane','jane@gmail.com','$2y$10$HIrL3GiCft4RTvhiUHsoQOFw/G5etScXZLIZxym7SUjwRLGZWSGwG','Femenino','Usuario');