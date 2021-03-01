CREATE DATABASE P1_BookStore;
USE P1_BookStore;

CREATE TABLE bookinventory (
	bookid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bookname VARCHAR(50) NOT NULL,
    authorname VARCHAR(50),
    isbn VARCHAR(30),
    deliveryformat VARCHAR(30),
    quantity INT(4)
);

drop table bookinventory;