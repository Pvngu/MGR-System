-- Create Database
CREATE DATABASE mgr_maquinados_db;

-- Switch to Database
USE mgr_maquinados_db;

-- Create Tables
CREATE TABLE empleados (
    empleado_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128),
    nombre_usuario VARCHAR(32),
    password VARCHAR(255),
    tipo_cuenta VARCHAR(20),
    estado BIT
);

CREATE TABLE articulos (
    articulo_codigo VARCHAR(128) PRIMARY KEY,
    descripcion TEXT
);

CREATE TABLE entradas (
    entrada_id INT PRIMARY KEY AUTO_INCREMENT,
    fecha_entrada DATE,
    articulo_codigo VARCHAR(128),
    persona_recibida SMALLINT,
    Notas VARCHAR(30),
    FOREIGN KEY(articulo_codigo) REFERENCES articulos(articulo_codigo),
    FOREIGN KEY(persona_recibida) REFERENCES empleados(empleado_id)
);

CREATE TABLE empresas (
    empresa_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(64)
);

CREATE TABLE clientes (
    cliente_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128),
    empresa_id SMALLINT,
    FOREIGN KEY empresa_id REFERENCES empresas(empresa_id)
);

CREATE TABLE pedidos (
    pedido_numero INT PRIMARY KEY AUTO_INCREMENT,
    articulo_codigo VARCHAR(128),
    fecha_salida DATE,
    cantidad INT,
    empleado_id SMALLINT,
    cliente_id SMALLINT,
    FOREIGN KEY(articulo_codigo) REFERENCES articulos(articulo_codigo),
    FOREIGN KEY(empleado_id) REFERENCES empleados(empleado_id),
    FOREIGN KEY(cliente_id) REFERENCES clientes(cliente_id)
);

-- Insert data into the tables
INSERT INTO empleados (nombre, nombre_usuario, tipo_cuenta, estado)
VALUES ("Peanut Butter", "cacahuate07", "administrador", 1), 
       ("Strawberry jelly", "mermelada15", "inventario", 1),
       ("Bread west", "pan007", "reporte", 1),
       ("Stuart the little rat", "pipi16", "administrador", 0);