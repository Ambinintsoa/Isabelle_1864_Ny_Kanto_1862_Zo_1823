create database exam;

use exam;


CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(60) NOT NULL,
    lastname VARCHAR(60) NOT NULL,
    email VARCHAR(60) NOT NULL,
    password VARCHAR(30) NOT NULL,
    isAdmin TINYINT DEFAULT 0
);


CREATE TABLE IF NOT EXISTS object (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    descri TEXT,
    price FLOAT NOT NULL,
    iduser INTEGER NOT NULL,
    FOREIGN KEY (iduser) REFERENCES users(id)
);


CREATE TABLE IF NOT EXISTS category (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
);


CREATE TABLE IF NOT EXISTS object_category (
    idobject INTEGER NOT NULL,
    idcategory INTEGER NOT NULL,
    FOREIGN KEY (idobject) REFERENCES object(id),
    FOREIGN KEY (idcategory) REFERENCES category(id)
);


CREATE TABLE IF NOT EXISTS image (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    idobject INTEGER NOT NULL,
    src VARCHAR(30) NOT NULL,
    FOREIGN KEY (idobject) REFERENCES object(id)
);

CREATE TABLE IF NOT EXISTS history (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    idobject INTEGER NOT NULL,
    name VARCHAR(50) NOT NULL,
    descri TEXT,
    price FLOAT NOT NULL,
    iduser INTEGER NOT NULL,
    hiredate datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idobject) REFERENCES object(id),
    FOREIGN KEY (iduser) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS proposition (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    hiredate datetime DEFAULT current_timestamp,
    idobject1 INTEGER NOT NULL,
    idobject2 INTEGER NOT NULL,
    isAccept TINYINT DEFAULT 1,
    FOREIGN KEY (idobject1) REFERENCES object(id),
    FOREIGN KEY (idobject2) REFERENCES object(id)
);
INSERT INTO proposition(hiredate,idobject1,idobject2,isAccept) values('2023-03-01',1,3,0);

INSERT INTO users (firstname, lastname, email, password, isAdmin)
values ('Rakoto', 'Zo', 'Zo@gmail.mg', '1234', 1),
    ('Randria', 'Ny Kanto', 'Kanto@gmail.mg', '1234', 0),
    ('Rabe', 'Isabelle', 'amby@gmail.mg', '1234', 0);


INSERT INTO object(name, descri, price, iduser)
values('table', 'une belle table de famille', 150000, 2),
    ('chaise', 'chaise confortable de bureau', 100000, 2),
    ('tenis', 'tenis de marque en bon etat', 15000, 3),
    ('telephone', 'telephone fonctionnel', 3000000, 3),
    ('veste', 'veste de grand couturier', 80000, 3);


INSERT INTO category (name)
values('meuble'),
('fourniture de bureau'),
('appareil electronique'),
('clothe'),
('bijoux');


INSERT INTO object_category(idobject, idcategory)
values (1, 1),
    (2, 1),
    (2, 2),
    (3, 4),
    (4, 3),
    (5, 4);


INSERT INTO image(idobject, src)
values (2, 'chaise.jpg'),
    (4, 'phone.jpg'),
    (1, 'table.jpg'),
    (5, 'veste.jpg'),
    (3, 'chaussure.jpg');

CREATE OR REPLACE VIEW v_category (
    idcategory,
    nomcategory,
    idobject,
    name,
    iduser,
    firstname,
    lastname,
    price,
    descri
) AS (
    SELECT category.id,
    category.name,
    object.id,
    object.name,
    users.id,
    users.firstname,
     users.lastname,
    object.price,
    object.descri
FROM object_category
    JOIN object on object_category.idobject = object.id
    JOIN category on object_category.idcategory = category.id
    JOIN users on object.iduser = users.id
);


CREATE OR REPLACE VIEW echange (
    idobject1,
    nomobject1,
    idobject2,
    nomobject2,
    isaccept,
    hiredate,
    id1,
    firstname1,
    lastname1,
    id2,
    firstname2,
    lastname2
) AS (
    SELECT o1.id, o1.name, o2.id, o2.name, proposition.isAccept, proposition.hiredate,u1.id,u1.firstname,u1.lastname,u2.id,u2.firstname,u2.lastname  FROM proposition
        JOIN object o1 ON proposition.idobject1 = o1.id
        JOIN object o2 ON proposition.idobject2 = o2.id
        JOIN users u1 ON o1.iduser = u1.id
        JOIN users u2 ON o2.iduser = u2.id
);
create or replace view detailobj (
	idobject,
    name,
    descri,
    price,
    iduser,
    src
) as (
    select object.id,
    object.name,
    object.descri,
    object.price,
    object.iduser,
    image.src
    from object
    join image on object.id=image.idobject
    );