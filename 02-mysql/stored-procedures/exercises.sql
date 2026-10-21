-- =========================================================
-- VJEŽBA - STORED PROCEDURES, PARAMETRI, UVJETI, PETLJE
-- TRANSAKCIJE, HANDLERI I SAVEPOINT
-- =========================================================

use classicmodels;

-- ---------------------------------------------------------
-- 1.
-- Kreiraj proceduru PopisKupaca koja ispisuje:
-- - customerNumber
-- - customerName
-- - country
-- - creditLimit
-- Sortiraj kupce po customerName uzlazno.
-- ---------------------------------------------------------
DELIMITER $$

create procedure PopisKupaca()
begin
	select
    c.customerNumber,
    c.customerName,
    c.country,
    c.creditLimit
    from classicmodels.customers c order by c.customerName asc;
end $$

DELIMITER ;

call PopisKupaca();
-- ---------------------------------------------------------
-- 2.
-- Kreiraj proceduru PronadjiKupca koja prima ulazni parametar:
-- - broj kupca
-- Procedura treba vratiti sve podatke o tom kupcu.
-- ---------------------------------------------------------

DELIMITER $$

create procedure PronadjiKupca(in p_customerNumber int)
begin
	select
    *
    from classicmodels.customers c where c.customerNumber=p_customerNumber;
end $$

DELIMITER ;

call PronadjiKupca(151);

-- ---------------------------------------------------------
-- 3.
-- Kreiraj proceduru KupciPoDrzavi koja prima naziv države.
-- Ispiši:
-- - customerName
-- - city
-- - country
-- - creditLimit
-- Sortiraj po customerName uzlazno.
-- ---------------------------------------------------------

DELIMITER $$

create procedure KupciPoDrzavi(in p_country varchar(50))
begin
	select
    c.customerName,
    c.city,
    c.country,
    c.creditLimit
    from classicmodels.customers c where c.country=p_country order by c.customerName asc;
end $$

DELIMITER ;

call KupciPoDrzavi("Belgium");
-- ---------------------------------------------------------
-- 4.
-- Kreiraj proceduru KupciPoDrzaviUvjet koja prima naziv države.
-- Izbroji pronađene kupce.
--
-- Ako nema kupaca, ispiši:
-- Nema kupaca iz države NazivDržave.
--
-- Ako postoje kupci, ispiši:
-- Pronađeno je X kupaca iz države NazivDržave.
--
-- Nakon poruke ispiši pronađene kupce.
-- Koristi DECLARE i IF.
-- ---------------------------------------------------------

DELIMITER $$

create procedure KupciPoDrzaviUvjet(in p_country varchar(50))
begin
	select
    c.customerName,
    c.city,
    c.country,
    c.creditLimit
    from classicmodels.customers c where c.country=p_country order by c.customerName asc;
end $$

DELIMITER ;

-- ---------------------------------------------------------
-- 5.
-- Kreiraj proceduru NarudzbePoStatusu koja prima status narudžbe.
-- Ispiši:
-- - orderNumber
-- - orderDate
-- - requiredDate
-- - shippedDate
-- - status
-- - customerNumber
-- Sortiraj po orderDate silazno.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 6.
-- Kreiraj proceduru NarudzbeKupca koja prima customerNumber.
-- Ispiši:
-- - customerName
-- - orderNumber
-- - orderDate
-- - shippedDate
-- - status
-- Sortiraj po orderNumber silazno.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 7.
-- Kreiraj proceduru BrojNarudzbiKupca koja prima customerNumber
-- i preko OUT parametra vraća ukupan broj njegovih narudžbi.
--
-- Nakon CALL naredbe ispiši vrijednost OUT parametra.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 8.
-- Kreiraj proceduru UkupnaVrijednostNarudzbe koja prima
-- orderNumber i preko OUT parametra vraća ukupnu vrijednost
-- te narudžbe.
--
-- Ukupnu vrijednost izračunaj kao:
-- SUM(quantityOrdered * priceEach)
--
-- Uz ukupnu vrijednost ispiši i sve stavke narudžbe.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 9.
-- Kreiraj proceduru PovecajCreditLimit koja prima:
-- - customerNumber
-- - postotak povećanja
--
-- Ako kupac postoji, povećaj mu creditLimit za poslani postotak
-- i ispiši njegov novi creditLimit.
--
-- Ako kupac ne postoji, ispiši poruku:
-- Kupac ne postoji.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 10.
-- Kreiraj proceduru PromijeniStatusNarudzbe koja prima:
-- - orderNumber
-- - novi status
--
-- Ako narudžba postoji, promijeni joj status i ispiši poruku:
-- Status narudžbe X promijenjen je u NoviStatus.
--
-- Ako narudžba ne postoji, ispiši:
-- Narudžba ne postoji.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 11.
-- Kreiraj proceduru ZaposleniciPoPlaci koja prima:
-- - minimalnu plaću
-- - maksimalnu plaću
--
-- Ispiši zaposlenike čija je plaća između poslanih vrijednosti.
-- Prikaži:
-- - employeeNumber
-- - firstName
-- - lastName
-- - jobTitle
-- - salary
-- Sortiraj po salary silazno.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 12.
-- Kreiraj proceduru PovecajPlacuPoUredu koja prima:
-- - officeCode
-- - postotak povećanja
--
-- Povećaj plaću svim zaposlenicima u poslanom uredu.
-- Postavi updatedAt na trenutno vrijeme.
-- Nakon UPDATE-a ispiši broj ažuriranih zaposlenika
-- koristeći ROW_COUNT().
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 13.
-- Kreiraj proceduru ObradiPlace koja pomoću WHILE petlje
-- prolazi kroz brojeve zaposlenika od 1000 do 1100.
--
-- Za svakog pronađenog zaposlenika povećaj plaću za 5%.
-- Za zaposlenike koji ne postoje nemoj raditi ništa.
-- Na kraju ispiši poruku da je obrada završena.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 14.
-- Kreiraj proceduru KategorijaKupca koja prima customerNumber.
--
-- Dohvati creditLimit kupca i ispiši:
-- - Niski limit, ako je creditLimit manji od 50000
-- - Srednji limit, ako je između 50000 i 100000
-- - Visoki limit, ako je veći od 100000
--
-- Ako kupac ne postoji, ispiši:
-- Kupac ne postoji.
-- Koristi IF, ELSEIF i ELSE.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 15.
-- Kreiraj proceduru DodajNovogKupca koja prima:
-- - naziv kupca
-- - prezime kontakt osobe
-- - ime kontakt osobe
-- - telefon
-- - adresu
-- - grad
-- - državu
-- - creditLimit
--
-- Novi customerNumber izračunaj kao:
-- MAX(customerNumber) + 1
--
-- Nakon uspješnog unosa ispiši broj novog kupca.
-- Koristi transakciju i COMMIT.
-- Dodaj EXIT HANDLER koji radi ROLLBACK kod SQL greške.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 16.
-- Kreiraj proceduru DodajNarudzbu koja prima:
-- - customerNumber
-- - productCode
-- - quantityOrdered
-- - priceEach
--
-- Procedura treba:
-- 1. provjeriti postoji li kupac
-- 2. provjeriti postoji li proizvod
-- 3. izračunati novi orderNumber
-- 4. dodati zapis u orders
-- 5. dodati jednu stavku u orderdetails
--
-- Ako kupac ili proizvod ne postoji, napravi ROLLBACK.
-- Ako je sve ispravno, napravi COMMIT.
-- Ispiši odgovarajuću poruku.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 17.
-- Kreiraj proceduru DodajNarudzbuSaProvjeromKolicine koja prima:
-- - customerNumber
-- - productCode
-- - quantityOrdered
-- - priceEach
--
-- Prije unosa provjeri quantityInStock u tablici products.
--
-- Ako nema dovoljno proizvoda, napravi ROLLBACK i ispiši:
-- Nema dovoljno proizvoda na stanju.
--
-- Ako ima dovoljno:
-- - dodaj narudžbu
-- - dodaj stavku narudžbe
-- - smanji quantityInStock za naručenu količinu
-- - napravi COMMIT
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 18.
-- Kreiraj proceduru ObrisiNarudzbu koja prima orderNumber.
--
-- Procedura treba unutar transakcije:
-- 1. provjeriti postoji li narudžba
-- 2. obrisati sve njezine stavke iz orderdetails
-- 3. obrisati narudžbu iz orders
--
-- Ako narudžba ne postoji, ispiši poruku i napravi ROLLBACK.
-- Ako je brisanje uspješno, napravi COMMIT.
-- Dodaj EXIT HANDLER za SQL greške.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 19.
-- Kreiraj proceduru PremjestiKupcaNovomPredstavniku koja prima:
-- - customerNumber
-- - employeeNumber
--
-- Provjeri postoji li kupac.
-- Provjeri postoji li zaposlenik.
-- Provjeri ima li zaposlenik titulu Sales Rep.
--
-- Ako su svi uvjeti zadovoljeni, postavi zaposlenika kao
-- salesRepEmployeeNumber tom kupcu i napravi COMMIT.
--
-- Ako bilo koji uvjet nije zadovoljen, napravi ROLLBACK
-- i ispiši odgovarajuću poruku.
-- ---------------------------------------------------------


-- ---------------------------------------------------------
-- 20.
-- Kreiraj proceduru DodajUredIZaposlenika koja prima:
-- - naziv grada
-- - državu
-- - ime zaposlenika
-- - prezime zaposlenika
-- - jobTitle
--
-- Procedura treba:
-- 1. generirati novi officeCode
-- 2. dodati novi ured
-- 3. postaviti SAVEPOINT nakon dodavanja ureda
-- 4. izračunati novi employeeNumber
-- 5. dodati zaposlenika u novi ured
--
-- Ako unos zaposlenika ne uspije:
-- - vrati se na SAVEPOINT
-- - ured treba ostati spremljen
-- - zaposlenik se ne smije spremiti
--
-- Ako sve uspije, napravi COMMIT.
-- Dodaj EXIT HANDLER za ostale SQL greške.
-- ---------------------------------------------------------