CREATE DATABASE videoteka CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- sada ćemo napraviti korištenje baze
use videoteka;

create table mjesto
(post_broj int,
naziv varchar(30));

create table medij
(tip_id TINYINT UNSIGNED,
tip_naziv varchar(30));

create table cjenik
(tip_id_cijena TINYINT UNSIGNED,
tip_naziv VARCHAR(20));

create table zanr
(zanr_id TINYINT UNSIGNED,
naziv varchar(50));

create table film
(film_id int,
naziv varchar(100),
trajanje SMALLINT UNSIGNED,
tip_cijena TINYINT UNSIGNED,
zanr_id TINYINT UNSIGNED,
tip_medij TINYINT UNSIGNED);

create table clan
(clan_id int,
ime varchar(50),
prezime varchar(50),
datum_rod date,
post_broj SMALLINT UNSIGNED);

create table posudba
(posudba_id int,
clan_id int,
film_id int,
datum_posudbe date,
datum_vracanja date,
zakasnina decimal(10,2));

alter table mjesto modify post_broj smallint unsigned,
add primary key (post_broj);

DESCRIBE clan;
describe mjesto;

-- modifikacija tablice clan da ju povežemo sa tablicom mjesto
alter table clan
modify clan_id int AUTO_INCREMENT not null,
add primary key (clan_id);

alter table clan
add CONSTRAINT fk_clan_post_broj FOREIGN KEY (post_broj) references mjesto (post_broj);

-- povezivanje tablice film sa tablicama medij, cjenik i zanr
alter table medij
modify tip_id TINYINT UNSIGNED AUTO_INCREMENT,
add primary key (tip_id);

describe medij;

alter table cjenik
modify tip_id_cijena TINYINT UNSIGNED AUTO_INCREMENT,
add primary key (tip_id_cijena);

alter table zanr
modify zanr_id TINYINT UNSIGNED AUTO_INCREMENT,
add primary key (zanr_id);

alter table film
add CONSTRAINT fk_film_tip_cj FOREIGN KEY (tip_cijena) references cjenik (tip_id_cijena),
add CONSTRAINT fk_film_med FOREIGN KEY (tip_medij) references medij (tip_id),
add CONSTRAINT fk_film_zanr FOREIGN KEY (zanr_id) references zanr (zanr_id);

-- povezivanje tablice posudba sa tablicama clan i film
DESCRIBE film;

alter table film
modify film_id int AUTO_INCREMENT,
add PRIMARY KEY (film_id);

alter table posudba
add CONSTRAINT fk_posudba_clan FOREIGN KEY (clan_id) references clan (clan_id),
add CONSTRAINT fk_posudba_film FOREIGN KEY (film_id) references film (film_id);

create table bodovi
(bodovi_id int primary key AUTO_INCREMENT,
zbroj int);

drop table bodovi;



