CREATE TABLE usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre_usuario TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    contraseña TEXT NOT NULL,
    edad INTEGER NOT NULL,
    foto_perfil TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE pokemon (
    id INTEGER PRIMARY KEY,
    nombre TEXT NOT NULL,
    imagen TEXT NOT NULL,
    tipo1 TEXT NOT NULL,
    tipo2 TEXT,
    hp INTEGER NOT NULL,
    ataque INTEGER NOT NULL,
    defensa INTEGER NOT NULL,
    ataque_especial INTEGER NOT NULL,
    defensa_especial INTEGER NOT NULL,
    velocidad INTEGER NOT NULL
);

CREATE TABLE coleccion (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario_id INTEGER NOT NULL,
    pokemon_id INTEGER NOT NULL,
    cantidad INTEGER DEFAULT 1 NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (pokemon_id) REFERENCES pokemon(id)
);

CREATE TABLE sobres (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario_id INTEGER NOT NULL,
    ultima_conexion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    cantidad_sobres INTEGER DEFAULT 1 NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE combates (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario1_id INTEGER NOT NULL,
    usuario2_id INTEGER NOT NULL,
    ganador_id INTEGER,
    FOREIGN KEY (usuario1_id) REFERENCES usuarios(id),
    FOREIGN KEY (usuario2_id) REFERENCES usuarios(id),
    FOREIGN KEY (ganador_id) REFERENCES usuarios(id)
);

CREATE TABLE movimientos_combate (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    combate_id INTEGER NOT NULL,
    atacante_id INTEGER NOT NULL,
    defensor_id INTEGER NOT NULL,
    tipo_movimiento TEXT NOT NULL CHECK (tipo_movimiento IN ('fisico', 'especial')),
    daño_causado INTEGER NOT NULL,
    FOREIGN KEY (combate_id) REFERENCES combates(id),
    FOREIGN KEY (atacante_id) REFERENCES pokemon(id),
    FOREIGN KEY (defensor_id) REFERENCES pokemon(id)
);