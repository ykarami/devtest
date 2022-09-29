drop database if exists gestion_stag;
create database if not exists gestion_stag;

use gestion_stag;

create table filiere(
    idFiliere int(4) auto_increment primary key,
    NomFiliere varchar(50),
    niveau varchar(50)
);

create table stagiaire(
    idStagiaire int(4) auto_increment primary key,
    nom varchar(50),
    prenom varchar(50),
    civilite varchar(1) ,
    idFiliere int(4)
);

create table utilisateur(
    idUtilisateur int(4) auto_increment primary key,
    login varchar(50),
    email varchar(50),
    role varchar(50),
    etat int(1),
    pwd varchar(255)
);

Alter table stagiaire add constraint foreign key(idFiliere)  references filiere(idFiliere);


INSERT INTO filiere(nomFiliere,niveau) VALUES
	('TSDI','TS'),
	('TSRI','TS'),
    ('TSGO','TS'),
	('TSGE','TS'),
	('TCE','T'),
    ('TGI','T'),
    ('TMI','T'),
    ('TDB','T'),
	('TSDI','TS'),
	('TSRI','TS'),
    ('TSGO','TS'),
	('TSGE','TS'),
	('TCE','T'),
    ('TGI','T'),
    ('TMI','T'),
    ('TDB','T'),
	('TSDI','TS'),
	('TSRI','TS'),
    ('TSGO','TS'),
	('TSGE','TS'),
	('TCE','T'),
    ('TGI','T'),
    ('TMI','T'),
    ('TDB','T'),
	('TSDI','TS'),
	('TSRI','TS'),
    ('TSGO','TS'),
	('TSGE','TS'),
	('TCE','T'),
    ('TGI','T'),
    ('TMI','T'),
    ('TDB','T');

INSERT INTO utilisateur(login,email,role,etat,pwd) VALUES 
    ('admin1','admin1@gmail.com','ADMIN',1,md5('123')),
    ('admin2','admin2@gmail.com','ADMIN',1,md5('123')),
    ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
    ('user2','user2@gmail.com','VISITEUR',1,md5('123'));

INSERT INTO stagiaire(nom,prenom,civilite,idFiliere) VALUES

  ("massa.","nec",'M',1),
  ("erat","turpis",'F',1),
  ("Mauris","eu",'M',1),
  ("lacus.","eu",'M',1),
  ("elit","nunc",'F',1),
  ("cursus","ornare,",'M',2),
  ("vel,","risus.",'M',2),
  ("ac","dapibus",'M',2),
  ("ut","eu",'F',2),
  ("justo","odio",'F',2),
  ("cursus","ornare,",'F',3),
  ("vel,","risus.",'F',3),
  ("ac","dapibus",'M',3),
  ("ut","eu",'M',3),
  ("justo","odio",'F',3),
  ("cursus.","aliquet",'F',4),
  ("orci.","orci",'F',4),
  ("in","vel",'F',4),
  ("adipiscing","est",'F',4),
  ("dapibus","Nullam",'M',4),
  ("et","Vestibulum",'M',5),
  ("volutpat.","porttitor",'M',5),
  ("dapibus","libero",'F',5),
  ("in,","lectus",'M',5),
  ("inceptos","iaculis",'F',5),
  ("Suspendisse","vel",'M',6),
  ("adipiscing","rutrum",'M',6),
  ("venenatis","risus.",'M',6),
  ("neque","Quisque",'M',6),
  ("Duis","Nunc",'F',6);

