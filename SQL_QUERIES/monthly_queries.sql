
-- MONTHLY QUERIES

-- January

INSERT INTO Address (city, state, zip, street_num, street_name) VALUES
('Bakersfield','California','93309','2916','Kennedy Way'),
('Arvin', 'California', '93203', '1036', 'Wernli Court'),
('Bakersfield', 'California', '93311', '9001', 'Stockdale Highway' ),
('Bakersfield', 'California', '93309', '5498', 'California Avenue'),
('Bakersfield', 'California', '93304', '2701', 'Ming Avenue'),
('Cupertino','California','95014','1','Apple Computer Inc Infinite Loop'),
('Huntington','New York','11746','1','Water Road'),
('Austin','Texas','78745','7861','Arnold Avenue');

INSERT INTO Customer (customer_name, phone_num) VALUES
('Lily Lynn', '1-661-543-6789'),
('Alex Satano', '1-661-890-4567'),
('Tori Leister', '1-984-556-3454'),
('Adam Mitchell', '1-999-3456-1245'),
('Kyo Rai', '1-455-433-5613'),
('Freya White', '1-987-345-1351'),
('Morgan James', '1-351-453-1351'),
('Ki Nyguyen', '1-234-224-1123'),
('Craig Wells', '1-234-654-1249'),
('Eve Spice', '1-465-125-1252'),
('Ana Alpin','1-45-786-3251'),
('Ella Amin','1-231-436-4623'),
('George Washington','1-351-4363'),
('Julia Anderson','1-949-1361'),
('Ida Anderson','1-263-1236'),
('Andre Welsh','1-563-1362'),
('Sonny Kennedy','1-964-142-5642'),
('Edna Aston','1-563-123-5642'),
('Sidney Kirby','1-326-1362'),
('Shaun Key','1-562-1362');

INSERT INTO Device (device_type, fk_customer_id) VALUES
('laptop', '1'),
('desktop', '2'),
('laptop', '3'),
('laptop', '4'),
('desktop', '5'),
('laptop', '6'),
('desktop', '7'),
('mobile', '8'),
('mobile', '9'),
('mobile', '10'),
('mobile', '11'),
('laptop', '12'),
('desktop', '13'),
('mobile', '14'),
('desktop', '15'),
('mobile', '16'),
('desktop', '17'),
('desktop', '18'),
('laptop', '19'),
('mobile', '20');

INSERT INTO Manufacturer (mnfr_name, mnfr_phonenum, fk_addr_id) VALUES
('SeaGate', '1-855-134-6541', '4'),
('Tech Warehouse', '1-855-325-3511', '5'),
('Apple','1-800-275-2273','6'),
('Dell','1-800-99-3355','7'),
('Lenovo','1-855-253-6686','8');

INSERT INTO Model (model_name, part_type, fk_mnfr_id) VALUES
('SeaGate 1TB SSD', 'storage', '1'),
('Generic 2x8GB RAM Kit', 'ram', '2'),
('Macbook 13" Screen Repair Kit','screen','3'),
('Dell Workstation Motherboard','motherboard','4'),
('Lenovo Chiclet Keyboard','keyboard','5'),

('iPhone 6s Display', 'screen', '3'),
('Generic 3000 MaH Battery', 'battery', '2'),
('iPhone battery', 'battery', '3'),
('Lenovo 95WaH Extended Battery', 'battery', '5'),
('Dell RGB 2x16GB RAM Kit', 'ram', '4');

INSERT INTO Supplier (supplier_name, fk_addr_id) VALUES
('SeaGate', '4'),
('Tech Warehouse', '5'),
('Apple Warehouse','6'),
('Dell Warehouse ','7'),
('Lenovo Warehouse','8');

INSERT INTO Employee (employee_name, employee_phonenum, e_mail, username, emp_password, ssn) VALUES
('Drake','1-661-234-5678','drake@gmail.com', 'drake01', '', '373554234');

INSERT INTO Orders (order_date, order_status, fk_emp_id) VALUES
('2020-01-01','Recieved','1'),
('2020-02-02','Recieved','1'),
('2020-03-03','Received','1'),
('2020-04-04','Received','1'),
('2020-05-05','Received','1');

INSERT INTO Replacement_Parts (part_sellcost, part_quantity, fk_order_id, fk_supplier_id, fk_model_id) VALUES
('99.99','10','1','1','1'),
('69.99','5','1','2','2'),
('80.99','3','3','3','3'),
('120.99','4','3','4','4'),
('25.99','5','4','5','5'),

('79.99','10','4','3','6'),
('29.99','15','5','2','7'),
('29.99','10','3','3','8'),
('99.99','4','3','5','9'),
('129.99','5','5','4','10');

INSERT INTO Ticket (ticket_date, ticket_dmgdesc, ticket_repairlog, ticket_typeofrepair, ticket_start, ticket_end, fk_employee_id, fk_part_id, fk_device_id) VALUES
('2019-12-30','Not enough storage','Storage was upgraded. 120GB Hardrive to 1TB SSD','Laptop - Storage Upgrade','08:00:00','08:45:00','1','1','1'),
('2019-12-31','Not enough storage','Storage was upgraded, left original drive, just added 1TB to total storage.','Desktop - Storage Upgrade','09:00:00','09:45:00','1','1','2'),
('2020-01-01','Things are slow to reload','Diagnosed it was not enough RAM for daily activities, nothing else wrong with dekstop.','Desktop - RAM upgrade','10:00:00','10:45:00','1','2','3'),
('2020-01-02','Screen is cracked, glitches out','Replaced screen with macbook kit.','Desktop - Screen Replacement','11:00:00','11:45:00','1','3','4'),
('2020-01-03','Computer no longer turns on','Cracked motherboard, replaced it with a new one','Motherboard replacement','08:00:00','08:45:00','1','4','5'),

('2020-01-06','Certain keyboard keys do not work','Diagnosed the ribbon cable was faulty','Laptop - Keyboard Replacement','09:00:00','09:45:00','1','5','6'),
('2020-01-07','Laptop doesnt hold a charge anymore','Replaced battery, battery had too many cycles','Laptop - Battery Replacement','10:00:00','10:45:00','1','9','7'),
('2020-01-08','Phone no longer holds a charge, only works for an hour then dies','Battery had too many cycles on it, swapped it out for new generic one','Mobile - Battery Replacement','11:00:00','11:45:00','1','7','8'),
('2020-01-09','Broken iphone screen, lines across the screen','Screen replacement kit was used.','Mobile - Screen Replacement','08:00:00','08:45:00','1','6','9'),
('2020-01-10','Back of phone is swelled up, phone gets very hot when used','Replaced the bloated and swollen battery, disposed of safely.','Mobile - Battery Replacement','09:00:00','09:45:00','1','8','10'),

('2020-01-13','Not enough storage','Storage was upgraded. 120GB Hardrive to 1TB SSD','Laptop - Storage Upgrade','08:00:00','08:45:00','1','1','11'),
('2020-01-14','Not enough storage','Storage was upgraded, left original drive, just added 1TB to total storage.','Desktop - Storage Upgrade','09:00:00','09:45:00','1','1','12'),
('2020-01-15','Things are slow to reload','Diagnosed it was not enough RAM for daily activities, nothing else wrong with dekstop.','Desktop - RAM upgrade','10:00:00','10:45:00','1','10','13'),
('2020-01-16','Screen is cracked, glitches out','Replaced screen with macbook kit.','Desktop - Screen Replacement','11:00:00','11:45:00','1','3','14'),
('2020-01-17','Computer no longer turns on','Cracked motherboard, replaced it with a new one','Motherboard replacement','08:00:00','08:45:00','1','4','15'),

('2020-01-20','Certain keyboard keys do not work','Diagnosed the ribbon cable was faulty','Laptop - Keyboard Replacement','09:00:00','09:45:00','1','5','16'),
('2020-01-21','Laptop doesnt hold a charge anymore','Replaced battery, battery had too many cycles','Laptop - Battery Replacement','10:00:00','10:45:00','1','9','17'),
('2020-01-22','Phone no longer holds a charge, only works for an hour then dies','Battery had too many cycles on it, swapped it out for new generic one','Mobile - Battery Replacement','11:00:00','11:45:00','1','7','18'),
('2020-01-23','Broken iphone screen, lines across the screen','Screen replacement kit was used.','Mobile - Screen Replacement','08:00:00','08:45:00','1','6','19'),
('2020-01-24','Back of phone is swelled up, phone gets very hot when used','Replaced the bloated and swollen battery, disposed of safely.','Mobile - Battery Replacement','09:00:00','09:45:00','1','8','20');

INSERT INTO Payment ( payment_type, payment_amount, fk_customer_id, fk_ticket_id) VALUES
('0','120.99','1','1'),
('0','120.99','2','2'),
('0','90.99','3','3'),
('0','101.99','4','4'),
('0','141.99','5','5'),

('0','100.99','6','6'),
('0','120.99','7','7'),
('0','50.99','8','8'),
('0','100.99','9','9'),
('0','50.99','10','10'),

('0','120.99','11','11'),
('0','120.99','12','12'),
('0','150.99','13','13'),
('0','101.99','14','14'),
('0','141.99','15','15'),

('0','100.99','16','16'),
('0','120.00','17','17'),
('0','50.99','18','18'),
('0','100.99','19','19'),
('0','50.99','20','20');

INSERT INTO Order_Contains ( boughtcost, order_quantity, fk_order_id, fk_part_id) VALUES
('89.99', '10', '1', '1'),
('59.99', '5', '1', '2'),
('70.99', '3', '3', '3'),
('100.99', '4', '3', '4'),
('20.99', '5', '4', '5'),

('69.99', '10', '4', '6'),
('25.99', '15', '5', '7'),
('25.99', '10', '3', '8'),
('89.99', '4', '3', '9'),
('110.99', '5', '5', '10');

INSERT INTO Supplies ( msrp, fk_part_id, fk_supplier_id ) VALUES
('89.99', '1', '1'),
('59.99', '2', '2'),
('70.99', '3', '3'),
('100.99', '4', '4'),
('20.99', '5', '5'),
('69.99', '6', '3'),
('25.99', '7', '2'),
('25.99', '8', '3'),
('89.99', '9', '5'),
('110.99', '10', '4');

INSERT INTO Parts_Used ( parts_used_quantity, fk_ticket_id, fk_part_id ) VALUES
('1','1','1'),
('1','2','1'),
('1','3','2'),
('1','4','3'),
('1','5','4'),

('1','6','5'),
('1','7','9'),
('1','8','7'),
('1','9','6'),
('1','10','8'),

('1','11','1'),
('1','12','1'),
('1','13','10'),
('1','14','3'),
('1','15','4'),

('1','16','5'),
('1','17','9'),
('1','18','7'),
('1','19','6'),
('1','20','10');

INSERT INTO Works_On ( time_spent, fk_employee_id, fk_ticket_id) VALUES
('00:45:00','1','1'),
('00:45:00','1','2'),
('00:45:00','1','3'),
('00:45:00','1','4'),
('00:45:00','1','5'),

('00:45:00','1','6'),
('00:45:00','1','7'),
('00:45:00','1','8'),
('00:45:00','1','9'),
('00:45:00','1','10'),

('00:45:00','1','11'),
('00:45:00','1','12'),
('00:45:00','1','13'),
('00:45:00','1','14'),
('00:45:00','1','15'),

('00:45:00','1','16'),
('00:45:00','1','17'),
('00:45:00','1','18'),
('00:45:00','1','19'),
('00:45:00','1','20');
