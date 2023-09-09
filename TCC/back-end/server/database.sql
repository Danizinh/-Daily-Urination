CREATE DATABASE information;

USE information;

CREATE TABLE
    paciente(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nome VARCHAR (50) UNIQUE NOT NULL,
        email VARCHAR (128),
        phone VARCHAR(100),
        CPF VARCHAR(11) UNIQUE,
        address VARCHAR(50)
    );

CREATE TABLE
    medico(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        nome VARCHAR (30) UNIQUE NOT NULL,
        paciente_id INT NOT NULL,
        FOREIGN KEY fk_pacientes(paciente_id) REFERENCES paciente(id)
    );
