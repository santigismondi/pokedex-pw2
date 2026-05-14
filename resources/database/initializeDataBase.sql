/**Creación de la base de datos y tablas para el proyecto de Pokémon.*/

/** Tablas **/
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

CREATE TABLE IF NOT EXISTS pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador INT UNIQUE NOT NULL,
    imagen_ruta VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Fuego', 'Agua', 'Planta', 'Eléctrico', 'Bicho', 'Normal', 'Veneno', 'Psíquico') NOT NULL,
    descripcion TEXT NOT NULL
);

/** Insertar Info **/
INSERT INTO pokemons (numero_identificador, imagen_ruta, nombre, tipo, descripcion) VALUES
    (1, 'resources/imagenes/pokemon/001.jpg', 'Bulbasaur', 'Planta', 'Una extraña semilla fue plantada en su espalda al nacer. La planta florece y crece con él.'),
    (4, 'resources/imagenes/pokemon/004.jpg', 'Charmander', 'Fuego', 'La llama que tiene en la punta de la cola arde según sus sentimientos. Llamea levemente cuando está alegre y arde vigorosamente cuando está enfadado.'),
    (7, 'resources/imagenes/pokemon/007.jpg', 'Squirtle', 'Agua', 'El caparazón de Squirtle no le sirve de protección únicamente. Su forma redondeada y las hendiduras que tiene le ayudan a deslizarse en el agua con mayor rapidez.'),
    (10, 'resources/imagenes/pokemon/010.jpg', 'Caterpie', 'Bicho', 'Para protegerse, despide un hedor horrible por las antenas rojas con el que repele a sus enemigos.'),
    (16, 'resources/imagenes/pokemon/016.jpg', 'Pidgey', 'Normal', 'Es muy dócil. Si le atacan, a menudo prefiere levantar arena para defenderse antes que contraatacar.'),
    (23, 'resources/imagenes/pokemon/023.jpg', 'Ekans', 'Veneno', 'Se enrosca para descansar. Adoptando esta posición puede responder rápidamente a cualquier amenaza desde cualquier dirección.'),
    (25, 'resources/imagenes/pokemon/025.jpg', 'Pikachu', 'Eléctrico', 'Cada vez que un Pikachu se encuentra con algo nuevo, le lanza una descarga eléctrica para investigarlo.'),
    (37, 'resources/imagenes/pokemon/037.jpg', 'Vulpix', 'Fuego', 'Al nacer, solo tiene una cola de color blanco, pero a medida que crece, esta se va dividiendo desde la punta y cambia de color.'),
    (54, 'resources/imagenes/pokemon/054.jpg', 'Psyduck', 'Agua', 'Padece continuamente dolores de cabeza. Cuando son muy fuertes, empieza a usar misteriosos poderes.'),
    (63, 'resources/imagenes/pokemon/063.jpg', 'Abra', 'Psíquico', 'Duerme 18 horas al día. Si nota la presencia de un enemigo o un peligro inminente, se teletransporta a un lugar seguro.');

INSERT INTO usuarios (nombre, username, email, password, genero, rol) VALUES
    ('admin', 'admin', 'admin@gmail.com', '$2y$10$ILPjCkrxYj1VTpcAvItz3OpvXur1NTksl21Jvss0yeR3HzO6cHwxi', 'Masculino', 'Administrador'),
    ('Jane','Jane','jane@gmail.com','$2y$10$HIrL3GiCft4RTvhiUHsoQOFw/G5etScXZLIZxym7SUjwRLGZWSGwG','Femenino','Usuario');
