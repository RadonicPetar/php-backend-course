-- TRIGGERS

-- osigurati da količina proizvoda ne može biti negativna
DELIMITER $$
	CREATE TRIGGER bi_proizovd_kolicina
    BEFORE INSERT ON proizvod
    FOR EACH ROW
    BEGIN
		IF NEW.kolicina < 0 THEN
			set new.kolicina = 0;
        END IF;
    END $$
DELIMITER ;

INSERT INTO proizvod (naziv, kolicina, cijena, kategorijaId) VALUES ('Skije', -10, 1300, 1);

drop trigger bi_proizvod_cijena;
-- osigurati da nova cijena proizvoda ne bude negativna, u tom slučaju novu cijenu staviti na 1
DELIMITER $$
	CREATE TRIGGER bi_proizvod_cijena
    BEFORE INSERT ON proizvod
    FOR EACH ROW
    BEGIN
		IF NEW.cijena < 0 THEN
			insert into log_table values (concat('Pokušaj unosa negativne cijene: ',NEW.cijena),now());
			set new.cijena = 1;
        END IF;
    END $$
DELIMITER ;



INSERT INTO proizvod (naziv, kolicina, cijena, kategorijaId) VALUES ('Kaciga', 100, -10, 5);

-- DORADA: pokušaj umetanja negativne cijene evidentirati u log tablicu

create table log_table (opis varchar(256), datum_loga datetime);

-- automatski pretvoriti naziv kategorije u velika slova kod unosa
DELIMITER $$
	CREATE TRIGGER bi_kategorija_naziv
    BEFORE INSERT ON kategorija
    FOR EACH ROW
    BEGIN
		set new.naziv = upper(new.naziv);
    END $$
DELIMITER ;

INSERT INTO kategorija (naziv, opis) VALUES
('Kućanstvo', 'Sve za kućanstvo');

-- nakon dodavanja novog proizvoda, evidentirati akciju u tablicu azurirani
DELIMITER $$
	CREATE TRIGGER ai_proizvod_log
    AFTER INSERT ON proizvod
    FOR EACH ROW
    BEGIN
		INSERT INTO azurirani (zapisId, tip, datum_vrijeme_azuriranja)
        values (new.proizvodId,'proizvod AFTER INSERT ON',current_timestamp());
    END $$
DELIMITER ;

INSERT INTO proizvod (naziv, kolicina, cijena, kategorijaId) VALUES ('Regal', 1, 1200, 6);
-- nakon dodavanja nove kategorije, evidentirati akciju u tablicu azurirani sa nazivom kategorije

DELIMITER $$
	CREATE TRIGGER ai_kategorija_log
    AFTER INSERT ON kategorija
    FOR EACH ROW
    BEGIN
		INSERT INTO azurirani (zapisId, tip, datum_vrijeme_azuriranja)
        values (new.kategorijaId,concat(new.naziv,'kategorija AFTER INSERT ON'),current_timestamp());
    END $$
DELIMITER ;

insert into kategorija (naziv,opis) values ('Brodogradnja','Sve za brodove');

-- spriječiti da cijena proizvoda postane negativna kod ažuriranja
drop trigger bu_proizvod_cijena;
DELIMITER $$
	CREATE TRIGGER bu_proizvod_cijena
    BEFORE UPDATE ON proizvod
    FOR EACH ROW
    BEGIN
		IF NEW.cijena < 0 THEN
			SET NEW.cijena = OLD.cijena;
            insert into log_table values (concat('Pokušaj ažuriranja na negativnu cijenu proizvoda ',OLD.proizvodId),now());
        END IF;
    END $$
DELIMITER ;

update proizvod set cijena = -10 where proizvodId = 15;

-- osigurati da naziv kategorije bude velikim slovima kod izmjene
DELIMITER $$
	CREATE TRIGGER bu_kategorija_naziv
    BEFORE UPDATE ON kategorija
    FOR EACH ROW
    BEGIN
			SET NEW.naziv = upper(new.naziv);
            insert into log_table values (concat('Ažurirana kategorija sa ',OLD.naziv,' na ',NEW.naziv),now());
    END $$
DELIMITER ;

update kategorija set naziv = 'Sportina' where kategorijaId = 5;

-- nakon izmene proizvoda, evidentirati promjenu u tablicu ažurirani
DELIMITER $$
	CREATE TRIGGER au_proizvod_log
    AFTER UPDATE ON proizvod
    FOR EACH ROW
    BEGIN
		insert into azurirani (zapisId, tip, datum_vrijeme_azuriranja)
        values (OLD.proizvodId,'proizvod after update',now());
    END $$
DELIMITER ;

update proizvod set cijena = 135 where proizvodId = 15;

-- prije brisanja kategorije evidentirati da je kategorija obrisana
drop trigger bd_kategorija_log;
DELIMITER $$
	CREATE TRIGGER bd_kategorija_log
    BEFORE DELETE ON kategorija
    FOR EACH ROW
    BEGIN
		insert into izbrisani (zapisId, tip, datum_vrijeme_brisanja)
        values (OLD.kategorijaId,'BEFORE DELETE kategorija',now());
    END $$
DELIMITER ;

DELIMITER $$
	CREATE TRIGGER ad_kategorija_log
    AFTER DELETE ON kategorija
    FOR EACH ROW
    BEGIN
		insert into izbrisani (zapisId, tip, datum_vrijeme_brisanja)
        values (OLD.kategorijaId,'AFTER DELETE kategorija',now());
    END $$
DELIMITER ;

delete from kategorija where kategorijaId = 5;

DELIMITER $$
	CREATE TRIGGER ad_proizvod_log
    AFTER DELETE ON proizvod
    FOR EACH ROW
    BEGIN
		insert into izbrisani (zapisId, tip, datum_vrijeme_brisanja)
        values (OLD.proizvodId,'AFTER DELETE proizvod',now());
    END $$
DELIMITER ;

delete from proizvod where proizvodId = 1;

DELIMITER $$
	CREATE TRIGGER ad_proizvod_delete_null
    AFTER UPDATE ON proizvod
    FOR EACH ROW
    BEGIN
		IF NEW.kategorijaId is null then
			DELETE FROM proizvod where proizvodId = new.proizvodId;
        end if;
    END $$
DELIMITER ;

DELIMITER $$
	CREATE TRIGGER ad_kategorija_delete
    AFTER DELETE ON kategorija
    FOR EACH ROW
    BEGIN
			DELETE FROM proizvod where kategorijaId is null;
    END $$
DELIMITER ;

delete from kategorija where kategorijaId = 2;

-- zabraniti brisanje proizvoda kojemu je cijena veća od 50
-- ukoliko se desi situacija, izbaciti custom poruku o zabrani brisanja

DELIMITER $$
	CREATE TRIGGER bd_proizvod_veci_od_50
    BEFORE DELETE ON proizvod
    FOR EACH ROW
    BEGIN
		IF OLD.cijena > 50 THEN
			SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ne možete obrisati proizvod skuplji od 1000';
        END IF;
    END $$
DELIMITER ;

delete from proizvod where proizvodId = 8;

-- zabraniti brisanje proizvoda čiji ukupan iznos prelazi 700
-- izbaciti custom poruku

DELIMITER $$
	CREATE TRIGGER bd_proizvod_iznos_veci_od_700
    BEFORE DELETE ON proizvod
    FOR EACH ROW
    BEGIN
		IF (OLD.kolicina*OLD.cijena) > 700 THEN
			SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Ne možete obrisati proizvod čiji ukupni iznos prelazi 700';
        END IF;
    END $$
DELIMITER ;

delete from proizvod where proizvodId = 9;

-- napraviti novu tablicu naružba u kojoj ćemo moći unijeti narudžbu 
-- ako postoji količina proizvoda koji želimo naručiti na stanu.
-- ako postoji, kod provedbe narudžbe ažurirati novo stanje u tablici proizvod
-- ako ne postoji količina proizvoda, ispisati grešku

create table narudzba 
(narudzbaId int primary key auto_increment,
proizvodId int,
kolicina int,
datum_vrijeme_narudzbe datetime,
foreign key (proizvodId) references proizvod(proizvodId)
);

DELIMITER $$
	CREATE TRIGGER bi_narudzba_provjera
	BEFORE INSERT ON narudzba
	FOR EACH ROW
	BEGIN
		DECLARE stanje int;
        
        select kolicina into stanje from proizvod where proizvodId = new.proizvodId;
        
        IF stanje is null THEN
			SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Proizvod ne postoji';			
        END IF;
        
        IF stanje < NEW.kolicina THEN
			SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Proizvod  nema dovoljno zalina';
		ELSE
			UPDATE proizvod set kolicina = kolicina - new.kolicina where proizvodId = NEW.proizvodId;
        END IF;
	END $$
DELIMITER ;

insert into narudzba (proizvodId,kolicina,datum_vrijeme_narudzbe) values (9,2,now());
insert into narudzba (proizvodId,kolicina,datum_vrijeme_narudzbe) values (12,3,now());
