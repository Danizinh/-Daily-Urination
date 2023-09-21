
CREATE DATABASE IF NOT EXISTS dados;

USE dados;


CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    senha_crypt VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    CMR VARCHAR(15),
    id_usuario INT NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idade INT NOT NULL,
    sexo VARCHAR(1),
    CPF VARCHAR(11) NOT NULL,
    id_medico INT NOT NULL,
    id_usuario INT NOT NULL,
    categorizacao VARCHAR(50),
    liquidos VARCHAR(50),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

CREATE TABLE IF NOT EXISTS miccao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    normal VARCHAR(30) NOT NULL,
    urgencia VARCHAR(30) NOT NULL,
    desconfortavel VARCHAR(30) NOT NULL,
    horario TIME,
    data DATE,
    volumeUrinado INT NOT NULL,
    id_paciente INT NOT NULL,
    FOREIGN KEY (id_paciente) REFERENCES pacientes(id)
);

ALTER TABLE usuarios ADD phone VARCHAR(14);
SELECT * FROM usuarios;


DROP DATABASE dados;
