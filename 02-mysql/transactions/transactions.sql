use classicmodels;

/*
potrebno je napraviti transakciju koja će unijeti novu naružbu u tablice orders i orderdetails za kupca s rednim brojem 112
*/

select max(o.orderNumber) from classicmodels.orders o;
select max(o.orderNumber) from classicmodels.orderdetails o;

START TRANSACTION;

-- definiraj idući broj narudžbe
select max(o.orderNumber) into @lastOrderNum from classicmodels.orders o;
set @lastOrderNum = @lastOrderNum + 1;

-- unos nove narudžbe
insert into classicmodels.orders (orderNumber, orderDate, requiredDate, status, customerNumber) values
(@lastOrderNum, curdate(),date_add(curdate(), interval 10 day),'In Progress',112);

-- unesi detalje narudžbe
insert into classicmodels.orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber) values
(@lastOrderNum, 'S10_1949',99,150,4),
(@lastOrderNum, 'S10_2016',99,250,5);

COMMIT;

select * from classicmodels.orders o where o.orderNumber =  @lastOrderNum;
select * from classicmodels.orderdetails od where od.orderNumber =  @lastOrderNum;

select @@autocommit;

set @@autocommit = 0;

-- ROLLBACK
START TRANSACTION;

-- definiraj idući broj narudžbe
select max(o.orderNumber) into @lastOrderNum from classicmodels.orders o;
set @lastOrderNum = @lastOrderNum + 1;

-- unos nove narudžbe
insert into classicmodels.orders (orderNumber, orderDate, requiredDate, status, customerNumber) values
(@lastOrderNum, curdate(),date_add(curdate(), interval 10 day),'In Progress',112);

-- unesi detalje narudžbe
insert into classicmodels.orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber) values
(@lastOrderNum, 'S12_1108',200,199.50,4),
(@lastOrderNum, 'S12_1666',201,189.25,5);

ROLLBACK;

select * from classicmodels.orders o where o.orderNumber =  @lastOrderNum;
select * from classicmodels.orderdetails od where od.orderNumber =  @lastOrderNum;

-- napraviti proceduru pod nazivom DodajNarudzbuZaKupca preko transakcije. Ukoliko kupac postoji, izvršiti commit, inače izvršiti rollback.

DELIMITER $$
create procedure DodajNarudzbuZaKupca(in p_customerNumber int)
begin
	DECLARE broj int;
    declare lastOrderNum int;
    
    start transaction;
    select count(*) into broj from customers where customerNumber = p_customerNumber;
    
    if broj = 0 then
		ROLLBACK;
        SELECT 'Kupac ne postoji, transakcija poništena' as Poruka;
	else
		select max(orderNumber) + 1 into lastOrderNum from orders;
        insert into classicmodels.orders (orderNumber, orderDate, requiredDate, status, customerNumber) values
		(lastOrderNum, curdate(),date_add(curdate(), interval 8 day),'In Progress',p_customerNumber);
        
        -- unesi detalje narudžbe
		insert into classicmodels.orderdetails (orderNumber, productCode, quantityOrdered, priceEach, orderLineNumber) values
		(lastOrderNum, 'S12_1108',210,195.50,4),
		(lastOrderNum, 'S12_1666',220,185.25,5);
        
        commit;
        SELECT concat('Narudžba uspješno dodana: ',lastOrderNum) as Poruka;
    end if;
end $$
DELIMITER ;

call classicmodels.DodajNarudzbuZaKupca(555);

select * from classicmodels.orders o where orderNumber = 10435;
select * from classicmodels.orderdetails o where orderNumber = 10435;

