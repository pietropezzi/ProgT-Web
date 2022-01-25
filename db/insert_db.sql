INSERT INTO `users`(email, name, username, password, type, phone) VALUES 
("marco@gmail.it", "Marco", "Marcus", "$2y$10$onefUYMhqWWF8gzW28n44egY8bd60nHzbVPNxf6jYhHrzzOFGl6/W", "cliente", "344332245"), /*PSW = larosa*/
("luigi@luigi.it", "Luigi", "LuigiBros", "$2y$10$TNTjZ1NYV51SINWTruIPHu1OjgtCZMDw/fBNPVAml7tBeVd4Q65eK", "venditore", "07657655"), /*PSW = myriam1*/
("gustavo@gus.it", "Gustavo", "Gus", "$2y$10$6sgwvqrr7ta81lOj1jI8DeKUY8aQcqCk6K7aIfRXlS8CwJNjPeqOe", "venditore", "345678944"); /*PSW = troppo*/

INSERT INTO `notifiche_cliente` (`id`, `data`, `email`, `tipo`, `status`, `data_acquisto`, `order_id`) VALUES
(1, '2022-01-22 15:11:31', 'marco@gmail.it', 'create', 'new', NULL, NULL);

INSERT INTO `notifiche_venditore` (`id`, `data`, `email`, `tipo`, `status`, `nome_prod`, `quantita`, `cliente`) VALUES
(1, '2022-01-20 15:14:47', 'luigi@luigi.it', 'create', 'new', NULL, NULL, NULL),
(2, '2022-01-19 10:15:16', 'gustavo@gus.it', 'create', 'new', NULL, NULL, NULL);

INSERT INTO `prodotti` (`nome`, `venditore`, `prezzo`, `tipo`, `quantita`, `breve_descrizione`, `descrizione`, `immagine`) VALUES
('ASUS Scheda Madre EX-A320M - GAMING Socket AM4 Chi', 'luigi@luigi.it', '90.99', 'motherboard', 40, 'Scheda madre perfetta per il Gaming', 'La scheda madre Asus A320M-A in fattore di forma Micro-ATX, dispone del chipset AMD A320 compatibile con le CPU Ryzen su socket AM4. La serie di schede PRIME 320 sono costruite con i migliori componenti per garantire qualità e durata a lungo termine.', 'gaming-motherboard.jpg'),
('Corsair VS350 Alimentatore PC, 80 Plus, 350 W, EU', 'gustavo@gus.it', '45.24', 'power', 25, 'Alimentatore da PC da 350W', 'Ventola silenziosa da 120 mm con regolazione automatica del regime di rotazione in base alla temperatura. Fattore di correzione della potenza PFC di tipo attivo.', 'Alimentatore.jpg'),
('Seagate Barracuda 500GB 32 Cache', 'gustavo@gus.it', '49.23', 'storage', 20, 'Hardisk da 500GB', "L'unità disco interna portatile BarraCuda è la soluzione ottima per eseguire attività di elaborazione mentre si è in viaggio, in quanto offre un'ottima capacità in un piccolo formato.", 'Hardisk.jpg'),
('Corsair Vengeance RGB ', 'luigi@luigi.it', '88.99', 'memory', 20, 'Corsair Vengeance RGB PRO Black DDR4-RAM 3600 MHz', "I moduli di memoria DDR4 con overclocking CORSAIR serie VENGEANCE RGB PRO illumineranno il tuo PC grazie alla sorprendente illuminazione RGB multizona, offrendo allo stesso tempo le massime prestazioni e stabilità offerte dai modelli DDR4.", '81cGtM0c+UL._AC_SL1500_.jpg'),
('SHARKOON Case PC VS7 Middle Tower ATX Micro ATX Mi', 'luigi@luigi.it', '25.32', 'case', 30, 'Case PC Nero', "Custodia semplice e intuitiva grazie alle prese d'aria laterali e al pannello frontale elementare, la torre ATX midi VS7 emette un'impressione discreta ma diretta, consentendo alla custodia di trovare posto in qualsiasi ufficio o camera da letto.", 'DAM205429553-12-4b16884c-99ff-4e3d-b5f9-ea9081c3cf45.jpg');
