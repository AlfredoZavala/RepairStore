

/* Address Table  */
CREATE TABLE Address (
    ADDR_ID             serial PRIMARY KEY,
    city                VARCHAR( 255 )  NOT NULL,
    state               VARCHAR( 255 )  NOT NULL,
    zip                 NUMERIC(5)      NOT NULL,
    street_num          VARCHAR( 255 )  NOT NULL,
    street_name         VARCHAR( 255 )  NOT NULL

);
/* WORKS */

/* Customer Table */
CREATE TABLE Customer (
    customer_ID         serial  PRIMARY KEY,
    customer_name       VARCHAR( 255 )  NOT NULL,
    phone_num           VARCHAR( 20 )  NOT NULL

);
/* WORKS */

/* Device Table */
CREATE TABLE Device (
    device_ID           serial  PRIMARY KEY,
    device_type         VARCHAR( 15 ),

    FK_customer_ID      INTEGER REFERENCES Customer( customer_ID )
);
/* WORKS */


/* Employee Table */
CREATE TABLE Employee (
    employee_ID         serial  PRIMARY KEY,
    employee_name       VARCHAR( 255 ) NOT NULL,
    employee_phoneNum   VARCHAR( 20 ) NOT NULL,
    e_mail              VARCHAR( 255 ) NOT NULL,
    username            VARCHAR( 255 ) NOT NULL,
    emp_password        VARCHAR( 255 ) NOT NULL,
    SSN                 NUMERIC( 20 ) NOT NULL

);
/* WORKS */


/* Manufacturer Table */
CREATE TABLE Manufacturer  (
    mnfr_ID             serial  PRIMARY KEY,
    mnfr_name           VARCHAR( 255 ) NOT NULL,
    mnfr_phoneNum       VARCHAR(20) NOT NULL,

    FK_ADDR_ID          INTEGER REFERENCES Address( ADDR_ID )
);
/* WORKS */


/* Model Table */
CREATE TABLE  Model (
    model_ID            serial  PRIMARY KEY,
    model_name          VARCHAR( 255 ),
    part_type           VARCHAR( 255 ),

    FK_mnfr_ID          INTEGER REFERENCES Manufacturer( mnfr_ID )
);
/* WORKS */


/* Order Table */
CREATE TABLE Orders (
    order_ID            serial  PRIMARY KEY,
    order_date          DATE    NOT NULL,
    order_status        VARCHAR( 15 ) NOT NULL,

    FK_emp_ID           INTEGER REFERENCES Employee( employee_ID )
);
/* WORKS */


/* Supplier Table */
CREATE TABLE  Supplier (
    supplier_ID         serial  PRIMARY KEY,
    supplier_name       VARCHAR( 255 ) NOT NULL,

    FK_ADDR_ID          INTEGER REFERENCES Address( ADDR_ID )
);
/* WORKS */


/* Replacement Parts Table */
CREATE TABLE  Replacement_Parts (
    parts_ID            serial  PRIMARY KEY,
    part_sellCost       DECIMAL(6,2) NOT NULL,
    part_quantity       INTEGER,

    FK_order_ID         INTEGER REFERENCES Orders( order_ID ),
    FK_supplier_ID      INTEGER REFERENCES Supplier( supplier_ID ),
    FK_model_ID         INTEGER REFERENCES Model( model_ID )
);
/* WORKS */

/* Repair Request Table */
CREATE TABLE  Ticket (
    ticket_ID           serial  PRIMARY KEY,
    ticket_date         DATE    NOT NULL,
    ticket_dmgDesc      TEXT,
    ticket_repairLog    TEXT,
    ticket_typeOfRepair VARCHAR( 255 ),
    ticket_start        TIME,
    ticket_end          TIME,

    FK_employee_ID      INTEGER REFERENCES Employee( employee_ID ),
    FK_part_ID          INTEGER REFERENCES Replacement_Parts( parts_ID ),
    FK_device_ID        INTEGER REFERENCES Device( device_ID )
);
/* WORKS */

/* Payment Table */
CREATE TABLE  Payment (
    payment_ID          serial  PRIMARY KEY,
    payment_type        INTEGER NOT NULL,
    payment_amount      DECIMAL(6,2) NOT NULL,

    FK_customer_ID      INTEGER REFERENCES Customer( customer_ID ),
    FK_ticket_ID        INTEGER REFERENCES Ticket( ticket_ID )
);
/* WORKS */


/* /////////////////////////////////////////////////////////////////// */


/* /////////////////////////////////////////////////////////////////// */
/* ___ RELATIONSHIP TABLES
/* /////////////////////////////////////////////////////////////////// */

/* Contains Table */
CREATE TABLE Order_Contains (
    boughtCost          DECIMAL(6,2) NOT NULL,
    order_quantity      INTEGER  NOT NULL,

    FK_order_ID         INTEGER REFERENCES Orders( order_ID ),
    FK_part_ID          INTEGER REFERENCES Replacement_Parts( parts_ID ),
    PRIMARY KEY( FK_order_ID, FK_part_ID)
);
/* WORKS */


/* Supplies Table */
CREATE TABLE Supplies (
    msrp                DECIMAL(6,2),

    FK_part_ID          INTEGER REFERENCES Replacement_Parts( parts_ID ),
    FK_supplier_ID      INTEGER REFERENCES Supplier( supplier_ID ),
    PRIMARY KEY( FK_part_ID, FK_supplier_ID )
);
/* WORKS */


/* Uses Table */
CREATE TABLE Parts_Used (
    parts_used_quantity INTEGER,

    FK_ticket_ID        INTEGER REFERENCES Ticket( ticket_ID ),
    FK_part_ID          INTEGER REFERENCES Replacement_Parts(parts_ID),
    PRIMARY KEY( FK_ticket_ID, FK_part_ID )
);
/* WORKS */

/* Works_On Table */
CREATE TABLE Works_On (
    time_spent          TIME,

    FK_employee_ID      INTEGER REFERENCES Employee( employee_ID ),
    FK_ticket_ID        INTEGER REFERENCES Ticket( ticket_ID ),
    PRIMARY KEY( FK_employee_ID, FK_ticket_ID )
);
/* WORKS */


/* /////////////////////////////////////////////////////////////////// */
