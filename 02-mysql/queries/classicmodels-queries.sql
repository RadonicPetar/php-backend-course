USE classicmodels;

-- osnovni upiti

-- ispis svih zaposlenika (employees)
SELECT * FROM employees;

-- ispis imena, prezimena i mail adrese svih zaposlenika
select firstName, lastName, email from employees;

-- ispis broja, imena, prezimena i mail adrese svih zaposlenika koji rade u uredu sa šifrom 1
select employeeNumber,firstName, lastName, email, officeCode from employees where officeCode = 1;

-- ispis svih zaposlenika čija je titula 'Sales Rep'
select * from classicmodels.employees where jobTitle = 'Sales Rep';

-- ispis svih zaposlenika čija je titula 'Sales Rep' ili VP Sales
select * from classicmodels.employees where jobTitle = 'Sales Rep' or jobTitle = 'VP Sales';
select * from classicmodels.employees where jobTitle in ('Sales Rep','VP Sales');

-- ispis svih zaposlenika sortiranih po prezimenu silazno
select * from classicmodels.employees ORDER BY lastName desc;

-- ispis sviz zaposlenika sortiranih po employeeNumber uzlazno
select * from classicmodels.employees ORDER BY employeeNumber asc;

-- ispis sviz zaposlenika sortiranih po broju nadređenog uzlazno, zatim po prezimenu silazno
select * from classicmodels.employees ORDER BY reportsTo asc, lastName desc;

-- ispis svih zaposlenika čije prezime počinje sa slovom B
select * from classicmodels.employees where lastName like 'B%';

select * from classicmodels.employees where lastName like 'Bon%';

-- koristeći alias tablice, ispisati broj zaposlenika, ime, prezime i titulu koji ne rade u uredu sa oznakom 3

select
emp.employeeNumber,
emp.firstName,
emp.lastName,
emp.jobTitle,
emp.officeCode
from classicmodels.employees emp
where emp.officeCode <> '3';

-- ispis svih zaposlenika (ime, prezime, email) koji imaju email s domenom classicmodelcars.com
-- koristiti alias tablice
select
e.firstName,
e.lastName,
e.email
from classicmodels.employees e
where e.email like '%classicmodelcars.com';

INSERT INTO `classicmodels`.`employees`
(`employeeNumber`,
`lastName`,
`firstName`,
`extension`,
`email`,
`officeCode`,
`reportsTo`,
`jobTitle`)
VALUES
(1709,
'Kane',
'Henry',
'x5205',
'henry@mail.com',
'4',
1165,
'Sample Manager');

-- ispis svih zaposlenika (ime, prezime, email) koji imaju u tituli riječ manager
select
e.firstName,
e.lastName,
e.email,
e.jobTitle
from classicmodels.employees e
where e.jobTitle like '%manager%';

-- ispis svih zaposlenika (ime, prezime, email, ekstenzija), te izdvojiti broj iz ekstenzije kao zasebnu kolonu pod nazivom Evidencijski broj
select
e.firstName,
e.lastName,
e.email,
e.jobTitle,
e.extension,
substring(e.extension,2) as 'Evidencijski broj'
from classicmodels.employees e order by substring(e.extension,2) desc;

select
e.firstName,
e.lastName,
e.email,
e.jobTitle,
e.extension,
substring(e.extension,2) as EvidBroj
from classicmodels.employees e order by EvidBroj desc;

-- ispisati ukupan broj zaposlenika iz tablice employees
select count(*) as Ukupno from classicmodels.employees;

-- ispisati zaposlenike (ime, prezime, email, reportsTo) kojima je nadređeni sa šifrom 1143, ispisati prva tri zaposlenika po prezimenu silazno
select
emp.firstName,
emp.lastName,
emp.email,
emp.reportsTo
from classicmodels.employees emp
where emp.reportsTo = 1143
order by emp.lastName desc limit 3;

-- ispiši broj zaposlenika po radnom mjestu
-- sortirati po tituli u kojoj ima najviše pa do najmanje
select
emp.jobTitle,count(*) as PoTituli
from classicmodels.employees emp
group by emp.jobTitle
order by PoTituli desc;

-- ispiši broj zaposlenika po radnom mjestu samo ukoliko ih ima više od 2
-- sortirati po tituli u kojoj ima najviše pa do najmanje
select
emp.jobTitle,count(*) as PoTituli
from classicmodels.employees emp
group by emp.jobTitle
having PoTituli > 2
order by PoTituli desc;

-- ispisati šifru zaposlenika, ime, prezime, broj iz ekstenzije, te dodatnu kolonu StatusEvidencije koja će ovisiti o sljedećim uvjetima:
/*
ako je broj iz ekstenzije ispod 1000, ispisati 'Ne razmatra se',
ako je broj iz ekstenzije između 1000 i 4000, ispisati 'Razmatranje',
ako je broj iz ekstenzije između 4001 i 6000, ispisati 'Razmotreno',
inače ispisati 'Arhivirano'
*/
select
emp.employeeNumber,
emp.firstName,
emp.lastName,
emp.extension,
substring(emp.extension,2) as EvidBroj,
CASE
	WHEN substring(emp.extension,2) < 1000 THEN 'Ne razmatra se'
    WHEN substring(emp.extension,2) BETWEEN 1000 AND 4000 THEN 'Razmatranje'
    WHEN substring(emp.extension,2) BETWEEN 4001 AND 6000 THEN 'Razmotreno'
    ELSE 'Arhivirano'
END AS StatusEvidencije
from classicmodels.employees emp;

-- dodati novi stupac salary u tablicu employees
alter table classicmodels.employees add COLUMN salary decimal(10,2);

-- Pretpostavimo da su nadređeni (managers) oni koji imaju jobTitle LIKE '%Manager%'
-- i da oni imaju barem duplo veću plaću od prosječnih zaposlenika
update classicmodels.employees
set salary =
	CASE
		WHEN jobTitle like '%Manager%' then round(rand()*2500+5000,2) -- 5000 - 7500
        ELSE ROUND(RAND()*5000+2000,2) -- 2000 - 7000
	END;

SELECT * FROM classicmodels.employees;

-- AGREGATNE FUNKCIJE
-- ispis prosječne plaće svih zaposlenika
select
round(avg(emp.salary),2) as prosjecna_placa
from classicmodels.employees emp;

-- ispisati najveću i najmanju plaću iz tablice employees zaokruženu na 2 decimale.
select
round(max(emp.salary),2) as 'najveca',
round(min(emp.salary),2) as 'najmanja'
from classicmodels.employees emp;

-- ispisati ime, prezime, plaću svih zaposlenika kojima je plaća veća od prosječne plaće svih zaposlenika
select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary > (select avg(salary) from employees);

-- zaposlenici koji imaju plaću između 3000 i 6000
select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary BETWEEN 3000 and 6000;

-- izračunati prosječnu plaću po tituli zaposlenika
select
emp.jobTitle,
round(avg(emp.salary),2) as ProsjekTitula
from classicmodels.employees emp
group by emp.jobTitle
order by ProsjekTitula desc;

-- ispisati sumu plaća, minimalnu i maksimalnu plaću po tituli Sales Rep
-- dodati 1000 na minimalnu plaću i ispisati u novu kolonu NovaMinimalna
select
emp.jobTitle,
sum(emp.salary) as 'suma',
min(emp.salary) as 'minimalna',
(min(emp.salary)+1000) as 'NovaMinimalna',
max(emp.salary) as 'maksimalna'
from classicmodels.employees emp
where emp.jobTitle = 'Sales Rep'
group by emp.jobTitle;

-- ispisati podatke o zaposlenicima čije prezime počinje sa slovom K, a plaća im je između 6000 i 7000.
-- na iznos plaće zaračunati PDV, ispisati ga u novu kolonu, te u još jednu kolonu ispisati ukupaniznos (plaća + PDV)

select
emp.firstName,
emp.lastName,
emp.salary,
round((emp.salary*0.25),2) as PDV,
round(emp.salary+(emp.salary*0.25),2) as Ukupno
from classicmodels.employees emp
where emp.lastName like 'K%'
and emp.salary BETWEEN 6000 and 7000;

-- UPDATE --

-- ažurirati mail adresu na ime.prezime@mail.com zaposleniku sa brojem 1002
update employees set email = concat(firstName,'.',lastName,'@mail.com') where employeeNumber = 1002;
select * from employees where employeeNumber = 1002;

-- promjeniti plaću zaposleniku sa brojem 1002 na 10000
update employees set salary = 10000 where employeeNumber = 1002;

-- povećati iznos plaće za 10% i promjeniti ured na šifru 4 svim zaposlenicima čiji je nadređeni sa brojem 1088
update employees set salary = salary * 1.1, officeCode=4 where reportsTo = 1088;

select * from employees where reportsTo = 1088;

-- postaviti extenziju na x9999 svim zaposlenicima koji rade u uredu 2
update employees set extension = 'x9999' where officeCode = 2;
select * from employees where officeCode = 2;

-- dodati novu kolonu u tablicu employees koja će se zvati updatedAt i bit će datetime tip.
alter table employees add column updatedAt datetime;

-- došlo je do promjene titule zaposlenika iz Sales Rep u Sales Representative. Izvršiti promjenu i staviti datum ažuriranja na trenutno vrijeme
update employees set jobTitle = 'Sales Representative', updatedAt = now() where jobTitle = 'Sales Rep';
select * from employees;

-- povećati plaću za 100 svima onima kojima je plaća manja od prosječne plaće svih zaposlenika
update employees set salary = salary + 100, updatedAt = now() where salary < (select avg(salary) from employees);

-- postaviti plaću na null svima onima koji nisu nikad ažurirani (NULL)
update employees set salary = NULL where updatedAt is NULL;

-- postaviti plaću na 7000 svima kojima je plaća NULL i koji imaju titulu Sales Manager
update employees set salary = 7000 where salary is NULL and jobTitle = 'Sales Manager';

-- postaviti ekestenziju na x7777, te datum ažuriranja na trenutni svim zaposlenicima čija domena iz mail-a nije 'classicmodelscars.com'
update employees set extension = 'x9999', updatedAt = current_timestamp() where email not like '%classicmodelcars.com%';
select * from employees;

INSERT INTO employees 
(employeeNumber, lastName, firstName, extension, email, officeCode, reportsTo, jobTitle, salary, updatedAt)
VALUES
(1750, 'Smith', 'John', 'x1001', 'john.smith@classicmodelscars.com', '1', NULL, 'Manager', 4500.00, NOW()),
(1752, 'Johnson', 'Emily', 'x1200', 'emily.johnson@classicmodelscars.com', '1', 1002, 'Sales Rep', 3200.00, NOW()),
(1753, 'Brown', 'Michael', 'x1500', 'michael.brown@classicmodelscars.com', '2', 1002, 'Sales Rep', 3100.00, NOW()),
(1755, 'Taylor', 'Olivia', 'x1800', 'olivia.taylor@classicmodelscars.com', '2', 1002, 'Sales Rep', 3300.00, NOW()),
(1757, 'Anderson', 'Daniel', 'x2200', 'daniel.anderson@classicmodelscars.com', '3', 1002, 'Sales Rep', 3400.00, NOW()),
(1759, 'Thomas', 'Sophia', 'x3500', 'sophia.thomas@classicmodelscars.com', '3', 1056, 'Sales Rep', 3600.00, NOW()),
(1852, 'Jackson', 'James', 'x4200', 'james.jackson@classicmodelscars.com', '4', 1056, 'Senior Sales', 4200.00, NOW()),
(1856, 'White', 'Isabella', 'x4800', 'isabella.white@classicmodelscars.com', '4', 1056, 'Sales Rep', 3000.00, NOW()),
(1859, 'Harris', 'William', 'x5500', 'william.harris@classicmodelscars.com', '5', 1143, 'Sales Rep', 3100.00, NOW()),
(1952, 'Martin', 'Charlotte', 'x7000', 'charlotte.martin@classicmodelscars.com', '5', 1088, 'Sales Rep', 2900.00, NOW());

select * from employees where updatedAt >= NOW() - INTERVAL 2 minute;

-- DELETE
-- izbrisati zaposlenika sa brojem 17555
DELETE FROM classicmodels.employees where employeeNumber = 1755;
select * from employees where employeeNumber = 1755;

-- izbrisati zaposlenike čija je plaća 3100 i titula Sales Rep
delete from classicmodels.employees where salary = 3100 and jobTitle = 'Sales Rep';

-- ažurirati plaću na 500 zapsleniku sa rednim brojem 1856
-- zatim izbrisati zaposlenika s najmanjom plaćom

update employees set salary = 500 where employeeNumber = 1856;
select min(salary) from employees;
delete from employees where salary = (select min(salary) from employees);

-- JOIN-ovi
-- izlistaj zaposlenike i njihove nadređene
-- emp1 - zaposlenici
-- emp2 - nadredjeni
select
emp1.employeeNumber as 'Sifra zaposlenik',
emp1.firstName as 'Ime zaposlenik',
emp1.lastName as 'Prezime zaposlenik',
emp1.reportsTo as 'Sifra nadredjeni',
emp1.salary as 'Plaća zaposlenik',
emp2.employeeNumber as 'Sifra nadrejeni',
emp2.firstName as 'Ime nadredjeni',
emp2.lastName as 'Prezime nadredjeni',
emp2.salary as 'Plaća nadredjeni'
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber;

-- ispisati zaposlenike i njihove nadređene gdje je razlika u plaći zaposlenika i nadređenog veća od 2000
select
emp1.employeeNumber as 'Sifra zaposlenik',
emp1.firstName as 'Ime zaposlenik',
emp1.lastName as 'Prezime zaposlenik',
emp1.reportsTo as 'Sifra nadredjeni',
emp1.salary as 'Plaća zaposlenik',
emp2.employeeNumber as 'Sifra nadredjeni',
emp2.firstName as 'Ime nadredjeni',
emp2.lastName as 'Prezime nadredjeni',
emp2.salary as 'Plaća nadredjeni'
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber
where (emp2.salary - emp1.salary) > 2000;

-- provjeriti da li postoje zaposlenici čija je plaća veća od plaće nadređenog, te ako postoje povećati plaću nadredjenog za 2000 veću od plaće zaposlenika
select
emp1.employeeNumber as 'Sifra zaposlenik',
emp1.firstName as 'Ime zaposlenik',
emp1.lastName as 'Prezime zaposlenik',
emp1.reportsTo as 'Sifra nadredjeni',
emp1.salary as 'Plaća zaposlenik',
emp2.employeeNumber as 'Sifra nadredjeni',
emp2.firstName as 'Ime nadredjeni',
emp2.lastName as 'Prezime nadredjeni',
emp2.salary as 'Plaća nadredjeni'
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber
where emp1.salary > emp2.salary;

update classicmodels.employees nad inner join classicmodels.employees zap on zap.reportsTo = nad.employeeNumber
set nad.salary = zap.salary + 2000 where zap.salary > nad.salary;


-- izlistati sve podatke o zaposelnicima, te city, state i country od njihovih ureda
select
emp.*,
o.city,
o.state,
o.country
from classicmodels.employees emp inner join classicmodels.offices o
on emp.officeCode = o.officeCode;

select count(*) from classicmodels.employees;

-- svi zaposlenici koji rade u office-u koji se nalazi u Londonu
select
emp.*,
o.city,
o.state,
o.country
from classicmodels.employees emp inner join classicmodels.offices o
on emp.officeCode = o.officeCode
where o.city = 'London';

-- ispisati broj zaposlenih po državi u kojoj rade
select
o.country as 'Država',
count(emp.employeeNumber) as UkupnoZaposlenih
from classicmodels.employees emp inner join classicmodels.offices o
on emp.officeCode = o.officeCode
group by o.country order by UkupnoZaposlenih desc;

-- ispisati prosjek plaća zaposlenih po državama
select
o.country as 'Država',
avg(emp.salary) as ProsjekPlaca
from classicmodels.employees emp inner join classicmodels.offices o
on emp.officeCode = o.officeCode
group by o.country order by ProsjekPlaca desc;

-- ispisati kupce i njihove prodajne predstavnike
select
cust.customerName,
emp.firstName,
emp.lastName
from classicmodels.customers cust inner join classicmodels.employees emp
on cust.salesRepEmployeeNumber = emp.employeeNumber;

-- ispisati sve predstavnike koji ne zastupaju nijednog kupca
select
concat(emp.firstName,' ',emp.lastName) as Predstavnik,
cust.customerName as Kupac
from classicmodels.employees emp left join classicmodels.customers cust
on cust.salesRepEmployeeNumber = emp.employeeNumber
where cust.customerName is null;

-- ispisati broj kupaca po prodajnom predstavniku (tamo gdje ih nema, ispisati 0)
-- ispisati samo one predstavnike koji imaju 7 i više kupaca
select
concat(emp.firstName,' ',emp.lastName) as Predstavnik,
count(cust.customerName) as BrojKupaca
from classicmodels.employees emp left join classicmodels.customers cust
on cust.salesRepEmployeeNumber = emp.employeeNumber
group by emp.employeeNumber 
having count(cust.customerName) >= 7
order by BrojKupaca desc;


select * from (
select
concat(emp.firstName,' ',emp.lastName) as Predstavnik,
count(cust.customerName) as BrojKupaca
from classicmodels.employees emp left join classicmodels.customers cust
on cust.salesRepEmployeeNumber = emp.employeeNumber
group by emp.employeeNumber) as Tmp where BrojKupaca >= 7;

-- podaci o kupcima i njihovim narudžbama

select
c.customerName,
c.country,
c.creditLimit,
o.customerNumber,
o.orderNumber,
o.orderDate,
o.requiredDate,
o.shippedDate,
o.status
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber;

-- ima li kupaca bez narudžbi?
select
c.customerName,
c.country,
c.creditLimit,
o.customerNumber,
o.orderNumber,
o.orderDate,
o.requiredDate,
o.shippedDate,
o.status
from classicmodels.customers c left join classicmodels.orders o
on c.customerNumber = o.customerNumber 
where o.orderNumber is null
order by o.orderNumber asc;

-- iz kojih država potječu kupci bez narudžbi?
select 
DISTINCT
c.country
from classicmodels.customers c left join classicmodels.orders o
on c.customerNumber = o.customerNumber 
where o.orderNumber is null order by c.country asc;

-- ispisati kupce i ukupan broj njihovih narudžbi
select
c.customerName,
count(o.orderNumber)
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber
group by c.customerNumber;

-- ispisati kupca s najvećim brojem narudžbi?
select
c.customerName,
count(o.orderNumber) as BrojNarudzbi
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber
group by c.customerNumber order by BrojNarudzbi desc limit 1;

-- ispisati kupce s najvećim i najmanjim brojem narudžbi?
select * from (
select
c.customerName,
count(o.orderNumber) as BrojNarudzbi
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber
group by c.customerNumber order by BrojNarudzbi desc limit 1) as tmp1
union all
select * from (select
c.customerName,
count(o.orderNumber) as BrojNarudzbi
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber
group by c.customerNumber order by BrojNarudzbi asc limit 1) as tmp2;

-- ispisti vrijednost svake narudžbe od kupca
select
c.customerName,
o1.orderNumber,
o2.quantityOrdered,
o2.priceEach,
(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
order by c.customerName;

-- ispis ukupnih vrijednosti narudžbi po kupcima
select
c.customerName,
o1.orderNumber,
sum(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
group by c.customerName, o1.orderNumber
order by c.customerName;

-- ispisati ukupne vrijednosti narudžbi za Alpha Cognac te sumu na kraju
select
c.customerName,
o1.orderNumber,
sum(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
where c.customerName = 'Alpha Cognac'
group by c.customerName, o1.orderNumber
union all
select '','Ukupno:',
sum(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
where c.customerName = 'Alpha Cognac'
group by c.customerName;

-- kupci koji su potrošili više od 100000 ukupno za narudžbe?
select
c.customerName,
sum(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
group by c.customerName
having Ukupno > 100000
order by c.customerName;

-- ispisati naziv kupca, broj narudžbe, te koliko je prošlo dana od narudžbe do isporuke
select
c.customerName,
o.orderNumber,
o.orderDate,
o.shippedDate,
datediff(o.shippedDate,o.orderDate) as RazlikaDana
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber where o.shippedDate is not null;

-- za prethodni upit izračunati zakasninu pod sljedećim uvjetima:
-- ako se kasni između 3 i 5 dana, zakasnina je 50 jedinica po danu
-- ako se kasni više od 5 dana, zakasnina je 70 jedinica po danu

select
c.customerName,
o.orderNumber,
o.orderDate,
o.shippedDate,
datediff(o.shippedDate,o.orderDate) as RazlikaDana,
case
	when datediff(o.shippedDate,o.orderDate) between 3 and 5
		then datediff(o.shippedDate,o.orderDate)*50
	when datediff(o.shippedDate,o.orderDate) > 5
		then datediff(o.shippedDate,o.orderDate)*70
	else 0
    end as ZAKASNINA
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber where o.shippedDate is not null;

-- izvedeni
select
customerName,
orderNumber,
orderDate,
shippedDate,
RazlikaDana,
case
	when RazlikaDana between 3 and 5
		then RazlikaDana*50
	when RazlikaDana > 5
		then RazlikaDana*70
	else 0
    end as ZAKASNINA
from
(select
c.customerName,
o.orderNumber,
o.orderDate,
o.shippedDate,
datediff(o.shippedDate,o.orderDate) as RazlikaDana
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber where o.shippedDate is not null) as sub;

-- označiti sve one narudžbe koje nisu isporučene na zahtjevani datum
select
c.customerName,
o.orderNumber,
o.orderDate,
o.requiredDate,
o.shippedDate,
datediff(o.requiredDate,o.shippedDate) as RazlikaDana,
if(datediff(o.shippedDate,o.requiredDate) > 0,'Kasni','Na vrijeme') as STATUS
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber where o.shippedDate is not null;

-- prikažite kupce i njihove posljednje naružbe
select
c.customerNumber,
c.customerName,
o.orderNumber,
o.orderDate as LastOrderDate
from classicmodels.customers c inner join classicmodels.orders o
on c.customerNumber = o.customerNumber 
where o.orderDate = (select max(o2.orderDate) from orders o2 where o2.customerNumber = c.customerNumber)
order by c.customerName;

-- narudžbe unutar zadnjih 15 dana
select
o.orderNumber,o.orderDate
from classicmodels.orders o
where o.orderDate >= date_sub(curdate(), interval 355 day);

-- ispisati sve kupce čiji je credit limit premašio ukupan iznos njihovih narudžbi

select * from (
select
c.customerName,
c.creditLimit,
sum(o2.quantityOrdered*o2.priceEach) as Ukupno
from classicmodels.customers c
inner join classicmodels.orders o1
on c.customerNumber = o1.customerNumber
inner join classicmodels.orderdetails o2
on o1.orderNumber = o2.orderNumber
group by c.customerName) as tmp where Ukupno > creditLimit;