USE P1_BookStore;

INSERT INTO bookinventory 
( BookName, AuthorName, ISBN, DeliveryFormat, Quantity, Img ) 
VALUES 
( "PHP 6.0", "PHP Author", "001-001-0001", "PDF", 10, load_file('c:/php6.png')),
( "PHP 7.0", "PHP Author2", "002-002-0002", "PAPER", 20, load_file('c:/php7.png') ),
( "JAVA", "JAVA Author", "003-003-0003", "PDF", 30, load_file('c:/java.png') ),
( "JS", "JS Author", "004-004-0004", "PAPER", 40, load_file('c:/js.png') ),
( "REACt", "REACT Author", "005-005-0005", "PDF", 50,load_file('c:/react.png'));

SELECT * FROM bookinventory;
update bookinventory set Img = null where BookId = 5;
SELECT * FROM bookinventory WHERE BookId = 1;
SELECT * FROM bookinventory WHERE BookId = 2;
insert into bookinventory (Img) values('{$Img}');