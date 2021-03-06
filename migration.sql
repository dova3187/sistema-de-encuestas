CREATE TABLE IF NOT EXISTS `sistema_encuestas`.`resultado_encabezado` (
  `id` INT NOT NULL,
  `id_encuesta` INT NULL,
  `num_oficina` VARCHAR(45) NULL,
  `id_anios` INT NULL,
  `id_etapa` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB

ALTER TABLE `sistema_encuestas`.`resultado_encabezado` 
CHANGE COLUMN `id` `id` INT NOT NULL AUTO_INCREMENT ;



ALTER TABLE `sistema_encuestas`.`resultados` 
DROP FOREIGN KEY `resultados_ibfk_1`;
ALTER TABLE `sistema_encuestas`.`resultados` 
CHANGE COLUMN `id_opcion` `id_opcion` INT NULL ;
ALTER TABLE `sistema_encuestas`.`resultados` 
ADD CONSTRAINT `resultados_ibfk_1`
  FOREIGN KEY (`id_opcion`)
  REFERENCES `sistema_encuestas`.`opciones` (`id_opcion`)
  ON DELETE CASCADE
  ON UPDATE CASCADE;



ALTER TABLE `sistema_encuestas`.`resultados` 
ADD COLUMN `respuesta_texto` LONGTEXT NULL AFTER `id_opcion`;


ALTER TABLE `sistema_encuestas`.`usuarios_encuestas` 
ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT AFTER `id_encuesta`,
ADD PRIMARY KEY (`id`);
;


INSERT INTO `sistema_encuestas`.`usuarios` (`id_usuario`, `clave`, `nombres`, `apellidos`, `email`, `id_tipo_usuario`) VALUES ('invitado', '****', 'invitado', 'invitado', 'invitado@invitado.com', '2');

ALTER TABLE `sistema_encuestas`.`resultado_encabezado` 
ADD COLUMN `id_usuarios_encuestas` INT NULL AFTER `id_etapa`;

ALTER TABLE `sistema_encuestas`.`encuestas` 
CHANGE COLUMN `fecha_inicio` `fecha_inicio` DATE NULL DEFAULT NULL ,
CHANGE COLUMN `fecha_final` `fecha_final` DATE NULL DEFAULT NULL ;


ALTER TABLE `sistema_encuestas`.`resultados` 
ADD COLUMN `id_resultado_encabezado` INT NULL AFTER `respuesta_texto`;

ALTER TABLE `sistema_encuestas`.`usuarios` 
CHANGE COLUMN `clave` `clave` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL ;

INSERT INTO `sistema_encuestas`.`usuarios` (`id_usuario`, `clave`, `nombres`, `apellidos`, `email`, `id_tipo_usuario`) VALUES ('admin', '$2y$10$.nWNnjzSgIgcZJm2VHSnJOOod2K8Kl3IGmHOjVUI9Rz6FCJSGk93i', 'admin', 'admin', 'admin@admin.com', '1');

