CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(250),
    apellido_paterno VARCHAR(250),
    apellido_materno VARCHAR(250),
    correo VARCHAR(200),
    username VARCHAR(150),
    password VARCHAR(150),
    rol INT,
);

CREATE TABLE promotor(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    siglas_promotor VARCHAR(10),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
);

CREATE TABLE afiliado(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(250),
    rfc VARCHAR(20),
    curp VARCHAR(25),
    direccion VARCHAR(350),
    numero INT,
    codiigo_postal INT,
    colonia VARCHAR(250),
    expediente BLOB,
);

CREATE TABLE pago(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_afiliado INT,
    id_promotor INT,
    codigo_factu INT,
    folio INT,
    nombre_afiliado VARCHAR(250),
    giro VARCHAR(500),
    que_se_dedica VARCHAR(500),
    rubro VARCHAR(500),
    rfc VARCHAR(20),
    direccion VARCHAR(350),
    numero INT,
    codiigo_postal INT,
    colonia VARCHAR(250),
    pertenece VARCHAR(150),
    pago_camara FLOAT,
    telefono VARCHAR(20),
    calle1 VARCHAR(200),
    calle2 VARCHAR(200),
    dia INT,
    mes VARCHAR(50),
    año INT,
    correo VARCHAR(300),
    siglas_promotor VARCHAR(10),
    FOREIGN KEY (id_afiliado) REFERENCES afiliado(id),
    FOREIGN KEY (id_promotor) REFERENCES promotor(id),
);