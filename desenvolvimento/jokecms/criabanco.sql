
/*CRIE O BANCO DE DADOS ijdb e depois execute esta sql


Criar um usuário para ter acesso a um determinado banco de dados.

sudo mysql -u root -p
GRANT ALL PRIVILEGES ON ijdb.* TO 'ijdbuser'@'localhost' IDENTIFIED BY 'mypassword';
para mostrar se criou 
SHOW GRANTS FOR 'ijdbuser'@'localhost';
para logar com o usuário no banco específico
mysql -u ijdbuser -p ijdb
senha:mypassword
*/

CREATE TABLE joke (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
joketext TEXT,
jokedate DATE NOT NULL,
authorid INT
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;


CREATE TABLE author (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
email VARCHAR(255) UNIQUE,
password CHAR(32)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;


CREATE TABLE role (
id VARCHAR(255) NOT NULL PRIMARY KEY,
description VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE authorrole (
authorid INT NOT NULL,
roleid VARCHAR(255) NOT NULL,
PRIMARY KEY (authorid, roleid)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;

CREATE TABLE category (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;
CREATE TABLE jokecategory (
jokeid INT NOT NULL,
categoryid INT NOT NULL,
PRIMARY KEY (jokeid, categoryid)
) DEFAULT CHARACTER SET utf8 ENGINE=InnoDB;



# Sample data
# We specify the IDs so they are known when we add related entries
INSERT INTO author (id, name, email, password) VALUES
(1, 'Jeandrei Walter', 'jeandreiwalter@gmail.com','11088d77dfa6640753da082d23365368'),
(2, 'Joan Smith', 'joan@example.com', MD5('passwordijdb'));

INSERT INTO role (id, description) VALUES
('Content Editor', 'Add, remove, and edit jokes'),
('Account Administrator', 'Add, remove, and edit authors'),
('Site Administrator', 'Add, remove, and edit categories');

INSERT INTO authorrole (authorid, roleid) VALUES (1, 'Account Administrator');

INSERT INTO joke (id, joketext, jokedate, authorid) VALUES
(1, 'Why did the chicken cross the road? To get to the other side!','2012-04-01', 1),
(2, 'Knock-knock! Who\'s there? Boo! "Boo" who? Don\'t cry; it\'s only a joke!', '2012-04-01', 1),
(3, 'A man walks into a bar. "Ouch."', '2012-04-01', 2),(4, 'How many lawyers does it take to screw in a lightbulb? I can\'t say: I might be sued!', '2012-04-01', 2);

INSERT INTO category (id, name) VALUES
(1, 'Knock-knock'),
(2, 'Cross the road'),
(3, 'Lawyers'),
(4, 'Walk the bar');

INSERT INTO jokecategory (jokeid, categoryid) VALUES
(1, 2),
(2, 1),
(3, 4),
(4, 3);