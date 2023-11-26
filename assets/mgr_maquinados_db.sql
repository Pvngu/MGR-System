-- Create Database
CREATE DATABASE mgr_maquinados_db;

-- Switch to Database
USE mgr_maquinados_db;

-- Create Tables
CREATE TABLE empleados (
    empleado_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(128),
    nombre_usuario VARCHAR(32) UNIQUE,
    password VARCHAR(255),
    tipo_cuenta VARCHAR(20),
    estado BIT
);

CREATE TABLE articulo (
    articulo_codigo VARCHAR(128) PRIMARY KEY,
    descripcion TEXT
);

CREATE TABLE inventario (
    articulo_id SMALLINT PRIMARY KEY AUTO_INCREMENT,
    articulo_codigo VARCHAR(50),
    stock_inicial SMALLINT,
    stock_actual SMALLINT,
    categoria VARCHAR(1),
    FOREIGN KEY (articulo_codigo) REFERENCES articulos(articulo_codigo) 
    ON DELETE CASCADE
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

CREATE TABLE reporte (
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
       ("Ben the cow", "pan007", "reporte", 1),
       ("Stuart the little rat", "pipi16", "administrador", 0);

INSERT INTO articulos (articulo_codigo, descripcion)
VALUES ("ZNHANDWHEEL", "HAND WEEL ZINK"),
       ("SOLDSS_3/32", "SOLDADURA DE INOXIDABLE DE 3/32 x 3FT"),
       ("RUBBER_1/16", "RUBBER NARANJA DE 1/16"),
       ("RDTG2_5/16", "REDONDO DE TITANIO GRADO 2 DE 5/16"),
       ("RDTG2_3/8", "REDONDO DE TITANIO GRADO 2 DE 3/8");

INSERT INTO inventario (articulo_codigo, stock_inicial, stock_actual, categoria)
VALUES ("ZNHANDWHEEL", 68, 12, "A"),
       ("SOLDSS_3/32", 5, 5, "B"),
       ("RUBBER_1/16", 6, 4, "C");