

CREATE DATABASE IF NOT EXISTS edtube;
USE edtube;

CREATE TABLE user (
  id_user int PRIMARY KEY AUTO_INCREMENT,
  bio text,
  nombre varchar(100),
  apellido varchar(100),
  sexo varchar(30),
  email varchar(200),
  clave varchar(200),
  fecha_creacion datetime,
  foto_url text,
  usuario varchar(50),
  type_user varchar(50)
);

-- Dumping structure for table yousextape.posts
CREATE TABLE posts (
  id_post int primary key AUTO_INCREMENT,
  titulo varchar(80),
  categoria varchar(250),
  ruta_imagen varchar(200),
  ruta_video varchar(200),
  page int,
  descripcion text,
  fecha_publicacion datetime,
  id_user int,
  previa varchar(200),
  duracion TEXT,
  tipo_post varchar(50),
  sub_titulo varchar(80),
  disk_config varchar(10),
  FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);

CREATE table boton_menu(

    id_boton int primary key AUTO_INCREMENT,
    nombre varchar(50),
    url_boton varchar(50)
);


CREATE table favoritos(

    id_favorito int primary key AUTO_INCREMENT,
    id_post INT ,
    id_usuario INT ,        
    FOREIGN KEY (id_usuario) REFERENCES user(id_user) ON DELETE CASCADE,
    FOREIGN KEY (id_post) REFERENCES posts(id_post) ON DELETE CASCADE

);


CREATE TABLE plugins_config(
    id_plugin int primary key AUTO_INCREMENT,
    acoplar varchar(30),
    nombre_conf varchar(50),
    valor_conf varchar(50)
);


CREATE TABLE categoria_v(
     id_catev int primary KEY AUTO_INCREMENT,
     cagoria varchar(30),
     fehca_registro datetime
);

CREATE TABLE configuracion(
    id_config int primary KEY AUTO_INCREMENT,
    titulo_sitio varchar(80),
    descripcion_sitio text,
    logo_url varchar(80),
    dominio varchar(120)
);




CREATE table seguidores(
    id_seguidor int primary key AUTO_INCREMENT,
    id_usuario int,
    siguiendo_a_usuario int,
    fecha_de_seguido DATETIME,
    FOREIGN KEY (id_usuario) REFERENCES user (id_user) ON DELETE CASCADE
);

CREATE table logs(
    id_log int primary key AUTO_INCREMENT,
    id_user int,
    fecha_log DATETIME NOT null,
    tracking varchar(100)
);


CREATE TABLE comentario(
    id_comentario int primary KEY AUTO_INCREMENT,
    id_post int,
    id_tablero int,
    texto text,
    data_og json,
    usuario_id int,
    fecha_publicacion datetime,
    tipo_comentario varchar(10),
    FOREIGN KEY (usuario_id) REFERENCES user(id_user) ON DELETE CASCADE,.
    FOREIGN KEY (id_tablero) REFERENCES tableros(id_tablero) ON DELETE CASCADE,
    FOREIGN KEY (id_post) REFERENCES posts(id_post) ON DELETE CASCADE  
);
  
CREATE TABLE tableros (

    id_tablero int primary key AUTO_INCREMENT,
    titulo varchar(100),
    descripcion text,
    fecha_creacion datetime,
    id_usuario int,
    tipo_tablero varchar(10),
    imagen_tablero varchar(120),
    FOREIGN key (id_usuario) REFERENCES user(id_user) ON DELETE CASCADE
    
);

CREATE TABLE asingar_multimedia_t(
    id_asignar int primary key AUTO_INCREMENT,
    ruta_multimedia varchar(100),
    tipo_multimedia varchar(10),
    texto text,
    precio float,
    metodo_de_pago varchar(30),
    id_tablero int,
    FOREIGN KEY (id_tablero) REFERENCES tableros(id_tablero) ON DELETE CASCADE
);

CREATE TABLE criterios (
  id_criterio int primary key AUTO_INCREMENT,
  criterio varchar(80),
  fecha_criterio date
 
);

CREATE TABLE like_video (
   id_like int primary key AUTO_INCREMENT,
   id_user int,
   FOREIGN  KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE,
   id_video int,
   fecha_like datetime
);

CREATE TABLE view (
  id int primary key AUTO_INCREMENT,
  id_video int,
  FOREIGN KEY (id_video) REFERENCES posts(id_post) ON DELETE CASCADE,
  views int DEFAULT NULL

);
CREATE TABLE categorias (
    id_categoria int primary KEY AUTO_INCREMENT,
    nombre VARCHAR(80),
    fecha_creacion DATETIME
);


CREATE TABLE configuracion_usuario_pagos(
	
	id_configuracion INT PRIMARY KEY AUTO_INCREMENT,
	id_user INT,
	billetera TEXT,
	cuenta_banco TEXT,
	nombre_banco  VARCHAR(80),
	usuario_paypal TEXT,
	FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE


);

CREATE TABLE ventas_producto(
	
	id_venta INT PRIMARY KEY AUTO_INCREMENT,
	id_user INT,
	bien_o_servicio TEXT,
	fecha_de_compra DATETIME,
	tipo_de_pago VARCHAR(30),
	costo FLOAT,
	FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE

);


CREATE TABLE action_coment(

    id_action int primary key AUTO_INCREMENT,
    type_action varchar(30),
    id_coment int,
    id_user int,
    fecha_creacion datetime,
    FOREIGN KEY (id_user) REFERENCES id_user(user) ON DELETE CASCADE,
    FOREIGN KEY (id_coment) REFERENCES comentario(id_comentario) ON DELETE CASCADE
 
);

CREATE TABLE reply_coment(

    id_reply_id int primary KEY AUTO_INCREMENT,
    text_coment text,
    user_emit int,
    fecha_creacion datetime,
    user_recept int,
    FOREIGN KEY (user_emit) REFERENCES id_user(user) ON DELETE CASCADE,
    FOREIGN KEY (user_recept) REFERENCES id_user(user) ON DELETE CASCADE

);