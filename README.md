Para que o Sistema todo funcione corretamente é necessário criar algumas tabelas no banco de dado..

Primeiro criamos o database e colocamos ele em uso:
```
CREATE DATABASE `bandasantacecilia`;
USE `bandasantacecilia`;
```

depois criamos as seguintes Tabelas.. <br>
Acervo Músical:
```
CREATE TABLE `acervo_musical` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
```

Agenda:
```
CREATE TABLE `agenda` (
  `evento` varchar(255) NOT NULL,
  `data` datetime NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

Integrantes:
```
CREATE TABLE `integrantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `instrumento` varchar(100) NOT NULL,
  `data_matricula` date NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `funcao` varchar(20) NOT NULL,
  `licao` varchar(100) NOT NULL DEFAULT '1',
  `classe` set('C','B','A') NOT NULL DEFAULT 'C',
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `foto_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
```

Partituras:
```
CREATE TABLE `partituras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idmusica` bigint(20) unsigned NOT NULL,
  `instrumento` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `partituras_acervo_musical_fk` (`idmusica`),
  CONSTRAINT `partituras_acervo_musical_fk` FOREIGN KEY (`idmusica`) REFERENCES `acervo_musical` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
);
```
