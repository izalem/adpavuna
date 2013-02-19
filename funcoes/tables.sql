create table igrejas(
	idIgreja int(2) unsigned not null primary key auto_increment,
	endereco varchar(100) not null,
	bairro varchar(80)   not null,
	cidade varchar(100) not null,
	uf char(3) not null,
	tipo int(1) unsigned not null
	)engine = innodb;
create table dirigentes(
	idDirigente int(10) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	iMembro int(10) unsigned not null
	)engine = innodb;
create table historia(
	idHistoria  int(1) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	post text not null
	)engine = innodb;
create table bioPastor(
	idBio int(2) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	biografia text not null,
	imgPastor varchar(100) null
	)engine = innodb;
create table cultos(
	idCulto int(3) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	dia int(1) unsigned not null,
	horario time not null,
	culto varchar(60) not null
	)engine = innodb;
create table eventos(
	idEvento int(10) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	dataEvento date not null,
	horasEvento time not null,
	localEvento varchar(100) not null
	)engine = innodb;
create table ppastoral(
	idPost int(10) unsigned not null primary key auto_increment,
	iIgreja int(2) unsigned not null,
	post text not null,
	dataPost date not null
	)engine = innodb;
CREATE TABLE secIgrejas(
	idSec INT(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	iIgreja INT(2) UNSIGNED NOT NULL,
	nomeSec VARCHAR(30) NOT NULL,
	senhaSec VARCHAR(40) NOT NULL
	)ENGINE = INNODB;		
CREATE TABLE tesIgrejas(
	idTes INT(2) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
	iIgreja INT(2) UNSIGNED NOT NULL,
	nomeTes VARCHAR(30) NOT NULL,
	senhaTes VARCHAR(40) NOT NULL
	)ENGINE = INNODB;	
	 
	