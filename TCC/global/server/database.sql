CREATE DATABASE dados;

USE dados;

CREATE TABLE
    login_in(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        email VARCHAR(50) UNIQUE,
        password VARCHAR(225),
        confirmation VARCHAR(255)
    );

CREATE TABLE
    usuario(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name_usuario VARCHAR (30) NOT NULL,
        phone VARCHAR(16),
        id_login INT NOT NULL,
        FOREIGN KEY fk_login(id_login) REFERENCES login_in(id)
    );

CREATE TABLE
    medico(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name_medico VARCHAR (30) NOT NULL,
        CMR VARCHAR(15),
        id_paciente INT NOT NULL,
        id_usuario INT NOT NULL,
        FOREIGN KEY fk_usuario(id_usuario) REFERENCES usuario(id)
    );

CREATE TABLE
    pacientes(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        name_paciente VARCHAR(30) NOT NULL,
        idade INT NOT NULL,
        sexo VARCHAR(1),
        CPF VARCHAR (11) NOT NULL,
        id_medico INT NOT NULL,
        id_usuario INT NOT NULL,
        FOREIGN KEY fk_usuario(id_usuario) REFERENCES usuario(id)
    );

CREATE TABLE
    miccao(
        id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
        normal VARCHAR(30) NOT NULL,
        urgencia INT NOT NULL,
        desconfortavel VARCHAR(1),
        horario HOUR,
        data DATE,
        volumeUrinado INT NOT NULL,
        id_paciente INT NOT NULL,
        FOREIGN KEY fk_paciente(id_paciente) REFERENCES paciente(id)
    );

DROP TABLE login_in;
