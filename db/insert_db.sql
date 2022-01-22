/** qui ci andremo a mettere i vari valori di prova
tutto quello che è qui è temporaneo **/

INSERT INTO `acquisto` (`id`, `data`, `status`) VALUES
(2, '2022-01-22 15:36:45', 'da_spedire'),
(3, '2022-01-22 15:36:45', 'spedito');

INSERT INTO `notifiche_cliente` (`data`, `email`, `tipo`, `status`, `data_acquisto`, `order_id`) VALUES
('2022-01-22 15:11:31', 'marco@gmail.it', 'create', 'read', NULL, NULL),
('2022-01-22 15:36:45', 'marco@gmail.it', 'acquisto', 'read', '2022-01-22 15:36:45', NULL),
('2022-01-22 15:37:00', 'marco@gmail.it', 'spedito', 'new', '2022-01-22 15:36:45', 3);

INSERT INTO `notifiche_venditore` (`id`, `data`, `email`, `tipo`, `status`, `nome_prod`, `quantita`, `cliente`) VALUES
(1, '2022-01-22 15:14:47', 'luigi@luigi.it', 'create', 'read', NULL, NULL, NULL),
(2, '2022-01-22 15:16:51', 'gustavo@gus.it', 'create', 'new', NULL, NULL, NULL),
(3, '2022-01-22 15:21:32', 'gennaro@gmail.com', 'create', 'read', NULL, NULL, NULL),
(4, '2022-01-22 15:27:06', 'gennaro@gmail.com', 'aggiunto', 'read', 'Seagate Barracuda 500GB 32 Cache', '18', NULL),
(5, '2022-01-22 15:29:50', 'gennaro@gmail.com', 'aggiunto', 'read', 'Corsair VS350 Alimentatore PC, 80 Plus, 350 W, EU', '5', NULL),
(6, '2022-01-22 15:33:34', 'luigi@luigi.it', 'aggiunto', 'read', 'SHARKOON Case PC VS7 Middle Tower ATX Micro ATX Mi', '5', NULL),
(7, '2022-01-22 15:35:07', 'luigi@luigi.it', 'aggiunto', 'read', 'ASUS Scheda Madre EX-A320M - GAMING Socket AM4 Chi', '10', NULL),
(8, '2022-01-22 15:36:45', 'gennaro@gmail.com', 'venduto', 'new', 'Corsair VS350 Alimentatore PC, 80 Plus, 350 W, EU', '3', 'marco@gmail.it'),
(9, '2022-01-22 15:36:45', 'luigi@luigi.it', 'venduto', 'read', 'ASUS Scheda Madre EX-A320M - GAMING Socket AM4 Chi', '4', 'marco@gmail.it');

INSERT INTO `ordine` (`id`, `cliente`, `venditore`, `nome`, `prezzo`, `quantita`, `status`) VALUES
(2, 'marco@gmail.it', 'gennaro@gmail.com', 'Corsair VS350 Alimentatore PC, 80 Plus, 350 W, EU', '45.24', 3, 'acquistato'),
(3, 'marco@gmail.it', 'luigi@luigi.it', 'ASUS Scheda Madre EX-A320M - GAMING Socket AM4 Chi', '90.99', 4, 'acquistato');

INSERT INTO users(email, name, username, password, type, phone) VALUES 
('gennaro@gmail.com', 'Gennaro', 'Genny', '$2y$10$t.0Mkp44VZPFLhloxr.bV.P6dX8O310bSbO/KKzNtq8Qst8L0Cl8y', 'venditore', '34568678'), /*PSW = genny234*/
("marco@gmail.it", "Marco", "Marcus", "$2y$10$onefUYMhqWWF8gzW28n44egY8bd60nHzbVPNxf6jYhHrzzOFGl6/W", "cliente", "344332245"), /*PSW = larosa*/
("luigi@luigi.it", "Luigi", "LuigiBros", "$2y$10$R.2S2APqBuAtr4M38rHR2.vVpD2pLNCpoLIfJ2KM8GsYckwdN2Yyq", "venditore", "07657655"), /*PSW = myriam*/
("gustavo@gus.it", "Gustavo", "Gus", "$2y$10$6sgwvqrr7ta81lOj1jI8DeKUY8aQcqCk6K7aIfRXlS8CwJNjPeqOe", "venditore", "345678944"); /*PSW = troppo*/

INSERT INTO `prodotti` (`nome`, `venditore`, `prezzo`, `tipo`, `quantita`, `breve_descrizione`, `descrizione`, `immagine`) VALUES
('ASUS Scheda Madre EX-A320M - GAMING Socket AM4 Chi', 'luigi@luigi.it', '90.99', 'motherboard', 6, 'Scheda madre perfetta per il Gaming', 'La scheda madre Asus A320M-A in fattore di forma Micro-ATX, dispone del chipset AMD A320 compatibile con le CPU Ryzen su socket AM4. La serie di schede PRIME 320 sono costruite con i migliori componenti per garantire qualitÃ  e durata a lungo termine', 'gaming-motherboard.jpg'),
('Corsair VS350 Alimentatore PC, 80 Plus, 350 W, EU', 'gennaro@gmail.com', '45.24', 'power', 2, 'Alimentatore da PC da 350W', 'Ventola silenziosa da 120 mm con regolazione automatica del regime di rotazione in base alla temperatura\r\nFattore di correzione della potenza PFC di tipo attivo', 'Alimentatore.jpg'),
('Seagate Barracuda 500GB 32 Cache', 'gennaro@gmail.com', '49.23', 'storage', 18, 'Hardisk da 500GB', 'L\'unitÃ  disco interna portatile BarraCuda Ã¨ la soluzione ottima per eseguire attivitÃ  di elaborazione mentre si Ã¨ in viaggio, in quanto offre un\'ottima capacitÃ  in un piccolo formato.', 'Hardisk.jpg'),
('SHARKOON Case PC VS7 Middle Tower ATX Micro ATX Mi', 'luigi@luigi.it', '25.32', 'case', 5, 'Case PC Nero', 'Custodia semplice e intuitiva grazie alle prese d\'aria laterali e al pannello frontale elementare, la torre ATX midi VS7 emette un\'impressione discreta ma diretta, consentendo alla custodia di trovare posto in qualsiasi ufficio o camera da letto. All\'inte', 'DAM205429553-12-4b16884c-99ff-4e3d-b5f9-ea9081c3cf45.jpg');
