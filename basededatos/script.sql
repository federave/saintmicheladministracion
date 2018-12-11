

create database	u291888960_smadm;

use u291888960_smadm;






create table TipoUsuarios(
id int auto_increment,
tipo varchar(50),
constraint pk primary key(id)
);


create table Usuarios(
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

select * from usuarios;


insert into usuarios(usuario,password,idTipoUsuario)values("admin","admin",1);


