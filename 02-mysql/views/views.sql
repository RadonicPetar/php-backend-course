use classicmodels;

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

create view KupciPoPredstavniku as 
select
concat(emp.firstName,' ',emp.lastName) as Predstavnik,
count(cust.customerName) as BrojKupaca
from classicmodels.employees emp left join classicmodels.customers cust
on cust.salesRepEmployeeNumber = emp.employeeNumber
group by emp.employeeNumber 
having count(cust.customerName) >= 7;

select * from classicmodels.kupcipopredstavniku order by BrojKupaca desc;
select * from classicmodels.kupcipopredstavniku where BrojKupaca = 8;

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




create view VrijednostNarudzbeKupca as 
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

SELECT * from classicmodels.VrijednostNarudzbeKupca;

create view VjerniKupci as
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

select * from classicmodels.VjerniKupci where customerName like 'B%';
