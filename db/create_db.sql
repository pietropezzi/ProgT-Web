CREATE SCHEMA IF NOT EXISTS `pc_hardware` DEFAULT CHARACTER SET utf8 ;
USE `pc_hardware`;

CREATE TABLE `users`(
    `email` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `type` varchar(50) NOT NULL,
    `phone` varchar(255),
    PRIMARY KEY (`email`)   
);

-- Restano diversi attributi da mettere 
CREATE TABLE `prodotti`(
    `nome` varchar(50) NOT NULL,
    `venditore` varchar(50) NOT NULL,
    `prezzo` decimal(10, 2) NOT NULL,   
    `tipo` varchar(50) NOT NULL,
    `quantita` int(50) NOT NULL,	
    `breve_descrizione` varchar(50) NOT NULL,
    `descrizione` varchar(255) NOT NULL,
    `immagine` varchar(255) NOT NULL,
    PRIMARY KEY(`nome`, `venditore`)
);

CREATE TABLE `ordine`(
    `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
    `cliente` varchar(50) NOT NULL,
    `venditore` varchar(50) NOT NULL,
    `nome`  varchar(50) NOT NULL,   
    `prezzo` decimal(10, 2) NOT NULL,   
    `quantita` int(50) NOT NULL,
    `status`  varchar(50) NOT NULL,
    PRIMARY KEY(`id`)
)AUTO_INCREMENT=1;

CREATE TABLE `acquisto`(
    `id` int(255) NOT NULL,
    `data` datetime NOT NULL,    
    `status`  varchar(50) NOT NULL,
    PRIMARY KEY(`id`,`data`)
);
/*TODO: foreign key*/

CREATE TABLE `notifiche_cliente`(
    `data` datetime NOT NULL, 
    `email` varchar(50) NOT NULL,
    `tipo` varchar(50) NOT NULL,
    `status` varchar(50) NOT NULL,
    `data_acquisto` datetime,
    `order_id` int(255),
    PRIMARY KEY(`data`,`email`),
    FOREIGN KEY (`email`)
        REFERENCES users(`email`)
);

CREATE TABLE `notifiche_venditore`(
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


CREATE TABLE `carta_di_credito`(
    `numero` int(20) NOT NULL,    
    `email` varchar(50) NOT NULL,
    `scadenzaMese`varchar(5) NOT NULL,
    `scadenzaAnno`int(5) NOT NULL,
    `CVV2` varchar(255) NOT NULL,
    PRIMARY KEY(`numero`),
    FOREIGN KEY (`email`)
        REFERENCES users(`email`)
);