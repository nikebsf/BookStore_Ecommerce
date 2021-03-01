USE p1_bookstore;
drop table bookinventoryorder;
CREATE TABLE BookInventoryOrder (
	BookId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    BookName VARCHAR(50) NOT NULL,
    AuthorName VARCHAR(50),
    ISBN VARCHAR(30),
    DeliveryFormat VARCHAR(30)
);

select * from bookinventoryorder;

