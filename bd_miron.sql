create table of_encargado (
    of_id serial not null primary key,
    of_correo varchar(50) not null,
    of_grado int not null, 
    of_nombreS varchar(50) not null,
    of_apellidoS varchar(50) not null,
    of_sit char (1) DEFAULT '1' ,
    FOREIGN KEY (of_grado) REFERENCES grados(gra_id)
);

create table grados (
    gra_id serial not null,
    gra_nombre varchar(50) not null,
    gra_sit char (1) DEFAULT '1',
    primary key (gra_id)
);

Create table asig_ofencargado (
asig_id serial not null primary key,
asig_ofencargado int not null,
asig_san int not null,
asig_sit char (1) DEFAULT '1',
foreign key (asig_ofencargado) REFERENCES of_encargado (of_id),
foreign key (asig_san) REFERENCES aplicaciones (san_id)
);

Create table aplicaciones (
san_id serial not null primary key,
san_nombre varchar (50) not null,
san_estado char (1) DEFAULT '1'
);

Create table problemas_reportados (
pro_id serial not null primary key,
pro_san int not null,
pro_descripcion varchar (50) not null,
pro_fecha date not null,
pro_estado char (1) DEFAULT '1',
foreign key (pro_san) REFERENCES aplicaciones (san_id)
);
