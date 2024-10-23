CREATE TABLE designers_info (
    designerID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR (255),
    lastName VARCHAR (255),
    d_address VARCHAR (255),
    age INT,
    specialization VARCHAR (255),
    e_address VARCHAR (255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE designs (
    designID INT AUTO_INCREMENT PRIMARY KEY,
    designName VARCHAR (255),
    fabricType VARCHAR (255),
    price DECIMAl (10,2),
    designerID INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)