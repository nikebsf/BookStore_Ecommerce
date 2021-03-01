USE P1_BookStore;

INSERT INTO bookinventory 
( BookName, AuthorName, ISBN, DeliveryFormat, Quantity ) 
VALUES 
( "PHP 6.0", "PHP Author", "001-001-0001", "PDF", 10 ),
( "PHP 7.0", "PHP Author2", "002-002-0002", "PAPER", 20 ),
( "JAVA", "JAVA Author", "003-003-0003", "PDF", 30 ),
( "JS", "JS Author", "004-004-0004", "PAPER", 40 ),
( "REACt", "REACT Author", "005-005-0005", "PDF", 50 );

SELECT * FROM bookinventory;
SELECT * FROM bookinventory WHERE BookId = 1;