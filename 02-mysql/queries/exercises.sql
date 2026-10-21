use classicmodels;

-- 1. SELECT, WHERE, LIKE, ORDER BY, LIMIT

select
emp.firstName,
emp.lastName,
emp.email,
emp.jobTitle
from classicmodels.employees emp
where emp.email like 'l%';

select
emp.firstName,
emp.lastName,
emp.jobTitle
from classicmodels.employees emp
where emp.jobTitle like '%Sales%' order by emp.lastName asc;

select
emp.employeeNumber,
emp.firstName,
emp.lastName,
emp.extension
from classicmodels.employees emp
where emp.extension like '%2';

select
*
from classicmodels.employees emp
order by emp.firstName desc limit 4;

select
*
from classicmodels.employees emp
where emp.officeCode in (1,3,5);

-- 2. String funkcije i aliasi

select
emp.firstName,
emp.lastName,
emp.email,
substring_index(emp.email,"@",-1) as Domena
from classicmodels.employees emp;

select
emp.firstName,
emp.lastName,
concat(emp.firstName," ",emp.lastName) as PunoIme
from classicmodels.employees emp;

select
emp.firstName,
emp.lastName,
lower(emp.firstName) as ImeMalaSlova,
upper(emp.lastName) as PrezimeVelikaSlova
from classicmodels.employees emp;

select
emp.firstName,
emp.lastName,
length(emp.lastName) as BrojZnakova 
from classicmodels.employees emp order by BrojZnakova desc;

-- 3. Agregatne funkcije

select
count(*) as BrojSalesRep
from classicmodels.employees emp
where emp.jobTitle = "Sales Rep";

select
round(sum(emp.salary),2) as UkupnaPlaca,
round(avg(emp.salary),2) as ProsjecnaPlaca,
round(min(emp.salary),2) as NajmanjaPlaca,
round(max(emp.salary),2) as NajvecaPlaca
from classicmodels.employees emp;

select
count(distinct emp.jobTitle) as UkupanBrojRazlicitihTitula
from classicmodels.employees emp;

select
round(avg(emp.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp
where emp.officeCode = 1;

-- 4. GROUP BY i HAVING

select
emp.officeCode,
count(*) as BrojZaposlenika
from classicmodels.employees emp
group by emp.officeCode
order by BrojZaposlenika desc;

select
emp.officeCode,
round(avg(emp.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp
group by emp.officeCode;

select
emp.jobTitle,
round(avg(emp.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp
group by emp.jobTitle having ProsjecnaPlaca > 4500;

select
emp.officeCode,
count(*) as BrojZaposlenika 
from classicmodels.employees emp
group by emp.officeCode having count(*) >= 3;

select
emp.jobTitle,
round(sum(emp.salary),2) as SumaPlaca
from classicmodels.employees emp
group by emp.jobTitle having SumaPlaca > 15000;

-- 5. CASE
select
emp.firstName,
emp.lastName,
emp.salary,
case
	when emp.salary < 3000 then 'Niska'
    when emp.salary between 3000 and 5000 then 'Srednja'
	when emp.salary between 5001 and 6500 then 'Visoka'
	else 'Vrlo visoka'
end as RazinaPLace
from classicmodels.employees emp;

select
emp.firstName,
emp.lastName,
emp.jobTitle,
case
	when emp.jobTitle like '%Manager%' then 'Voditelj'
    when emp.jobTitle like '%Sales%' then 'Prodaja'
    when emp.jobTitle like '%President%' then 'Uprava'
    else 'Ostalo'
end as VrstaZaposlenika
from classicmodels.employees emp;

select
substring(emp.extension,2) as ExtenzijaBroj,
case
	when substring(emp.extension,2) < 2000 then 'Stara evidencija'
    when substring(emp.extension,2) between 2000 and 5000 then 'Aktivna evidencija'
    when substring(emp.extension,2) > 5000 then 'Nova evidencija'
end as StatusEkstenzije
from classicmodels.employees emp;

-- 6. Podupiti

select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary < (select avg(salary) from employees);

select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary = (select max(salary) from employees);

select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary = (select min(salary) from employees);

select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary > (select avg(salary) from employees where jobTitle = 'Sales Rep');

select
emp.firstName,
emp.lastName,
emp.officeCode,
emp.salary
from classicmodels.employees emp
where emp.salary > (select avg(salary) from employees emp2 where emp2.officeCode = emp.officeCode);

-- 7. Izračunate kolone

select
emp.firstName,
emp.lastName,
emp.salary,
(emp.salary * 12) as GodisnjaPlaca
from classicmodels.employees emp;

select
emp.salary,
round(round((emp.salary * 1.08),2) - emp.salary, 2) as IznosPovecanja,
round((emp.salary * 1.08),2) as NovaPlaca
from classicmodels.employees emp;

select
emp.firstName,
emp.lastName,
emp.salary,
emp.jobTitle,
round(round((emp.salary * 1.12),2) - emp.salary, 2) as Bonus,
round((emp.salary * 1.12),2) as UkupnaPlacaSaBonusom
from classicmodels.employees emp
where emp.jobTitle = 'Sales Rep';

select
emp.lastName,
emp.salary,
(emp.salary + 500) as PlacaSPovecanjem
from classicmodels.employees emp
where emp.lastName like 'B%' or emp.lastName like 'P%';

-- 8. ALTER TABLE i UPDATE
-- necemo mijenjati bazu jos

-- 9. Malo teži kombinirani zadaci

select
emp.firstName,
emp.lastName,
emp.jobTitle,
emp.salary
from classicmodels.employees emp
where emp.jobTitle not like '%Manager%' order by emp.salary desc limit 3;

select
emp.jobTitle,
count(emp.employeeNumber) as BrojZaposlenika,
round(avg(emp.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp
group by emp.jobTitle having count(*) >= 2 and avg(emp.salary) > 4000;

select
emp.firstName,
emp.lastName,
emp.salary
from classicmodels.employees emp
where emp.salary between (select min(salary) from employees) and (select avg(salary) from employees);

select
left(emp.lastName, 1) as PocetnoSlovo,
count(*) as BrojZaposlenika
from classicmodels.employees emp
group by left(emp.lastName, 1);

select
concat(emp.firstName," ",emp.lastName) as PunoIme,
emp.jobTitle,
emp.salary,
(emp.salary * 12) as GodisnjaPlaca,
case
	when (emp.salary * 12) < 40000 then 'Niža'
    when (emp.salary * 12) between 40000 and 70000 then 'Srednja'
    when (emp.salary * 12) > 70000 then 'Viša'
end as KategorijaPlace
from classicmodels.employees emp order by GodisnjaPlaca desc;

-- 1. UPDATE

update employees set email = lower(concat(lastName,'.',firstName,'@company.hr')) where employeeNumber = 1056;

update employees set salary = (salary * 1.07), updatedAt = now() where officeCode = '3';

update employees set salary = (salary + 500) where jobTitle like '%Manager%';

update employees set extension = 'x111' where extension like 'x1%'; 

update employees set officeCode = 2 where salary between 3000 and 4000;

update employees set salary = 9000 where reportsTo is null;

update employees set email = concat(substring_index(email,'@',1), '@classicmodelcars.com') where email like '%@mail.com';

update employees set jobTitle = 'Sales Rep', updatedAt = now() where jobTitle = 'Sales Representative';

update employees set salary = (salary - (salary * 0.05)) where salary > (select avg(salary) from employees);

update employees set salary = (salary + 300) where salary = (select min(salary) from employees);

update employees set salary = 4000 where salary is null and officeCode = 1 or officeCode = 2;

update employees set updatedAt  = now() where updatedAt is null;

-- 2. UPDATE s CASE

update employees
set salary = case
	when jobTitle = 'Sales -Rep' then salary * 1.08
    when jobTitle like '%Manager%' then salary * 1.12
    else salary * 1.03
end;

update employees
set extension = case
	when officeCode = 1 then 'x1000'
    when officeCode = 2 then 'x2000'
    when officeCode = 3 then 'x3000'
    else 'x9000'
end;

update employees
set salary = case
	when salary < 3000 then 3500
    when salary between 3000 and 5000 then salary + 500
    when salary > 5000 then salary + 1000
end;

-- 3.INSERT neda mi se 

insert into employees 
(employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, salary, updatedAt)
values
(2001, 'Luka', 'Horvat', 'x6100', 'luka.horvat@classicmodelcars.com', '1', 1002, 'Sales Rep', 3700.00, NOW());

insert into employees 
(employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, salary, updatedAt)
values
(2002, 'Petar', 'Perić', 'x6101', 'peric@classicmodelcars.com', '1', 1002, 'Sales Rep', 3800.00, NOW()),
(2003, 'Marko', 'Markić', 'x6102', 'markic@classicmodelcars.com', '2', 1056, 'Sales Rep', 3900.00, NOW()),
(2004, 'Ivan', 'Ivić', 'x6103', 'ivic@classicmodelcars.com', '3', 1088, 'Sales Rep', 4000.00, NOW());

insert into employees 
(employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, salary, updatedAt)
values
(2005, 'Ivana', 'Ivanković', 'x6104', 'ivankovic@classicmodelcars.com', '3', 1088, 'Sales Rep', 4100.00, null);

-- 4 DELETE

select * from employees where employeeNumber = 2001;
DELETE FROM classicmodels.employees where employeeNumber = 2001;

select * from employees where salary < 1000;
DELETE FROM classicmodels.employees where salary < 1000;

select * from employees where reportsTo is null and jobTitle = 'Manager';
DELETE FROM classicmodels.employees where reportsTo is null and jobTitle = 'Manager';

select * from employees where employeeNumber = (select max(employeeNumber) from employees);
DELETE FROM classicmodels.employees where employeeNumber = (select max(employeeNumber) from employees);

select * from employees where salary = (select min(salary) from employees where officeCode = 4);
DELETE FROM classicmodels.employees where salary = (select min(salary) from employees where officeCode = 4);

select * from employees where updatedAt < date_sub(now(), interval 1 year);
DELETE FROM classicmodels.employees where updatedAt < date_sub(now(), interval 1 year);

insert into employees 
(employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle, salary, updatedAt)
values
(2001, 'Luka', 'Horvat', 'x6100', 'luka.horvat@classicmodelcars.com', '1', 1002, 'Sales Rep', 3700.00, '2025-07-23 13:33:47');

-- 5. Self JOIN – zaposlenici i nadređeni

select
emp1.firstName,
emp1.lastName,
emp1.jobTitle,
emp2.firstName,
emp2.lastName,
emp2.jobTitle
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber;

select
emp1.firstName,
emp1.lastName,
emp1.officeCode,
emp2.firstName,
emp2.lastName,
emp2.officeCode
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber where emp1.officeCode != emp2.officeCode;

select
emp1.firstName as ImeZaposlenika,
emp1.lastName as PrezimeZaposlenika,
emp1.salary as PlacaZaposlenika,
emp2.firstName as ImeNadređenog,
emp2.lastName as PrezimeNadređenog,
emp2.salary as PlacaNadređenog,
(emp1.salary - emp2.salary) as RazlikaPlaca
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber where emp1.salary > emp2.salary;

select
emp1.firstName as ImeZaposlenika,
emp1.lastName as PrezimeZaposlenika,
emp1.salary as PlacaZaposlenika,
emp2.firstName as ImeNadređenog,
emp2.lastName as PrezimeNadređenog,
emp2.salary as PlacaNadređenog
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber where emp1.salary <= emp2.salary - 1500;

select
emp2.employeeNumber as SifraNadređenog,
emp2.firstName as ImeNadređenog,
emp2.lastName as PrezimeNadređenog,
count(emp1.employeeNumber) as BrojPodređenih
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber
group by 
emp2.employeeNumber,
emp2.firstName,
emp2.lastName
order by BrojPodređenih desc;

select
emp2.employeeNumber as SifraNadređenog,
emp2.firstName as ImeNadređenog,
emp2.lastName as PrezimeNadređenog,
count(emp1.employeeNumber) as BrojPodređenih
from classicmodels.employees emp1 inner join classicmodels.employees emp2
on emp1.reportsTo = emp2.employeeNumber
group by 
emp2.employeeNumber,
emp2.firstName,
emp2.lastName
having BrojPodređenih >= 3
order by BrojPodređenih desc;

-- 6. JOIN employees i offices

select
emp1.firstName as ImeZaposlenika,
emp1.lastName as PrezimeZaposlenika,
emp1.jobTitle as TitulaZaposlenika,
emp2.city as GradUreda,
emp2.country as DržavaUreda
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
order by emp2.city asc, emp1.lastName desc;

select
emp1.firstName as ImeZaposlenika,
emp1.lastName as PrezimeZaposlenika,
emp1.jobTitle as TitulaZaposlenika,
emp2.city as GradUreda,
emp2.country as DržavaUreda
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
where emp2.country = 'USA';

select
emp1.firstName as ImeZaposlenika,
emp1.lastName as PrezimeZaposlenika,
emp1.jobTitle as TitulaZaposlenika,
emp2.city as GradUreda,
emp2.country as DržavaUreda
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
where emp2.city like 'S%';

select
emp2.city as GradUreda,
count(emp1.employeeNumber) as BrojZaposlenika
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by emp2.city order by count(emp1.employeeNumber) desc;

select
emp2.city as GradUreda,
round(avg(emp1.salary),2) as ProsjecnaPlaca,
round(min(emp1.salary),2) as Minimalna,
round(max(emp1.salary),2) as Maksimalna
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by emp2.city;

select
emp2.country as DrzavaUreda,
count(emp1.employeeNumber) as BrojZaposlenika
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by DrzavaUreda having BrojZaposlenika >= 5 order by BrojZaposlenika desc;

select
emp2.country as DrzavaUreda,
round(avg(emp1.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by DrzavaUreda having ProsjecnaPlaca > 4500 order by ProsjecnaPlaca desc;

select
emp2.city as GradUreda,
count(emp1.employeeNumber) as BrojZaposlenika
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by emp2.city order by BrojZaposlenika desc limit 1;

select
emp2.city as GradUreda,
round(avg(emp1.salary),2) as ProsjecnaPlaca
from classicmodels.employees emp1 left join classicmodels.offices emp2
on emp1.officeCode = emp2.officeCode
group by emp2.city order by ProsjecnaPlaca desc limit 1;

-- 7. JOIN customers i employees

select
cus.customerName as ImeKupca,
cus.country as DrzavaKupca,
cus.contactFirstName as ImeProdajnogKupca,
cus.contactLastName as PrezimeProdajnogKupca,
emp.jobTitle as TitulaPredstavnika
from classicmodels.customers cus left join classicmodels.employees emp
on cus.salesRepEmployeeNumber = emp.employeeNumber;

select
cus.customerName as ImeKupca,
cus.country as DrzavaKupca,
cus.contactFirstName as ImeProdajnogKupca,
cus.contactLastName as PrezimeProdajnogKupca,
emp.jobTitle as TitulaPredstavnika,
emp.officeCode as BrojUreda
from classicmodels.customers cus left join classicmodels.employees emp
on cus.salesRepEmployeeNumber = emp.employeeNumber
where emp.officeCode = 1;

select
cus.customerName as ImeKupca,
cus.country as DrzavaKupca,
cus.contactFirstName as ImeProdajnogKupca,
cus.contactLastName as PrezimeProdajnogKupca
from classicmodels.customers cus left join classicmodels.employees emp
on cus.salesRepEmployeeNumber = emp.employeeNumber
where cus.country = 'USA';

select
count(cus.customerName) as BrojKupaca,
cus.contactFirstName as ImeProdajnogKupca,
cus.contactLastName as PrezimeProdajnogKupca
from classicmodels.customers cus left join classicmodels.employees emp
on cus.salesRepEmployeeNumber = emp.employeeNumber
group by count(cus.customerName);

-- neda mi se vise previse zadataka

-- ============================================
-- VJEŽBA 1 - DML / DQL (JOIN, GROUP BY, CASE)
-- ============================================

-- 1.
-- Ispiši:
-- - naziv kupca
-- - državu
-- - broj narudžbe
-- - datum narudžbe
-- Samo za kupce iz Francuske.

select
cus.customerName as ImeKupca,
cus.country as Država,
ord.orderNumber as BrojNarudžbe,
ord.orderDate as DatumNarudžbe
from classicmodels.customers cus left join classicmodels.orders ord
on cus.customerNumber = ord.customerNumber
where cus.country = 'France';

-- 2.
-- Provjeri postoje li kupci koji nemaju nijednu narudžbu.
-- Prikaži:
-- - naziv kupca
-- - državu
-- Sortiraj po nazivu kupca.
-- Koristi LEFT JOIN.

select
cus.customerName as ImeKupca,
cus.country as Država,
ord.orderNumber as BrojNarudžbe
from classicmodels.customers cus left join classicmodels.orders ord
on cus.customerNumber = ord.customerNumber
where ord.orderNumber is null
order by cus.customerName asc;

-- 3.
-- Ispiši broj narudžbi po kupcu.
-- Prikaži:
-- - naziv kupca
-- - broj narudžbi
-- Prikaži i kupce koji nemaju nijednu narudžbu.
-- Sortiraj od najvećeg broja narudžbi.

select
cus.customerName as ImeKupca,
count(ord.orderNumber) as BrojNarudzbi
from classicmodels.customers cus left join classicmodels.orders ord
on cus.customerNumber = ord.customerNumber
group by cus.customerName
order by count(ord.orderNumber) desc;

-- 4.
-- Ispiši kupce koji imaju više od 5 narudžbi.
-- Prikaži:
-- - naziv kupca
-- - broj narudžbi
-- Koristi HAVING.

select
cus.customerName as NazivKupca,
count(ord.orderNumber) as BrojNarudzbi
from classicmodels.customers cus left join classicmodels.orders ord
on cus.customerNumber = ord.customerNumber
group by cus.customerName having count(ord.orderNumber) > 5 order by count(ord.orderNumber) desc;

-- 5.
-- Ispiši:
-- - naziv kupca
-- - broj narudžbe
-- - ukupnu vrijednost te narudžbe
-- Ukupnu vrijednost izračunaj kao:
-- SUM(quantityOrdered * priceEach)
-- Sortiraj po ukupnoj vrijednosti od najveće prema najmanjoj.

select
cus.customerName as NazivKupca,
count(ord.orderNumber) as BrojNarudzbi,
SUM(od.quantityOrdered * od.priceEach) as UkupnaVrijednostNarudzbe
from classicmodels.customers cus left join classicmodels.orders ord 
on cus.customerNumber = ord.customerNumber
left join classicmodels.orderdetails od
on ord.orderNumber = od.orderNumber
group by cus.customerName, ord.orderNumber order by UkupnaVrijednostNarudzbe desc;

-- 6.
-- Ispiši kupca koji je ukupno potrošio najviše novca.
-- Prikaži:
-- - naziv kupca
-- - ukupno potrošeno
-- Koristi SUM(), GROUP BY, ORDER BY i LIMIT.

select
cus.customerName as NazivKupca,
SUM(od.quantityOrdered * od.priceEach) as UkupnoPotroseno
from classicmodels.customers cus left join classicmodels.orders ord 
on cus.customerNumber = ord.customerNumber
left join classicmodels.orderdetails od
on ord.orderNumber = od.orderNumber
group by cus.customerName, ord.orderNumber 
order by UkupnoPotroseno desc
limit 1;

-- 7.
-- Ispiši:
-- - naziv kupca
-- - broj narudžbe
-- - datum narudžbe
-- - datum isporuke
-- - broj dana između narudžbe i isporuke
-- Koristi DATEDIFF().
-- Prikaži samo narudžbe koje su isporučene.

select
cus.customerName as NazivKupca,
ord.orderNumber as BrojNarudzbe,
ord.orderDate as DatumNarudzbe,
ord.shippedDate as DatumIsporuke,
DATEDIFF(ord.shippedDate, ord.orderDate) AS BrojDana
from classicmodels.customers cus left join classicmodels.orders ord 
on cus.customerNumber = ord.customerNumber
where ord.shippedDate is not null
order by ord.orderDate;

-- 8.
-- Ispiši:
-- - naziv kupca
-- - broj narudžbe
-- - broj dana između narudžbe i isporuke
-- Dodaj novu kolonu StatusIsporuke koristeći CASE:
-- - do 3 dana -> Brza
-- - od 4 do 7 dana -> Normalna
-- - više od 7 dana -> Spora

select
cus.customerName as NazivKupca,
ord.orderNumber as BrojNarudzbe,
DATEDIFF(ord.shippedDate, ord.orderDate) AS BrojDana,
case
	when DATEDIFF(ord.shippedDate, ord.orderDate) <= 3 then 'Brza'
    when DATEDIFF(ord.shippedDate, ord.orderDate) between 4 and 7 then 'Normalna'
    else 'Spora'
end as StatusIsporuke
from classicmodels.customers cus left join classicmodels.orders ord 
on cus.customerNumber = ord.customerNumber
where ord.shippedDate is not null;
