CREATE TABLE `unity` (
 `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `unidad` varchar(64) NOT NULL,
 `created_at` int(11) DEFAULT NULL,
 `updated_at` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `unidad` (`unidad`),
 UNIQUE KEY `unidad_2` (`unidad`)
);

CREATE TABLE `employee` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `nombres` varchar(64) NOT NULL,
 `apellidos` varchar(64) NOT NULL,
 `cargo` varchar(64) NOT NULL,
 `unidades` bigint(20) unsigned NOT NULL,
 `created_at` int(11) DEFAULT NULL,
 `updated_at` int(11) DEFAULT NULL,
 PRIMARY KEY (`id`),
 KEY `fk_employee` (`unidades`),
 CONSTRAINT `fk_employee` FOREIGN KEY (`unidades`) REFERENCES `unity` (`id`)
);