CREATE SCHEMA IF NOT EXISTS `pc_hardware` DEFAULT CHARACTER SET utf8 ;
USE `pc_hardware`;

CREATE TABLE `users`(
    `email` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `type` varchar(50) NOT NULL,
    `phone` int(255),
    PRIMARY KEY (`email`)   
);

/* Restano diversi attributi da mettere */
CREATE TABLE `prodotti`(
    `nome` varchar(50) NOT NULL,
    `venditore` varchar(50) NOT NULL,
    `prezzo` decimal(10, 2) NOT NULL,   
    `tipo` varchar(50) NOT NULL,
    `quantità` int(50) NOT NULL,	
    `breve_descrizione` varchar(50) NOT NULL,
    `descrizione` varchar(255) NOT NULL,
    PRIMARY KEY(`nome`, `venditore`)
);