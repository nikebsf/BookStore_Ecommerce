CREATE DATABASE P1_BookStore;
USE P1_BookStore;

CREATE TABLE BookInventory (
	BookId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BookName VARCHAR(50) NOT NULL,
    AuthorName VARCHAR(50),
    ISBN VARCHAR(30),
    DeliveryFormat VARCHAR(30),
    Quantity INT(4)
)