use classicmodels;

DELIMITER $$
CREATE PROCEDURE PopisZaposlenika()
BEGIN
	SELECT
	e.employeeNumber,
    e.firstName,
    e.lastName,
    e.jobTitle
    FROM classicmodels.employees e;
END $$
DELIMITER ;

call classicmodels.PopisZaposlenika();

-- napraviti proceduru koja će za šifru zaposlenika vratiti njegove podatke

DELIMITER $$
CREATE PROCEDURE PronadjiZaposlenikaPoBroju(in brojZap int)
BEGIN
	SELECT
	e.employeeNumber,
    e.firstName,
    e.lastName,
    e.jobTitle
    FROM classicmodels.employees e WHERE e.employeeNumber = brojZap;
END $$
DELIMITER ;

call classicmodels.PronadjiZaposlenikaPoBroju(5555);

-- napraviti proceduru koja će za upisanu titulu vratiti zaposlenike, te ispisati ujedno ukupan broj vraćenih zaposlenika

DELIMITER $$
create procedure ZaposleniciPoTituli(in titula varchar(40))
begin
	DECLARE brojZapisa int;
    
    SELECT
	count(*) into brojZapisa
    FROM classicmodels.employees e WHERE e.jobTitle = titula;
    
	SELECT
	e.employeeNumber,
    e.firstName,
    e.lastName,
    e.jobTitle
    FROM classicmodels.employees e WHERE e.jobTitle = titula;
    
    select brojZapisa as UkupanBrojRedova;
end $$
DELIMITER ;

call classicmodels.ZaposleniciPoTituli('Sales Rep');

drop PROCEDURE classicmodels.ZaposleniciPoTituli;

-- kreirati proceduru ZaposleniciPoTituliUredu koja prima ulazne parametre titulu i naziv ureda, te vraća sve zaposlenike koji imaju traženu titulu
-- i rade u traženom uredu

DELIMITER $$
create procedure ZaposleniciPoTituliUredu(in titula varchar(40), in ured varchar(40))
begin
	SELECT
	e.employeeNumber,
    e.firstName,
    e.lastName,
    e.jobTitle
    FROM classicmodels.employees e 
    inner join classicmodels.offices o
    on e.officeCode = o.officeCode
    WHERE e.jobTitle = titula and o.city = ured;
end $$
DELIMITER ;

call classicmodels.ZaposleniciPoTituliUredu('Sales Rep','London');

-- kreirati proceduru ZaposleniciPoTituliUredu koja prima ulazne parametre titulu i naziv ureda, te vraća sve zaposlenike koji imaju traženu titulu
-- i rade u traženom uredu (naziv grada), 
-- te ukoliko ne pronađemo nijedan rezultat, ispisati: Nema zaposlenika s titulom NazivTitule i uredom NazivUreda, te ispisati broj zapisa
-- ukoliko pronađemo rezultate, ispisati: Pronađeno s titulom NazivTiutle i uredom NazivUreda sljedeći broj zapisa: BrojZapisa
-- za uvjet 2 ispisati pronađene zaposlenike

DELIMITER $$
create procedure ZaposleniciPoTituliUreduUvjet(in titula varchar(40), in ured varchar(40))
begin
	declare brojZapisa int;
    
    SELECT
	count(*) into brojZapisa
    FROM classicmodels.employees e 
    inner join classicmodels.offices o
    on e.officeCode = o.officeCode
    WHERE e.jobTitle = titula and o.city = ured;
    
    IF brojZapisa = 0 THEN
		select concat('Nema zaposlenika s tiulom "',titula,'" i uredom "',ured,'": ',brojZapisa) as Poruka;
	ELSE
		select concat('Pronađeno s titulom "',titula,'" i uredom "',ured,'" sljedeći broj zapisa: ',brojZapisa) as Poruka;
		SELECT
			e.employeeNumber,
			e.firstName,
			e.lastName,
			e.jobTitle
			FROM classicmodels.employees e 
			inner join classicmodels.offices o
			on e.officeCode = o.officeCode
		WHERE e.jobTitle = titula and o.city = ured;
	END IF;
end $$
DELIMITER ;

call classicmodels.ZaposleniciPoTituliUreduUvjet('Sales Rep','London');

select user, host from mysql.user;

show grants for 'classicuser1'@'localhost';

GRANT SELECT ON `classicmodels`.* TO `classicuser1`@`localhost`;

-- dati prava za izvršavanje procedure
grant EXECUTE on PROCEDURE classicmodels.ZaposleniciPoTituliUreduUvjet to `classicuser1`@`localhost`;
grant EXECUTE on classicmodels.ZaposleniciPoTituliUreduUvjet to `classicuser1`@`localhost`; -- za sve procedure

-- napraviti proceduru pod nazivom PopisNarudzbi koja će kao ulazne parametre za datum narudžbe primati datum_od i datum_do.
-- ispisati naziv kupca, creditLimit i country, te broj narudžbe, datum narudžbe i status sortirane po nazivu kupca uzlazno, te brojunarudžbe silazno


DELIMITER $$
create procedure PopisNarudzbi(in datum_od date, in datum_do date)
begin
		SELECT
			c.customerName,
            c.creditLimit,
            c.country,
            o.orderNumber,
            o.orderDate,
            o.status
			FROM classicmodels.customers c
			inner join classicmodels.orders o
			on c.customerNumber = o.customerNumber
            where o.orderDate BETWEEN datum_od and datum_do
        order by c.customerName asc, o.orderNumber desc;
end $$
DELIMITER ;

call classicmodels.PopisNarudzbi('2025-01-01','2025-05-31');

-- napraviti proceduru koja prima ulazni parametar broj zaposlenika
-- te mu povećava plaću za 10% ukoliko ga pronađe
-- ako ga pronađe ili ne pronađe, ispiše poruku: Nova plaća zaposlenika (ili -1 ako ne postoji)

DELIMITER $$
create procedure PovecajPlacuZaposlenika(inout p_employeeNumber int)
begin
	declare broj int;
    
    -- provjera da li postoji zaposlenik
    select count(*) into broj from classicmodels.employees e where e.employeeNumber = p_employeeNumber;
    
    if broj=0 then
		set p_employeeNumber = -1;
    else
		update employees
        set salary = salary * 1.10, updatedAt = now()
        where employeeNumber = p_employeeNumber;
        
        -- vrati novu plaću u istom parametru
        select salary into p_employeeNumber
        from employees where employeeNumber = p_employeeNumber;
    end if;
end $$
DELIMITER ;

set @emp = 1323;
call classicmodels.PovecajPlacuZaposlenika(@emp);
-- ispis
select @emp as 'Nova plaća zaposlenika (-1 ako ne postoji)';

-- napraviti proceduru koja će za zaposlenike od rednog broja od 1610 do 1630 povećati plaću za 10% (koristeći već postojeću proceduru)
DELIMITER $$
create procedure PovecajPlacuZaViseZap()
begin
	DECLARE i int default 1610;
    
    while i <= 1630 do
		set @emp = i;
        call classicmodels.PovecajPlacuZaposlenika(@emp);
        
        select concat('Zaposlenik ',i,' => nova plaća: ',@emp) as Info;
        
        set i = i + 1;
    end while;
end $$
DELIMITER ;

call classicmodels.PovecajPlacuZaViseZap();

-- za zadani customerNumber ispisati sve njegove narudžbe i proizvode te
-- izračunati ukupni promet i vratiti ga kroz out parametar

DELIMITER $$
create procedure UkupanPrometKupca(in p_customerNumber int, out p_ukupanPromet decimal(10,2))
begin
    -- ukupan promet
    select
	sum(od.quantityOrdered*od.priceEach) into p_ukupanPromet
    from classicmodels.customers c inner join classicmodels.orders o
    on c.customerNumber = o.customerNumber
    inner join classicmodels.orderdetails od
    on o.orderNumber = od.orderNumber
    where c.customerNumber = p_customerNumber;
    
    -- ispis detalja
    select
	c.customerName,
    o.orderNumber,
    od.productCode,
    od.quantityOrdered,
    od.priceEach
    from classicmodels.customers c inner join classicmodels.orders o
    on c.customerNumber = o.customerNumber
    inner join classicmodels.orderdetails od
    on o.orderNumber = od.orderNumber
    where c.customerNumber = p_customerNumber;
end $$
DELIMITER ;

set @ukupno = 0;

call classicmodels.UkupanPrometKupca(103,@ukupno);

select @ukupno as UkupanPromet;

-- napraviti transakciju preko procedure koja će kao ulazne parametre primiti broj kupca i product code, te napraviti commit 
-- za unos nove narudžbe sa stavkom poslanog product cod-a ukoliko su broj kupca i product code ispravni
-- ukoliko je bilo koji od ova dva podatka neispravan, napraviti rollback

DELIMITER $$
CREATE PROCEDURE DodajNarudzbuZaKupca(
IN p_customerNumber int, 
IN p_productCode varchar(20),
IN p_quantityOrdered int,
in p_priceEach decimal(10,2),
in p_orderLineNumber SMALLINT
)
BEGIN
	DECLARE v_orderNumber INT;
    
    -- ako dođe do greške kod unosa - rollback
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		ROLLBACK;
        SELECT 'Greška! Neispravan productCode ili drugi problem. Sve poništeno!' as Poruka;
    END;
    
    START TRANSACTION;
    
    SELECT MAX(orderNumber) + 1 into v_orderNumber from classicmodels.orders;
    
    -- unos narudžbe
    INSERT INTO classicmodels.orders
    (
		orderNumber,
        orderDate,
        requiredDate,
        status,
        customerNumber
    )
    VALUES
    (
		v_orderNumber,
        curdate(),
        date_add(curdate(), interval 5 day),
        'In Progress',
        p_customerNumber
    );
    
    -- unos detalja narudžbe
    INSERT INTO classicmodels.orderdetails
    (
		orderNumber,
        productCode,
        quantityOrdered,
        priceEach,
        orderLineNumber
    )
    VALUES
    (
		v_orderNumber,
        p_productCode,
        p_quantityOrdered,
        p_priceEach,
        p_orderLineNumber
    );
    
    -- ako sve prođe
    COMMIT;
    
    SELECT CONCAT('Uspješno dodana narudžba: ',v_orderNumber) as Poruka;
END $$
DELIMITER ;

call classicmodels.DodajNarudzbuZaKupca(168,'S18_2795',3,1570.55,3);
call classicmodels.DodajNarudzbuZaKupca(555,'S18_2795',3,1570.55,3);

/*
napraviti još jednu transakciju preko store procedure koja će kao ulazni parametar primati broj kupca te raditi sljedeće:
- prvo će dodati novi ured, nakon toga će dodati novog djelatnika i dodijeliti mu novi ured, te nakon dodavanja novog djelatnika,
potrebno je tog novog djelatnika dodijeliti kupcu kojeg smo poslali kao ulazni parametar.
ukoliko se unese kriva šifra kupca, dozvoliti djelomično izvršenje transakcije (ured i djelatnik), a kod krivog broja kupca napraviti rollback
*/

DELIMITER $$
CREATE PROCEDURE DodajUredZaposlenikKupac(IN p_customerNumber int)
BEGIN
	DECLARE v_officeCode varchar(10);
    DECLARE v_employeeNumber int;
    declare v_broj int;
    
    -- sql handler za greške
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		ROLLBACK;
        SELECT 'Greška! Sve poništeno!' as Poruka;
    END;
    
    START TRANSACTION;
    
    set v_officeCode = concat('X',FLOOR(RAND()*1000)); -- X234, X33, X456 itd..
    
    -- novi ured
    INSERT INTO classicmodels.offices 
    (officeCode,city,phone,addressLine1,country,postalCode,territory) values
    (v_officeCode,'Zagreb','01-234567','Zagrebačka 1','Croatia','10000','EMEA');
    
    -- novi zaposlenik
    select max(employeeNumber)+1 into v_employeeNumber from classicmodels.employees;
    
    insert into classicmodels.employees
    (employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,salary,jobTitle)
    values
    (v_employeeNumber,'Hagen','John','x1234','john.hagen@mail.com',v_officeCode,1002,9000,'Sales Rep');
    
    SAVEPOINT prije_kupca;
    
    -- provjera postojanja kupca
    select count(*) into v_broj from classicmodels.customers where customerNumber = p_customerNumber;
    
    if v_broj = 0 then
		ROLLBACK to prije_kupca;
        select 'Kupac ne postoji! Dodani su ured',v_officeCode,' i zaposlenik ',v_employeeNumber as Poruka;
    else
		update classicmodels.customers
        set salesRepEmployeeNumber = v_employeeNumber
        where customerNumber = p_customerNumber;
        
		select 'Sve uspješno izvršeno (ured, zaposlenik, kupac)' as Poruka;
	
    end if;
    
    commit;
    
END $$
DELIMITER ;

call classicmodels.DodajUredZaposlenikKupac(555);