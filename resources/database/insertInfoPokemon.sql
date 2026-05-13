CREATE TABLE IF NOT EXISTS pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador INT UNIQUE NOT NULL,
    imagen_ruta VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Fuego', 'Agua', 'Planta', 'Eléctrico', 'Bicho', 'Normal', 'Veneno', 'Psíquico') NOT NULL,
    descripcion TEXT NOT NULL
);

INSERT INTO pokemons (numero_identificador, imagen_ruta, nombre, tipo, descripcion) VALUES
(1, '/resources/imagenes/pokemon/001.png', 'Bulbasaur', 'Planta', 'Una extraña semilla fue plantada en su espalda al nacer. La planta florece y crece con él.'),
(4, '/resources/imagenes/pokemon/004.png', 'Charmander', 'Fuego', 'La llama que tiene en la punta de la cola arde según sus sentimientos. Llamea levemente cuando está alegre y arde vigorosamente cuando está enfadado.'),
(7, '/resources/imagenes/pokemon/007.png', 'Squirtle', 'Agua', 'El caparazón de Squirtle no le sirve de protección únicamente. Su forma redondeada y las hendiduras que tiene le ayudan a deslizarse en el agua con mayor rapidez.'),
(10, '/resources/imagenes/pokemon/010.png', 'Caterpie', 'Bicho', 'Para protegerse, despide un hedor horrible por las antenas rojas con el que repele a sus enemigos.'),
(16, '/resources/imagenes/pokemon/016.png', 'Pidgey', 'Normal', 'Es muy dócil. Si le atacan, a menudo prefiere levantar arena para defenderse antes que contraatacar.'),
(23, '/resources/imagenes/pokemon/023.png', 'Ekans', 'Veneno', 'Se enrosca para descansar. Adoptando esta posición puede responder rápidamente a cualquier amenaza desde cualquier dirección.'),
(25, '/resources/imagenes/pokemon/025.png', 'Pikachu', 'Eléctrico', 'Cada vez que un Pikachu se encuentra con algo nuevo, le lanza una descarga eléctrica para investigarlo.'),
(37, '/resources/imagenes/pokemon/037.png', 'Vulpix', 'Fuego', 'Al nacer, solo tiene una cola de color blanco, pero a medida que crece, esta se va dividiendo desde la punta y cambia de color.'),
(54, '/resources/imagenes/pokemon/054.png', 'Psyduck', 'Agua', 'Padece continuamente dolores de cabeza. Cuando son muy fuertes, empieza a usar misteriosos poderes.'),
(63, '/resources/imagenes/pokemon/063.png', 'Abra', 'Psíquico', 'Duerme 18 horas al día. Si nota la presencia de un enemigo o un peligro inminente, se teletransporta a un lugar seguro.');

select * from pokemons;