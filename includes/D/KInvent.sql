CREATE TABLE accounts (
	id INT(20) PRIMARY KEY NOT null AUTO_INCREMENT,
	date datetime not null,
	user_uid varchar(256) not null,
	first_name varchar(256) not null,
	last_name varchar(256) not null,
	suffix varchar(256) null,
	user_pwd varchar(256) not null,
	user_cpwd varchar(256),
	user_level varchar(13) not null,
	email_address varchar(50) not null,
	section varchar(256) not null,
	department varchar(256) not null);

CREATE TABLE REQUEST (
	id int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	item varchar(255) not null,
	date datetime not null,
	supplier varchar(255)not null,
	requestor varchar(255) NOT NULL,
	request_id varchar(255) NOT NULL,
	approval boolean not null);

CREATE TABLE outgoing (
	id INT(20) PRIMARY KEY NOT null AUTO_INCREMENT,
	date datetime not null,
	requestor varchar(255) not null,
	request_id varchar(255) not null,
	received_by varchar(255) not null,
	approval boolean not null);

CREATE TABLE inventory (
	id int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	supplier varchar(255) not null,
	item varchar(255) not null,
	description varchar(1250) not null,
	unit varchar(255) not null,
	unit_price int(20) not null,
	initial_inventory int(25) not null,
	initial_inventory_amount int(25) not null,
	safety_stock int(25) not null,
	total_forcast int(25) not null);

INSERT into itemaccess (admin, accounting, qa ,qc, dok, systemkaizen, prodsupport_stafftools, prodsupport_staffoffice, prodsupport_supplies, audittraining, prodmgt, impexcrating, fabrication, whreceiving, saitama, purchasing, prodtech, partsinspection, prod1dcmotor, prod1ud700yud, prod1sdrb260, prod1rbw10, prod1rbw100, prod1brm, prod1technician, prod1office, prod1partsprep, prod2rbw150, prod2glr100, prod2rbg, prod2technician, prod2partsprep, prod2packaging, prod2office, g200, rbw50, rbw100, sdrb100, item, description) VALUES (false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,'KDDI','test');

INSERT into inventory (supplier, item, description, unit, unit_price, initial_inventory, initial_inventory_amount, safety_stock, total_forcast) VALUES ('KDDI', 'CISCO', 'NETWORK SWITCH', 'pc', '50', '1', '200', '2', '3');

CREATE TABLE itemaccess (
	admin boolean not null,
        accounting boolean not null,
        qa boolean not null,
        qc boolean not null,
        dok boolean not nulldesc ,
        systemkaizen boolean not null,
        prodsupport_stafftools boolean not null,
        prodsupport_staffoffice boolean not null,
        prodsupport_supplies boolean not null,
        audittraining boolean not null,
        prodmgt boolean not null,
        impexcrating boolean not null,
        fabrication boolean not null,
        whreceiving boolean not null,
        saitama boolean not null,
        purchasing boolean not null,
        prodtech boolean not null,
        partsinspection boolean not null,
        prod1dcmotor boolean not null,
        prod1ud700yud boolean not null,
        prod1sdrb260 boolean not null,
        prod1rbw10 boolean not null,
        prod1rbw100 boolean not null,
        prod1brm boolean not null,
        prod1technician boolean not null,
        prod1office boolean not null,
        prod1partsprep boolean not null,
        prod2rbw150 boolean not null,
        prod2glr100 boolean not null,
        prod2rbg boolean not null,
        prod2technician boolean not null,
        prod2partsprep boolean not null,
        prod2packaging boolean not null,
        prod2office boolean not null,
        g200 boolean not null,
        rbw50 boolean not null,
        rbw100 boolean not null,
        sdrb100 boolean not null,
	item varchar(255) not null,
        description varchar(1250) not null);

UPDATE inventory (admin, accounting, qa ,qc, dok, systemkaizen, prodsupport_stafftools, prodsupport_staffoffice, prodsupport_supplies,audittraining, promgt, impexcrating, fabrication, whreceiving, saitama, purchasing, prodtech, partsinspection, prod1dcmotor, prod1ud700yud, prod1sdrb260, prod1rbw10, prod1rbw100, prod1brm, prod1technician, prod1office, prod1partsprep, prod2 rbw150, prod2glr100, prod2rbg, prod2technician, prod2partsprep, prod2packaging, prod2office, g200, rbw50,rbw100, sdrb100, item, description) VALUES (false,false,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,true,KDDI,test);

CREATE TABLE forcast (
	forcast int(25) not null,
	forcast_amount int(25) not null,
	outgoing int(25) not null,
	outgoing_amount int(25) not null,
	overall_forcast int(25) not null
	overall_outgoing int(25) not null);

CREATE TABLE incoming (
	id int(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	invoice_number varchar(255) not null,
	delivery_receipt varchar(255) not null,
	item varchar(255) not null,
	received_amount int(25) not null,
	supplier varchar(255) not null,
	date datetime not null,
	received_date varchar(100) not null,
	remarks varchar(1250) not null,
	received_by varchar(255) not null);
