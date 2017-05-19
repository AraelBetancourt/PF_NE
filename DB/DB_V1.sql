create table grupos(
	id int not null primary key auto_increment,
    nombre varchar(100) not null
);
insert into grupos values (0,"Danza"),(0,"Pintura"),(0,"Plasticos");

create table Alumnas(
	id int not null primary key auto_increment,
	nombre varchar(50) not null,
    apellido varchar(50) not null,
    nombreMama varchar(100) not null,
    edad int not null,
    fechaNacimiento date not null,
    idgrupo int not null,
    foreign key (idgrupo) references grupos(id)
);
insert into Alumnas values (0,"Julia Guadalupe","Betancourt Flores","Prueba 1",YEAR(CURDATE())-YEAR("2004-11-28"),"2004-11-28",1);
insert into Alumnas values (0,"Maya Patricia","Contreras Flores","Prueba 1",YEAR(CURDATE())-YEAR("2008-12-22"),"2008-12-22",2);
insert into Alumnas values (0,"Maria","Becerra","Prueba 1",YEAR(CURDATE())-YEAR("1995-04-23"),"1995-04-23",3);
insert into Alumnas values (0,"Fabiola","Balderas","Prueba 1",YEAR(CURDATE())-YEAR("1995-03-14"),"1995-03-14",3);
insert into Alumnas values (0,"Lesli","Gallardo","Prueba 1",YEAR(CURDATE())-YEAR("1996-08-05"),"1996-08-05",3);
create table pagos(
	idpago int not null primary key auto_increment,
    idalumna int not null,
    idgrupo int not null,
    nomMama varchar(100) not null,
    fechapago date not null,
    fechaenvio datetime not null,
    url varchar(255) not null,
    foreign key (idalumna) references Alumnas(id),
    foreign key (idgrupo) references grupos(id)
);
create table users(
	username varchar(30) not null primary key,
    pass varchar(32) not null
);