-- simply copy paste this SQL after creating a database with the name 'cookiemis' (just copy everything and paste)
-- 
-- Version 5(Disjoint table)
CREATE TABLE level (
  id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  access VARCHAR(10) NOT NULL
);
INSERT INTO level (`access`) VALUES ('staff'), ('customer');

CREATE TABLE users(
    user_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username TEXT(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(200) NOT NULL,
    gender VARCHAR(100) NOT NULL,
    address VARCHAR(200) NOT NULL,
    email varchar(50) NOT NULL,
    phone_Num VARCHAR(200) NOT NULL,
    picture VARCHAR(200) NOT NULL,
    level_ID INT(2) NOT NULL,
    FOREIGN KEY(level_ID) REFERENCES level(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
INSERT INTO users (username, name, password, gender, address, email, phone_Num, picture, level_ID) 
VALUES('a','MUHAMMAD ZHARFAN JUNAIDY BIN JESFFRI', 'd9b1d7db4cd6e70935368a1efb10e377', 1, '84, JALAN BAKTI 25/15', 'DUDEPOMDEV@GMAIL.COM', 103094691, 'uitm.png', 1),
('rexy','RAZYN HAZMAN', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 'No.& Jalan BP11/5', 'rexyranger@gmail.com', 01121208397, 'uitm.png', 2),
('adam','Adam', 'd9b1d7db4cd6e70935368a1efb10e377', 1, 'Mars', 'adam@gmail.com', 0123456789, 'uitm.png', 1);;

CREATE TABLE Product (
  product_ID INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_Name VARCHAR(20) NOT NULL,
  product_Description VARCHAR(100) NOT NULL,
  product_Highlight VARCHAR(100) NOT NULL,
  product_Status VARCHAR(20) NOT NULL,
  product_Stock INT(3) NOT NULL,
  product_Price DECIMAL(10,2) NOT NULL,
  picture VARCHAR(100) NOT NULL
);
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Cookie of', 'Only cookie created with passion','Creativity' , 'Available', '1', '5.00', 'jumbo.png');
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Cookie of', 'Only cookie created with passion', 'Chocolate' , 'Available', '1', '8.00', 'chewy.png');
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Chocolate Chip', 'Sweetness that is unbeatable', 'Cookie' , 'Available', '1', '7.00', 'choccookie.png');
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Peanut', 'Peanut Cookie!', 'Cookie' , 'Available', '1', '3.00', 'peanut.png');
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Vanilla', 'Pure Vanilla from Cameron Highland!', 'Cookie' , 'Not Available', '0', '12.00', 'chip.jpg');
INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`)
 VALUES (NULL, 'Out Of Stock', 'A Cookie that is out of stock!', 'Cookie' , 'Not Available', '0', '1.00', 'peanut.png');


CREATE TABLE Orders(
    order_ID INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    order_Date VARCHAR(100),
    order_Details VARCHAR(200),
    order_Status BOOLEAN,
    total_Price int(20),
    user_ID INT(100),
    FOREIGN KEY(user_ID) REFERENCES users(user_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
INSERT INTO `orders`(`order_ID`, `order_Date`, `order_Details`, `order_Status`, `total_Price`, `user_ID`)
 VALUES (NULL, '1-1-2024', 'big cookies plsssss', 1, 1 , 1),
 (NULL, '2-1-2024', 'extra chocolate (leave it at the porch)', 1, 1 , 1),
 (NULL, '5-1-2024', 'No almond', 1 , 1, 1);

CREATE TABLE OrderDetails(
    detail_ID INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    order_ID INT(20),
    product_ID INT(20),
    quantity INT(20),
    FOREIGN KEY(order_ID) REFERENCES Orders(order_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY(product_ID) REFERENCES Product(product_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
CREATE TABLE Delivery(
    delivery_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    delivery_Status TEXT(100),
    delivery_Type VARCHAR(100),
    delivery_Estimated_Time varchar(200),
    pickup_Date VARCHAR(100),
    order_ID INT(100),
    FOREIGN KEY(order_ID) REFERENCES Orders(order_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
