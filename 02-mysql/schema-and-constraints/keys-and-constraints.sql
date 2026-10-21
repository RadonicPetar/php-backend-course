create database voznipark CHARACTER set utf8mb4 COLLATE utf8mb4_general_ci;

use voznipark;

-- ON DELETE CASCADE ON UPDATE CASCADE
CREATE TABLE vlasnici
(idVlasnika int PRIMARY key AUTO_INCREMENT,
ime varchar(30),
prezime varchar(30));

create table auti
(idAuta int PRIMARY key AUTO_INCREMENT,
marka varchar(50),
model varchar(50),
idVlasnika int,
CONSTRAINT fk_vlasnik1 FOREIGN KEY (idVlasnika) REFERENCES vlasnici (idVlasnika)
on DELETE CASCADE on UPDATE CASCADE);

insert into vlasnici (ime,prezime) values
('Marko','Horvat'),
('Ivana','Novak'),
('Petar','Marić');

select * from vlasnici;

insert into auti (marka,model,idVlasnika) values
('Toyota','Corola',1),
('Audi','A4',2),
('Ford','Focus',3);

select
v.*,a.marka as auto
from voznipark.vlasnici v inner join voznipark.auti a
on v.idVlasnika = a.idVlasnika;

DELETE from vlasnici where idVlasnika = 1;

select * from auti;

update vlasnici set idVlasnika = 33 where idVlasnika = 3;

-- ON DELETE NULL ON UPDATE NULL

CREATE TABLE vlasnicinull
(idVlasnika int PRIMARY key AUTO_INCREMENT,
ime varchar(30),
prezime varchar(30));

create table autinull
(idAuta int PRIMARY key AUTO_INCREMENT,
marka varchar(50),
model varchar(50),
idVlasnika int,
CONSTRAINT fk_vlasnik2 FOREIGN KEY (idVlasnika) REFERENCES vlasnicinull (idVlasnika)
on DELETE set null on UPDATE set null);

insert into vlasnicinull (ime,prezime) values
('Marko','Horvat'),
('Ivana','Novak'),
('Petar','Marić');

insert into autinull (marka,model,idVlasnika) values
('Toyota','Corola',1),
('Audi','A4',2),
('Ford','Focus',3);

select * from autinull;

select
v.*,a.marka as auto
from voznipark.vlasnicinull v inner join voznipark.autinull a
on v.idVlasnika = a.idVlasnika;

-- idemo obrisati vlasnika sa id-em 2
delete from vlasnicinull where idVlasnika = 2;

-- ažurirati id vlasnika sa 1 na 11
update vlasnicinull set idVlasnika = 11 where idVlasnika = 1;

-- on delete restrict on update restrict

CREATE TABLE vlasnicirestrict
(idVlasnika int PRIMARY key AUTO_INCREMENT,
ime varchar(30),
prezime varchar(30));

create table autirestrict
(idAuta int PRIMARY key AUTO_INCREMENT,
marka varchar(50),
model varchar(50),
idVlasnika int,
CONSTRAINT fk_vlasnik3 FOREIGN KEY (idVlasnika) REFERENCES vlasnicirestrict (idVlasnika)
on DELETE restrict on UPDATE restrict);

insert into vlasnicirestrict (ime,prezime) values
('Marko','Horvat'),
('Ivana','Novak'),
('Petar','Marić');

insert into autirestrict (marka,model,idVlasnika) values
('Toyota','Corola',1),
('Audi','A4',2),
('Ford','Focus',3);

select
v.*,a.marka as auto
from voznipark.vlasnicirestrict v inner join voznipark.autirestrict a
on v.idVlasnika = a.idVlasnika;

delete from vlasnicirestrict where idVlasnika = 2;

insert into vlasnicirestrict (ime,prezime) values
('Mijo','Dojder'),
('Frano','Perić'),
('Mirko','Zorić');

select * from vlasnicirestrict;

select * from autirestrict;

insert into autirestrict (marka,model,idVlasnika) values
('Kia','Sportage',5);

select
v.*,a.marka as auto
from voznipark.vlasnicirestrict v left join voznipark.autirestrict a
on v.idVlasnika = a.idVlasnika;

create table garaza
(idGaraza int primary key AUTO_INCREMENT,
naziv varchar(30),
idAuta int,
CONSTRAINT fk_vlasnik4 FOREIGN KEY (idAuta) REFERENCES autirestrict (idAuta)
on DELETE restrict on UPDATE restrict);

insert into garaza (naziv) values ('Garaza 1');
insert into garaza (naziv) values ('Garaza 2');
insert into garaza (naziv) values ('Garaza 3');
insert into garaza (naziv) values ('Garaza 4');
insert into garaza (naziv) values ('Garaza 5');

select
g.idGaraza,
g.naziv,
a.marka
from voznipark.autirestrict a right join voznipark.garaza g
on a.idAuta = g.idAuta;