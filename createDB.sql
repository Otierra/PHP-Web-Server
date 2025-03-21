
CREATE TABLE agendadb.tbLogin (
    idLogin INT AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    tipoUser INT NOT NULL DEFAULT 1
);

INSERT INTO agendadb.tbLogin (user, password, tipoUser) 
VALUES 
('verastegui', SHA2('Ceti1234', 256), 1),
('baruqui', SHA2('Ceti5678', 256), 2);

CREATE TABLE agendadb.contacto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    telefono VARCHAR(50) NOT NULL,
    correo VARCHAR(200) NULL
);

INSERT INTO agendadb.contacto (nombre, telefono, correo) 
VALUES ('Alejandro Verastegui', '3322460302', 'alejandroverast@icloud.com');