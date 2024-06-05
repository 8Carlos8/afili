CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(150),
    password VARCHAR(150),
);

CREATE TABLE rol(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50),
);

CREATE TABLE administrador(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_rol INT,
    nombre VARCHAR(250),
    apellido_paterno VARCHAR(250),
    apellido_materno VARCHAR(250),
    correo VARCHAR(200),
    telefono CHAR(10),
    FOREIGN KEY (id_rol) REFERENCES rol(id),
);

CREATE TABLE promotor(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_rol INT,
    nombre VARCHAR(250),
    apellido_paterno VARCHAR(250),
    apellido_materno VARCHAR(250),
    correo VARCHAR(200),
    telefono CHAR(10),
    siglas_promotor CHAR(5),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_rol) REFERENCES rol(id),
);

CREATE TABLE afiliado(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(250),
    apellido_paterno VARCHAR(250),
    apellido_materno VARCHAR(250),
    rfc CHAR(13),
    curp CHAR(18),
    direccion VARCHAR(350),
    numero_Ext_Int CHAR(5),
    codiigo_postal CHAR(5),
    colonia VARCHAR(250),
    telefono CHAR(10),
    correo VARCHAR(200)
    expediente BLOB,
);

CREATE TABLE pago(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_afiliado INT,
    id_promotor INT,
    codigo_factu INT,
    folio INT,
    nombre_comercial VARCHAR(250),
    giro VARCHAR(500),
    giro2 VARCHAR(500),
    /*rubro VARCHAR(500),*/
    localidad VARCHAR(150),
    pago_afiliacion DECIMAL,
    estado CHAR(3),
    direccion VARCHAR(350),
    calle1 VARCHAR(200),
    calle2 VARCHAR(200),
    fecha DATETIME,
    form DECIMAL,
    pago_c DECIMAL,
    extemp DECIMAL,
    salubridad DECIMAL,
    FOREIGN KEY (id_afiliado) REFERENCES afiliado(id),
    FOREIGN KEY (id_promotor) REFERENCES promotor(id),
);