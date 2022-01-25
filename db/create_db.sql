-- Creazione schema pc_hardware
CREATE SCHEMA IF NOT EXISTS `pc_hardware` DEFAULT CHARACTER SET utf8 ;
USE `pc_hardware`;

-- Creazione tabella pc_hardware.users
CREATE TABLE IF NOT EXISTS `pc_hardware`.`users`(
    `email` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `type` varchar(50) NOT NULL,
    `phone` varchar(255),
    PRIMARY KEY (`email`)   
)ENGINE = InnoDB;

-- Creazione tabella pc_hardware.prodotti
CREATE TABLE IF NOT EXISTS `pc_hardware`.`prodotti`(
    `nome` varchar(50) NOT NULL,
    `venditore` varchar(50) NOT NULL,
    `prezzo` decimal(10, 2) NOT NULL,   
    `tipo` varchar(50) NOT NULL,
    `quantita` int(50) NOT NULL,	
    `breve_descrizione` varchar(50) NOT NULL,
    `descrizione` varchar(255) NOT NULL,
    `immagine` varchar(255) NOT NULL,
    PRIMARY KEY(`nome`, `venditore`)
)ENGINE = InnoDB;

-- Creazione tabella pc_hardware.ordine
CREATE TABLE IF NOT EXISTS `pc_hardware`.`ordine`(
    `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    `cliente` varchar(50) NOT NULL,
    `venditore` varchar(50) NOT NULL,
    `nome`  varchar(50) NOT NULL,   
    `prezzo` decimal(10, 2) NOT NULL,   
    `quantita` int(50) NOT NULL,
    `status`  varchar(50) NOT NULL,
    PRIMARY KEY(`id`)
)AUTO_INCREMENT=1,ENGINE = InnoDB;

-- Creazione tabella pc_hardware.acquisto
CREATE TABLE IF NOT EXISTS `pc_hardware`.`acquisto`(
    `id` int(255) NOT NULL,
    `data` datetime NOT NULL,    
    `status`  varchar(50) NOT NULL,
    PRIMARY KEY(`id`,`data`)
)ENGINE = InnoDB;

-- Creazione tabella pc_hardware.notifiche_cliente
CREATE TABLE IF NOT EXISTS `pc_hardware`.`notifiche_cliente`(
    `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    `data` datetime NOT NULL, 
    `email` varchar(50) NOT NULL,
    `tipo` varchar(50) NOT NULL,
    `status` varchar(50) NOT NULL,
    `data_acquisto` datetime,
    `order_id` int(255),
    PRIMARY KEY(`id`),
    FOREIGN KEY (`email`)
        REFERENCES users(`email`)
)ENGINE = InnoDB;

-- Creazione tabella pc_hardware.notifiche_venditore
CREATE TABLE IF NOT EXISTS `pc_hardware`.`notifiche_venditore`(
    `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    `data` datetime NOT NULL,
    `email` varchar(50) NOT NULL,
    `tipo` varchar(50) NOT NULL,
    `status` varchar(50) NOT NULL,
    `nome_prod` varchar(50),
    `quantita` varchar(50),
    `cliente` varchar(50),
    PRIMARY KEY(`id`),
    FOREIGN KEY (`email`)
        REFERENCES users(`email`)
);

-- Creazione tabella pc_hardware.carta_di_credito
CREATE TABLE IF NOT EXISTS `pc_hardware`.`carta_di_credito`(
    `numero` varchar(50) NOT NULL,    
    `email` varchar(50) NOT NULL,
    `scadenzaMese`varchar(5) NOT NULL,
    `scadenzaAnno`int(5) NOT NULL,
    `CVV2` varchar(255) NOT NULL,
    PRIMARY KEY(`numero`),
    FOREIGN KEY (`email`)
        REFERENCES users(`email`)
)ENGINE = InnoDB;