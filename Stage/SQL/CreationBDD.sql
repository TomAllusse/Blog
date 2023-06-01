/*DROP TABLE if exists User_;
DROP TABLE if exists to_have;
DROP TABLE if exists Categories;
DROP TABLE if exists Post;*/

CREATE TABLE Categories(
   Id_Categories INT NOT NULL AUTO_INCREMENT,
   Name_Categories VARCHAR(50) NOT NULL,
   CONSTRAINT PK_Categories PRIMARY KEY(Id_Categories)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE Post(
   Id_Post INT NOT NULL AUTO_INCREMENT,
   Title VARCHAR(50) NOT NULL,
   Picture VARCHAR(50) NOT NULL,
   Contained TEXT NOT NULL,
   Created_at DATETIME NOT NULL DEFAULT '1900-01-01 00:00:00',
   CONSTRAINT PK_Post PRIMARY KEY(Id_Post)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE User_(
   Id_User INT NOT NULL AUTO_INCREMENT,
   FirstName VARCHAR(50) NOT NULL,
   Name_User VARCHAR(50) NOT NULL,
   Username VARCHAR(50) NOT NULL,
   Date_Of_Birth DATE NOT NULL DEFAULT '0000-00-00',
   E_mail VARCHAR(50) NOT NULL,
   Phone VARCHAR(50) NOT NULL,
   Password VARCHAR(50) NOT NULL,
   Role VARCHAR(50) NOT NULL,
   Id_Post INT,
   CONSTRAINT PK_User_ PRIMARY KEY(Id_User),
   CONSTRAINT FK_User__Post FOREIGN KEY (Id_Post) REFERENCES Post (Id_Post)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE to_have(
   Id_Categories INT,
   Id_Post INT,
   CONSTRAINT PK_to_have PRIMARY KEY(Id_Categories, Id_Post),
   CONSTRAINT FK_to_have_Categories FOREIGN KEY(Id_Categories) REFERENCES Categories(Id_Categories),
   CONSTRAINT FK_to_have_Post FOREIGN KEY(Id_Post) REFERENCES Post(Id_Post)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;