-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para edtube
CREATE DATABASE IF NOT EXISTS `edtube` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `edtube`;

-- Volcando estructura para tabla edtube.action_coment
CREATE TABLE IF NOT EXISTS `action_coment` (
  `id_action` int(11) NOT NULL AUTO_INCREMENT,
  `type_action` varchar(30) DEFAULT NULL,
  `id_coment` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_action`),
  KEY `id_user` (`id_user`),
  KEY `id_coment` (`id_coment`),
  CONSTRAINT `action_coment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `action_coment_ibfk_2` FOREIGN KEY (`id_coment`) REFERENCES `comentario` (`id_comentario`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.action_coment: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `action_coment` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_coment` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.asingar_multimedia_t
CREATE TABLE IF NOT EXISTS `asingar_multimedia_t` (
  `id_asignar` int(11) NOT NULL AUTO_INCREMENT,
  `ruta_multimedia` varchar(100) DEFAULT NULL,
  `tipo_multimedia` varchar(10) DEFAULT NULL,
  `id_tablero` int(11) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `metodo_de_pago` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_asignar`),
  KEY `id_tablero` (`id_tablero`),
  CONSTRAINT `asingar_multimedia_t_ibfk_1` FOREIGN KEY (`id_tablero`) REFERENCES `tableros` (`id_tablero`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.asingar_multimedia_t: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `asingar_multimedia_t` DISABLE KEYS */;
INSERT INTO `asingar_multimedia_t` (`id_asignar`, `ruta_multimedia`, `tipo_multimedia`, `id_tablero`, `texto`, `precio`, `metodo_de_pago`) VALUES
	(1, 'imagenes_tablero/data.jpg', 'imagen', 1, NULL, NULL, NULL),
	(2, 'imagenes_tablero/dat.png', 'imagen', 1, NULL, NULL, NULL),
	(3, 'imagenes_tablero/bulvgold.jfif', 'imagen', 1, NULL, NULL, NULL),
	(4, 'imagenes_tablero/descarga (1).jfif', 'imagen', 1, NULL, NULL, NULL),
	(5, 'imagenes_tablero/descarga (2).jfif', 'imagen', 1, NULL, NULL, NULL),
	(24, 'imagenes_tablero/5e9981d1ceb6c.jpeg', 'imagen', 4, NULL, NULL, NULL),
	(25, 'imagenes_tablero/20210723_142338.jpg', 'imagen', 4, NULL, NULL, NULL),
	(26, 'imagenes_tablero/AGROPEDIA_MANTEQUILLA-32.jpg', 'imagen', 4, NULL, NULL, NULL),
	(27, 'imagenes_tablero/como-elegir-una-buena-mantequilla-655x368.jpg', 'imagen', 4, NULL, NULL, NULL),
	(28, 'videos/Kaley_Cuoco_SEX_TAPE-480p.mp4.mp4', 'video', 4, NULL, NULL, NULL),
	(29, 'imagenes_tablero/mantequilla.jpg', 'imagen', 4, NULL, NULL, NULL),
	(30, 'videos/xvideos.com_cef1fd9c55ecb285659a7271f32970cb-1.mp4.mp4', 'video', 4, NULL, NULL, NULL),
	(31, 'imagenes_tablero/NUTRICION-COSMOPOLITAN-BILBAO-FITNESS-CLUB6_CETOSIS.png', 'imagen', 5, NULL, NULL, NULL),
	(32, 'imagenes_tablero/ComoSobrecargaprogresiva.png', 'imagen', 5, NULL, NULL, NULL),
	(33, 'imagenes_tablero/beneficios.png', 'imagen', 5, NULL, NULL, NULL),
	(34, 'imagenes_tablero/red.jpg', 'imagen', 5, NULL, NULL, NULL),
	(35, 'imagenes_tablero/beneficios del aciete de oliva.jpg', 'imagen', 5, NULL, NULL, NULL),
	(36, 'imagenes_tablero/1664898960.jpg', 'imagen', 6, NULL, NULL, NULL),
	(37, 'imagenes_tablero/1664898960.jpg', 'imagen', 6, NULL, NULL, NULL),
	(38, 'videos/1664898960Kaley_Cuoco_SEX_TAPE-480p.mp4.mp4', 'video', 6, NULL, NULL, NULL),
	(39, 'videos/16648989631618196787Sex_tape_Akbar_V_-_sucking_Dick_leak_video.mp4.mp4', 'video', 6, NULL, NULL, NULL),
	(40, 'imagenes_tablero/1664898972.jpg', 'imagen', 6, NULL, NULL, NULL),
	(41, 'imagenes_tablero/1664898973.jpg', 'imagen', 6, NULL, NULL, NULL),
	(42, 'imagenes_tablero/1664898973.jpg', 'imagen', 6, NULL, NULL, NULL),
	(71, 'imagenes_tablero/1665086662tricep2.jpg.jpg', 'imagen', 10, 'esto es importante entiende?', 0, 'none'),
	(74, 'imagenes_tablero/1665086662triceps.jpg.jpg', 'imagen', 10, 'esto es divertido', 0, 'none'),
	(75, 'imagenes_tablero/1666138886Diseno-sin-titulo-2022-07-28T221040.013.png.jpg', 'imagen', 16, 'Pasta con albondigas y salsa roja', 200, 'paypal,btc'),
	(76, 'imagenes_tablero/1666138886450_1000.jpg.jpg', 'imagen', 16, 'pasta don petete', 250, 'paypal,bitcoin,transfer_bank'),
	(77, 'imagenes_tablero/16661388861828b2ea10adc8c9f710fcf959a55a51_PASTA-AL-ROMERO-Lunch_1200_600.png.jpg', 'imagen', 16, '2000', 700, 'paypal');
/*!40000 ALTER TABLE `asingar_multimedia_t` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.boton_menu
CREATE TABLE IF NOT EXISTS `boton_menu` (
  `id_boton` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `url_boton` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_boton`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.boton_menu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `boton_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `boton_menu` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.categorias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.categoria_v
CREATE TABLE IF NOT EXISTS `categoria_v` (
  `id_catev` int(11) NOT NULL AUTO_INCREMENT,
  `cagoria` varchar(30) DEFAULT NULL,
  `fehca_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_catev`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.categoria_v: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_v` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria_v` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `tipo_post` varchar(10) DEFAULT NULL,
  `id_tablero` int(11) DEFAULT NULL,
  `data_og` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data_og`)),
  PRIMARY KEY (`id_comentario`),
  KEY `usuario_id` (`usuario_id`),
  KEY `id_post` (`id_post`),
  KEY `id_tablero` (`id_tablero`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE,
  CONSTRAINT `comentario_ibfk_3` FOREIGN KEY (`id_tablero`) REFERENCES `tableros` (`id_tablero`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.comentario: ~42 rows (aproximadamente)
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` (`id_comentario`, `id_post`, `texto`, `usuario_id`, `fecha_publicacion`, `tipo_post`, `id_tablero`, `data_og`) VALUES
	(3, NULL, 'eso es amigo', 1, '2022-10-08 02:11:59', 'board', 10, '[]'),
	(4, NULL, 'se guardo ahi\r\n', 1, '2022-10-08 02:23:30', 'board', 10, '[]'),
	(7, NULL, 'esto es un palo\r\n', 1, '2022-10-08 09:44:19', 'board', 6, '[]'),
	(9, NULL, 'fdsfsdfds', 1, '2022-10-08 09:59:32', 'board', 10, '[]'),
	(10, NULL, 'la boca del feo ', 1, '2022-10-08 11:55:15', 'board', 10, '[]'),
	(11, NULL, 'entonces estamos listos ya\r\n', 1, '2022-10-09 10:26:45', 'board', 10, '[]'),
	(12, NULL, 'funcionando bien', 1, '2022-10-09 10:27:41', 'board', 10, '[]'),
	(13, NULL, 'oye eso', 1, '2022-10-09 10:29:12', 'board', 8, '[]'),
	(14, NULL, 'los mejores ejercicios de triceps sin duda alguna señores jijij', 2, '2022-10-09 10:40:21', 'board', 10, '[]'),
	(15, NULL, 'eso esta bueno gente', 2, '2022-10-09 10:41:36', 'board', 10, '[]'),
	(16, NULL, 'me gusta que tengo que hacer para utilizarla?', 2, '2022-10-09 12:34:23', 'board', 14, '[]'),
	(20, NULL, 'ademas que funciona de la mejor manera posible de eso no tenemos duda amigos', 2, '2022-10-09 10:04:34', 'board', 10, '[]'),
	(21, NULL, 'ademas es super bueno', 2, '2022-10-09 10:05:02', 'board', 10, '[]'),
	(22, NULL, 'de eso no hay duda campeon tambien estoy de acuerdo', 2, '2022-10-09 10:06:20', 'board', 10, '[]'),
	(23, NULL, 'esto es el mejor uso para comentarios verdad ?', 2, '2022-10-09 10:06:39', 'board', 10, '[]'),
	(24, NULL, 'pain la chica virtual\r\n', 2, '2022-10-10 01:24:58', 'board', 14, '[]'),
	(25, NULL, 'que lo que tu dices idiota?', 2, '2022-10-10 01:25:05', 'board', 14, '[]'),
	(28, NULL, 'sabes que eso es un estandar amigo', 1, '2022-10-13 11:11:58', 'board', 14, '[]'),
	(42, NULL, 'de verdad eso es asi', 1, '2022-10-27 08:08:31', 'board', 8, '[]'),
	(43, NULL, 'yo te entiendo\r\n', 1, '2022-10-27 08:08:36', 'board', 8, '[]'),
	(44, NULL, 'claro que si mi rey', 1, '2022-10-27 08:08:49', 'board', 8, '[]'),
	(48, NULL, 'hola mante', 1, '2022-10-28 04:05:29', 'board', 4, '[]'),
	(49, NULL, 'klk mio', 1, '2022-10-28 04:05:36', 'board', 4, '[]'),
	(52, NULL, 'lo mejor meentiendes broder\r\n', 1, '2022-10-31 10:55:10', 'board', 6, '[]'),
	(53, NULL, 'rico tech 000', 1, '2022-11-01 02:29:06', 'board', 4, '[]'),
	(65, NULL, 'El mejor culo que e visto en mi vida', 1, '2022-11-02 12:07:51', 'board', 6, '{"image":"https://videosegg.com/imagenes/1667012317Video_Emily_Rinaudo_BLOWJOB.jpg","title":"Video Emily Rinaudo BLOWJOB","description":"Porn video Emily Rinaudo compilation leak cumshot  - VideosEgg","url":"https://videosegg.com///playvideo.php?id=8380/Video-Emily-Rinaudo-BLOWJOB","website":"VideosEGG"}'),
	(68, NULL, 'https://videosegg.com//playvideo.php?id=6284/Maite-Ayliffe-periodista-de-River-Plate-victima-de-HACKEO', 1, '2022-11-02 12:48:26', 'board', 6, '[]'),
	(69, NULL, 'https://pornnetflix.com/playvideo/1391/Rachel-fit-sex-tape-lesbian-threesome-', 1, '2022-11-02 04:23:05', 'board', 6, '{"image":"https://pornnetflix.com/imagenes_reddit/1667347720Rachel_fit_sex_tape_lesbian_threesome_.jpg","title":"Rachel fit sex tape lesbian threesome","description":"Rachelfit Share this video please  - PornNetflix","url":"https://www.pornnetflix.com//playvideo/1391/Rachel-fit-sex-tape-lesbian-threesome-","website":"PornNetflix"}'),
	(70, NULL, 'me encanta este estilo de letra esta de pinga hermano de verdad que si', 1, '2022-11-02 04:41:24', 'board', 6, '[]'),
	(71, NULL, 'En esta pagina enontre una manera de hacer dieta keto amigos espero que le gusten que oponinan ustedes sobre esto cualquier feedback me dicen pero de aqui hago mis ricas dietas saludable y hace que mi pene funcione correctamente gracias', 1, '2022-11-02 04:45:50', 'board', 6, '{"image":"https://i.dietdoctor.com/es/wp-content/uploads/2021/02/ES_tablet_PMP.jpg?auto=compress%2Cformat&w=1606&h=1221&fit=crop","title":"Empezar con la dieta keto – Diet Doctor","description":"Te contamos todo lo que necesitas saber sobre la dieta keto: qué es, cómo empezar y qué comer. Déjanos acompañarnos en tu camino hacia la pérdida de peso y la mejora de la salud.","url":"https://www.dietdoctor.com/es/low-carb/menus/empieza-dieta-keto","website":"Diet Doctor"}'),
	(72, NULL, 'Rama del saber humano constituida por el conjunto de conocimientos objetivos y verificables sobre una materia determinada que son obtenidos mediante la observación y la experimentación, la explicación de sus principios y causas y la formulación y verificación de hipótesis y se caracteriza, además, por la utilización de una metodología adecuada para el objeto de estudio y la sistematización de los conocimientos.', 1, '2022-11-02 04:49:39', 'board', 6, '[]'),
	(78, NULL, 'hola', 2, '2022-11-08 10:22:55', 'board', 16, '[]'),
	(79, NULL, 'esta funcionando nitido este tipo de cosas me entiendes?', 2, '2022-11-08 10:23:11', 'board', 16, '[]'),
	(80, NULL, 'el nuevo testamento una vida compai', 2, '2022-11-08 10:30:37', 'board', 16, '[]'),
	(81, NULL, 'Rama del saber humano constituida por el conjunto de conocimientos objetivos y verificables sobre una materia determinada que son obtenidos mediante la observación y la experimentación, la explicación de sus principios y causas y la formulación y verificación de hipótesis y se caracteriza, además, por la utilización de una metodología adecuada para el objeto de estudio y la sistematización de los conocimientos.\r\n"ciencia médica"', 2, '2022-11-09 09:59:40', 'board', 16, '[]'),
	(82, NULL, 'sin duda alguna tenemos el mejor cuality a la venta', 2, '2022-11-10 10:39:02', 'board', 16, '[]'),
	(85, NULL, 'el mejor partido', 1, '2022-11-20 10:42:50', 'board', 6, '{"image":"https://hubdeportivo.com/wp-content/uploads/2022/09/Bayer-Leverkusen-vs-Atletico-Madrid-380x270.jpg","title":"Atlético Madrid vs Bayer Leverkusen","description":"Líder en Información Deportiva","url":"https://hubdeportivo.com/atletico-madrid-vs-bayer-leverkusen/","website":""}'),
	(89, NULL, 'Lo mejor que se creo  realmente', 1, '2022-11-28 11:57:34', 'board', 6, '[]'),
	(153, NULL, '@edisondja uuiuu', 1, '2022-11-30 11:49:48', 'board', 16, '[]'),
	(168, NULL, 'pero carajo que fue lo que paso', 1, '2022-12-11 05:33:43', 'board', 16, '[]'),
	(169, NULL, 'pero el diablo y donde se metio elcomentarioù', 1, '2022-12-24 08:38:32', 'board', 16, '[]'),
	(170, NULL, 'me entienden ya saben verdad?', 1, '2022-12-24 08:38:45', 'board', 16, '[]'),
	(171, NULL, 'yo lo tengo amigo lo encontre en esta paginaq', 1, '2023-04-02 03:26:08', 'board', 17, '[]'),
	(174, NULL, 'https://videosegg.com/playvideo.php?id=8615/Vicente-Gutierrez-Berner-video-Twitter-viral ', 1, '2023-04-02 03:27:31', 'board', 17, '{"image":"https://videosegg.com/imagenes/2304011744Vicente_Gutierrez_Berner_video_Twitter_viral.jpg","title":"Vicente Gutierrez Berner video Twitter viral","description":"Vicente Gutiérrez Berner tiene 28 años y es periodista de la Universidad Diego Portales. Es hermano de la también periodista y escritora, Camila Gutiérrez, conocida por su libro «Joven y alocada».  cuñado de Giorgio Jackson video filtrado en las redes Gay <br/>\\r\\nVideo asqueroso de Vicente Gutiérrez  - VideosEgg","url":"https://videosegg.com//playvideo.php?id=8615/Vicente-Gutierrez-Berner-video-Twitter-viral","website":"VideosEGG"}');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_config` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_sitio` varchar(80) DEFAULT NULL,
  `descripcion_sitio` text DEFAULT NULL,
  `logo_url` varchar(80) DEFAULT NULL,
  `dominio` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.configuracion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.configuracion_usuario_pagos
CREATE TABLE IF NOT EXISTS `configuracion_usuario_pagos` (
  `id_configuracion` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `billetera` text DEFAULT NULL,
  `cuenta_banco` text DEFAULT NULL,
  `nombre_banco` varchar(80) DEFAULT NULL,
  `usuario_paypal` text DEFAULT NULL,
  PRIMARY KEY (`id_configuracion`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `configuracion_usuario_pagos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.configuracion_usuario_pagos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracion_usuario_pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracion_usuario_pagos` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.criterios
CREATE TABLE IF NOT EXISTS `criterios` (
  `id_criterio` int(11) NOT NULL AUTO_INCREMENT,
  `criterio` varchar(80) DEFAULT NULL,
  `fecha_criterio` date DEFAULT NULL,
  PRIMARY KEY (`id_criterio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.criterios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `criterios` DISABLE KEYS */;
/*!40000 ALTER TABLE `criterios` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.favoritos
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_favorito` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_favorito`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_post` (`id_post`),
  CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.favoritos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.like_video
CREATE TABLE IF NOT EXISTS `like_video` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_video` int(11) DEFAULT NULL,
  `fecha_like` datetime DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `like_video_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.like_video: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `like_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `like_video` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `fecha_log` datetime NOT NULL,
  `tracking` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.plugins_config
CREATE TABLE IF NOT EXISTS `plugins_config` (
  `id_plugin` int(11) NOT NULL AUTO_INCREMENT,
  `acoplar` varchar(30) DEFAULT NULL,
  `nombre_conf` varchar(50) DEFAULT NULL,
  `valor_conf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_plugin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.plugins_config: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `plugins_config` DISABLE KEYS */;
/*!40000 ALTER TABLE `plugins_config` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(80) DEFAULT NULL,
  `categoria` varchar(250) DEFAULT NULL,
  `ruta_imagen` varchar(200) DEFAULT NULL,
  `ruta_video` varchar(200) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `previa` varchar(200) DEFAULT NULL,
  `duracion` text DEFAULT NULL,
  `tipo_post` varchar(50) DEFAULT NULL,
  `sub_titulo` varchar(80) DEFAULT NULL,
  `disk_config` varchar(10) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.posts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.reply_coment
CREATE TABLE IF NOT EXISTS `reply_coment` (
  `id_reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `text_coment` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_coment` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reply_id`),
  KEY `id_user` (`id_user`),
  KEY `id_coment` (`id_coment`),
  CONSTRAINT `reply_coment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  CONSTRAINT `reply_coment_ibfk_2` FOREIGN KEY (`id_coment`) REFERENCES `comentario` (`id_comentario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.reply_coment: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `reply_coment` DISABLE KEYS */;
INSERT INTO `reply_coment` (`id_reply_id`, `text_coment`, `id_user`, `id_coment`, `fecha_creacion`) VALUES
	(9, '@Mistered escucha bro esto es lo que esta pasando y tenemos que hacerlo que funcione bien me entiendes?', 1, 78, '2022-12-04 06:50:38'),
	(10, '@Mistered sabes a que me refiero no te hagas el loco por favor ?', 1, 82, '2022-12-04 06:51:23'),
	(11, '@Mistered Claro que si se sir Bellaco', 1, 82, '2022-12-04 06:51:52'),
	(12, 'mas claro de ahi y se daña mi amor', 1, 82, '2022-12-04 06:52:08'),
	(17, '@Mistered estamos la orden señor mister ', 1, 82, '2022-12-11 05:33:09'),
	(18, '@edisondja Esto esta funcionando perfactamente que es lo que sucede', 1, 153, '2022-12-24 08:38:20'),
	(19, '@edisondja que es lo que pasa', 1, 168, '2022-12-24 08:39:47');
/*!40000 ALTER TABLE `reply_coment` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.seguidores
CREATE TABLE IF NOT EXISTS `seguidores` (
  `id_seguidor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `siguiendo_a_usuario` int(11) DEFAULT NULL,
  `fecha_de_seguido` datetime DEFAULT NULL,
  PRIMARY KEY (`id_seguidor`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `seguidores_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.seguidores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seguidores` DISABLE KEYS */;
/*!40000 ALTER TABLE `seguidores` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.tableros
CREATE TABLE IF NOT EXISTS `tableros` (
  `id_tablero` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_tablero` varchar(10) DEFAULT NULL,
  `imagen_tablero` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id_tablero`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `tableros_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.tableros: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tableros` DISABLE KEYS */;
INSERT INTO `tableros` (`id_tablero`, `titulo`, `descripcion`, `fecha_creacion`, `id_usuario`, `tipo_tablero`, `imagen_tablero`) VALUES
	(1, 'Rico hines Sex Tape Leak OMG THIS IS AMAZING WOW', 'this is very good', '2022-09-28 00:00:00', 1, NULL, 'imagenes/220928jpg'),
	(4, 'Mantequilla primero Dios despues mantequilla', 'el mejor negocio del mundo de eso no hay duda mantequilla for live', '2022-10-02 00:00:00', 1, NULL, 'imagenes/221002jpg'),
	(5, 'Lo mejor esta por venir', 'eso lo sabes y no quieres aceptarlo ', '2022-10-04 00:00:00', 1, NULL, 'imagenes/221004jpg'),
	(6, 'Los mejores beneficios del aciete de oliva y comprobado cientificamente tienes que ver esto amgio', 'sin duda alguna los mejores alimentos preparado para servir', '2022-10-04 00:00:00', 1, NULL, 'imagenes/1664898871.jpg'),
	(8, 'El mejor tablero del mundo ok S', 'no deje que le digan pa por que cuando le dicen pa es para joderlo', '2022-10-05 00:00:00', 1, NULL, 'imagenes/1664946868.jpg'),
	(10, 'Los mejores ejercicios para romper tus triceps', 'sin duda alguna tienes que ver esto a continuacion en nuestras imagenes paso por paso', '2022-10-06 00:00:00', 1, NULL, 'imagenes/1665086646.jpg'),
	(14, 'La mejores proteínas listas para ser vendidas de eso no hay dudas amigos tienen que probar esto', 'aquí esta todo lo que necesitas para tu crecimiento muscular de eso no hay duda', '2022-10-09 00:00:00', 2, NULL, 'imagenes_tablero/221009.jpg'),
	(16, 'las mejores pastas de petete listas para la venta si la desea ordenar', 'las mejores pastas del mercado', '2022-10-18 00:00:00', 1, NULL, 'imagenes_tablero/221018.jpg'),
	(17, 'lo necesito', 'Quien tiene el video de Sofia velgara?', '2023-04-02 00:00:00', 1, NULL, 'imagenes/1680463545.jpg');
/*!40000 ALTER TABLE `tableros` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `sexo` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `foto_url` text DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `type_user` varchar(50) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.user: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nombre`, `apellido`, `sexo`, `email`, `clave`, `fecha_creacion`, `foto_url`, `usuario`, `type_user`, `bio`) VALUES
	(1, 'Edison', 'De Jesus', 'masculino', 'edisondj@gmail.com', '2cc6f1f39ebcc32304d6428bb917df1e', '2022-09-28 20:32:46', 'imagenes_perfil/2210252724foto.jpg', 'edisondja', NULL, 'Soy desarrollador de software y creador de contenido en tiktok como entretinimiento y educación de como introducir el miembro a una mujer'),
	(2, 'Julio', 'd', 'masculino', 'yeah@gmail.cm', '2cc6f1f39ebcc32304d6428bb917df1e', '2022-10-09 10:36:15', 'imagenes_perfil/2210093834foto.jpg', 'Mistered', NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.ventas_producto
CREATE TABLE IF NOT EXISTS `ventas_producto` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `bien_o_servicio` text DEFAULT NULL,
  `fecha_de_compra` datetime DEFAULT NULL,
  `tipo_de_pago` varchar(30) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `ventas_producto_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.ventas_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_producto` ENABLE KEYS */;

-- Volcando estructura para tabla edtube.view
CREATE TABLE IF NOT EXISTS `view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_video` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_video` (`id_video`),
  CONSTRAINT `view_ibfk_1` FOREIGN KEY (`id_video`) REFERENCES `posts` (`id_post`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla edtube.view: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `view` DISABLE KEYS */;
/*!40000 ALTER TABLE `view` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
