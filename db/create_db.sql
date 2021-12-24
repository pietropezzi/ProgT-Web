CREATE SCHEMA IF NOT EXISTS `pc_hardware` DEFAULT CHARACTER SET utf8 ;
USE `pc_hardware`;

CREATE TABLE `users`(
    `email` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `username` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `phone` int(255),
    PRIMARY KEY (`email`)   
);