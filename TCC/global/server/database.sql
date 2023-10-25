CREATE DATABASE IF NOT EXISTS dados;

USE dados;


CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30),
    sobrenome VARCHAR(40),
    email VARCHAR(50) UNIQUE,
    senha_crypt VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS medico (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nameMedico VARCHAR(225),
    crm VARCHAR(15)
);

CREATE TABLE IF NOT EXISTS pacientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    aniversario DATE,
    tel VARCHAR(15),
    CEP VARCHAR(9),
    endereco VARCHAR (225),
    bairro VARCHAR(225),
    estado VARCHAR(255),
    cidade VARCHAR(255),
    pais VARCHAR(255),
    genero VARCHAR(1),
    CPF VARCHAR(11),
    id_medico INT,
    id_usuario INT NOT NULL,
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

CREATE TABLE reset (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL
);

SELECT * FROM usuarios;
SELECT * FROM pacientes;
SELECT * FROM medico;
INSERT INTO medico(nameMedico,crm)VALUES("Camila Bonacordi","175203-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Fernanda Falção","133239-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Maykon Pereira ","168485-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Edgar Oliveira","141529-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Celso Ferreira","44190-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Lucas Tadeu Moura","125324-SP");
INSERT INTO medico(nameMedico,crm)VALUES("Joana Amaral Chanan","35621-SP");



DROP DATABASE dados;
DELETE FROM usuarios;

delete from pacientes;
delete from usuarios;
