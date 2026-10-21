use videoteka;

insert into mjesto (post_broj,naziv) values (51000,'Rijeka');

describe medij;
insert into medij (tip_naziv) values ('DVD');
insert into medij (tip_naziv) values ('BluRay');
insert into medij (tip_naziv) values ('Digital');

SELECT * from medij;

insert into zanr (naziv) values ('Akcija');
insert into zanr (naziv) values ('Komedija');
insert into zanr (naziv) values ('Drama');

select * from zanr;

alter table cjenik add cijena decimal(10,2);

DESCRIBE cjenik;

insert into cjenik (tip_naziv,cijena) values ('Hit film',3.50);
insert into cjenik (tip_naziv,cijena) values ('Obični film',2.50);
insert into cjenik (tip_naziv,cijena) values ('Stari film',1.50);

select * from cjenik;

insert into clan (ime,prezime,datum_rod,post_broj) values ('Ivan','Horvat','1990-05-10',10000);
insert into clan (ime,prezime,datum_rod,post_broj) values ('Ana','Kovač','1995-08-15',51000);

select * from clan;

insert into film (naziv,trajanje,tip_cijena,zanr_id,tip_medij) values
('Matrix',120,1,1,2),
('Maska',95,2,3,1),
('Titanic',187,3,2,3);

select * from film;

insert into posudba (clan_id, film_id, datum_posudbe, datum_vracanja, zakasnina) values
(1,1,'2026-04-01','2026-04-02',0),
(1,2,'2026-04-03','2026-04-05',1.5),
(2,2,'2026-03-30','2026-04-02',4.5),
(4,3,'2026-04-02','2026-04-02',0);

select * from posudba;

ALTER table posudba
MODIFY posudba_id int AUTO_INCREMENT,
add primary key(posudba_id);

-- naredba update

update posudba set posudba_id = 1 where clan_id = 1 and film_id = 1;
update posudba set posudba_id = 2 where clan_id = 1 and film_id = 2;
update posudba set posudba_id = 3 where clan_id = 2 and film_id = 2;
update posudba set posudba_id = 4 where clan_id = 4 and film_id = 3;

insert into posudba (clan_id, film_id, datum_posudbe, datum_vracanja, zakasnina) values
(2,3,'2026-03-15','2026-03-20',6);

select * from clan;


-- brisanje podataka iz tablice
delete from clan where clan_id = 4; -- neće ga izbrisati jer postoji u posudbama

insert into clan (ime,prezime,datum_rod,post_broj) values ('Marko','Marić','1998-01-24',21000);

delete from clan where clan_id = 5;

-- spojiti tablicu clan i tablicu mjesto
select
clan.*,
mjesto.naziv
from clan inner join mjesto
on clan.post_broj = mjesto.post_broj;