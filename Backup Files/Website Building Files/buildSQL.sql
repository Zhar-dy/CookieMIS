-- simply copy paste this SQL after creating a database with the name 'cookiemis' (just copy everything and paste)
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
VALUES('a','MUHAMMAD ZHARFAN JUNAIDY BIN JESFFRI', 'wda', 1, '84, JALAN BAKTI 25/15', 'DUDEPOMDEV@GMAIL.COM', 103094691, 'uitm.png', 1),
('rexy','RAZYN HAZMAN', '123', 1, 'No.& Jalan BP11/5', 'rexyranger@gmail.com', 01121208397, 'uitm.png', 2);

CREATE TABLE product (
  product_ID int(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  product_Name varchar(20) NOT NULL,
  product_Description varchar(100) NOT NULL,
  product_Status varchar(20) NOT NULL,
  product_Stock int(3) NOT NULL,
  product_Price decimal(10,2) NOT NULL,
  picture varchar(100) NOT NULL
);
CREATE TABLE Cart(
    cart_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    list_1 VARCHAR(200),
    list_2 VARCHAR(200),
    list_3 VARCHAR(200),
    list_4 VARCHAR(200)
);
CREATE TABLE Bakery(
    bakery_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bakery_Name TEXT(100),
    bakery_Location VARCHAR(200),
    bakery_Operation_Hour INT(4),
    bakery_Closing_Hour INT(4)
);
CREATE TABLE Cookie(
    cookie_Type_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cookie_Name TEXT(100),
    cookie_Desc VARCHAR(200),
    cookie_Price INT(100),
    bakery_ID INT(100),
    FOREIGN KEY(bakery_ID) REFERENCES Bakery(bakery_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
CREATE TABLE Ordering(
    order_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    order_Date VARCHAR(100),
    order_Details VARCHAR(200),
    order_Status BOOLEAN,
    user_ID INT(100),
    cart_ID INT(100),
    FOREIGN KEY(user_ID) REFERENCES users(user_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    FOREIGN KEY(cart_ID) REFERENCES Cart(cart_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
CREATE TABLE Delivery(
    delivery_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    delivery_Status TEXT(100),
    delivery_Estimated_Time INT(200),
    order_ID INT(100),
    FOREIGN KEY(order_ID) REFERENCES Ordering(order_ID)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
