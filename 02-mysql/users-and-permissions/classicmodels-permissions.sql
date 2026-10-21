use classicmodels;

select * from classicmodels.employees;

INSERT INTO `classicmodels`.`employees`
(`employeeNumber`,
`lastName`,
`firstName`,
`extension`,
`email`,
`officeCode`,
`reportsTo`,
`jobTitle`,
`salary`,
`updatedAt`)
VALUES
(1902,
'Modric',
'Luka',
'x2222',
'stone@mail.com',
'3',
1056,
'Sales Rep',
5555,
now());

delete from classicmodels.employees where employeeNumber = 1900;
