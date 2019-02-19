

create database	u291888960_smadm;

use u291888960_smadm;



create table Debug(
id int auto_increment,
debug varchar(50),
constraint pk primary key(id)
);


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


insert into tipousuarios(tipo)values("administrador")
SELECT 'Pontevedra'
FROM dual
WHERE NOT EXISTS (SELECT * FROM tipousuarios WHERE tipo = "administrador")


INSERT INTO tipousuarios (tipo)
SELECT * FROM (SELECT 'produccion') AS tmp
WHERE NOT EXISTS (
    SELECT tipo FROM tipousuarios WHERE tipo = 'produccion'
) LIMIT 1;



drop table palabrasclaves;
drop table usuarios;
drop table tipousuarios;
drop table productos;

drop table tipoproductos;



INSERT INTO usuarios (usuario,password,idtipousuario)
      SELECT * FROM (SELECT 'federave','mpkfa26',1) as u
      WHERE NOT EXISTS (
          SELECT usuario FROM usuarios WHERE usuario = 'federave'
      ) LIMIT 1


insert into tipousuarios(tipo)values("administrador");
insert into tipousuarios(tipo)values("vendedor");
insert into tipousuarios(tipo)values("oficina");

select * from TipoUsuarios;
select * from palabrasclaves;

truncate TipoUsuarios;

drop table TipoUsuarios;
drop table Usuarios;

select * from usuarios;


insert into usuarios(usuario,password,idTipoUsuario)values("admin","admin",1);


CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'usuario1351';


GRANT select on *.* TO 'usuario'@'localhost';
