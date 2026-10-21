-- kreirati user-a koji se zove glavniadmin, sa sifrom admin123 i dodijeliti mu sva prava (globalne privilegije) na sve baze
create user IF not EXISTS 'glavniadmin'@'localhost' IDENTIFIED by 'admin123';

-- dodijeliti mu dodatno pravo da on svim ostalim user-ima može davati prava
GRANT all PRIVILEGES on *.* to 'glavniadmin'@'localhost' with GRANT OPTION;

-- kreirati novog user-a koji se zove classicuser0 i ima sifru password0. Dodijeliti mu sva prava na bazu classicmodels.
create user IF not EXISTS 'classicuser0'@'localhost' IDENTIFIED by 'password0';

grant all PRIVILEGES on classicmodels.* to 'classicuser0'@'localhost';

-- kreirati novog user-a koji se zove classicuser1 i ima sifru password1. Dodijeliti mu select prava na bazu voznipark.
create user if not exists 'classicuser1'@'localhost' identified by 'password1';

grant select on voznipark.* to 'classicuser1'@'localhost';

-- kreirati novog user-a koji se zove classicuser2 i ima sifru password2. Dodijeliti mu insert i select prava na bazu classicmodels i tablicu employees.
create user if not exists 'classicuser2'@'localhost' identified by 'password2';

grant select, insert on classicmodels.employees to 'classicuser2'@'localhost';

-- oduzmi insert prava na bazu classicmodels i tablicu employees za korisnika classicuser2
revoke insert on classicmodels.employees from 'classicuser2'@'localhost';

flush PRIVILEGES;

-- -- kreirati novog user-a koji se zove classicuser3 i ima sifru password3. Dodijeliti mu delete, select prava na bazu voznipark i tablicu vlasnici.
create user if not exists 'classicuser3'@'localhost' identified by 'password3';
grant select, delete on voznipark.vlasnici to 'classicuser3'@'localhost';