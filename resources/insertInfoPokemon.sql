CREATE TABLE IF NOT EXISTS pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador INT UNIQUE NOT NULL,
    imagen_ruta VARCHAR(255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tipo ENUM('Fuego', 'Agua', 'Planta', 'Eléctrico', 'Bicho', 'Normal', 'Veneno', 'Psíquico') NOT NULL,
    descripcion TEXT NOT NULL
);

select * from pokemons;