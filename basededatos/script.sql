

create database	u291888960_smadm;

use u291888960_smadm;




create table palabrasclaves(
id int auto_increment,
palabra varchar(50),
constraint pk primary key(id)
);


create table tipousuarios(
id int auto_increment,
tipo varchar(50),
constraint pk primary key(id)
);


create table usuarios(
id int auto_increment,
usuario varchar(50),
password varchar(50),
idTipoUsuario int not null,
primary key(id),
foreign key(idTipoUsuario) REFERENCES TipoUsuarios(id)
);


insert into tipousuarios(tipo)values("administrador");
insert into tipousuarios(tipo)values("vendedor");
insert into tipousuarios(tipo)values("oficina");

select * from TipoUsuarios;

truncate TipoUsuarios;

drop table TipoUsuarios;
drop table Usuarios;

select * from usuarios;


insert into usuarios(usuario,password,idTipoUsuario)values("admin","admin",1);


CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'usuario1351';


GRANT select on *.* TO 'usuario'@'localhost';
