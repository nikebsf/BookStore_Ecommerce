USE p1_bookstore;
drop table bookinventoryorder;
CREATE TABLE bookinventoryorder (
	bookid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    bookname VARCHAR(50) NOT NULL,
    authorname VARCHAR(50),
    isbn VARCHAR(30),
    deliveryformat VARCHAR(30)
);
select * from bookinventoryorder;

-- INSERT INTO bookinventoryorder (bookname, authorname, isbn, deliveryformat) 
--         VALUES ("abc", "abcc", '1231','pdf');

