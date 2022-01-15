/** qui ci andremo a mettere i vari valori di prova
tutto quello che è qui è temporaneo **/

INSERT INTO users(email, name, username, password, type, phone) VALUES 
("marco@marco.it", "Marco", "marcolino", "trottola", "cliente", "369547485"), 
("luigi@luigi.it", "Luigi", "LuigiBros", "myriam", "venditore", "07657655"), 
("gustavo@gus.it", "Gustavo", "gus", "troppo", "venditore", "345678944"); 



INSERT INTO prodotti (nome, venditore,  prezzo, tipo, quantita, breve_descrizione, descrizione ) VALUES 
("ADATA XPG Dozzle(Red Light) 16GB 2400MHZ", "luigi@luigi.it", 45, "Memoria", 3,  "breve_descrizione", "descrizione lunga del prodotto .... "), 
("AMD Ryzen 5 Quad Core 14000", "luigi@luigi.it", 170, "CPU/Processore", 2,  "breve_descrizione", "descrizione lunga del prodotto .... "), 
("Seagate Barracuda 500GB 32 Cache", "gustavo@gus.it", 49, "Memoria_di_massa", 2,  "breve_descrizione", "descrizione lunga del prodotto .... "); 