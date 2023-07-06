create table programadores (
    prog_id serial not null primary key,
    prog_correo varchar(50) not null,
    prog_grado int not null, 
    prog_nombreS varchar(50) not null,
    prog_apellidoS varchar(50) not null,
    prog_sit char (1) DEFAULT '1' ,
    FOREIGN KEY (prog_grado) REFERENCES grados(gra_id)
);

create table grados (
    gra_id serial not null,
    gra_nombre varchar(50) not null,
    gra_sit char (1) DEFAULT '1',
    primary key (gra_id)
);

Create table asig_programador (
asig_id serial not null primary key,
asig_programador int not null,
asig_app int not null,
asig_sit char (1) DEFAULT '1',
foreign key (asig_programador) REFERENCES programadores (prog_id),
foreign key (asig_app) REFERENCES sancioneses (app_id)
);

Create table sancioneses (
app_id serial not null primary key,
app_nombre varchar (50) not null,
app_estado char (1) DEFAULT '1'
);

Create table problemas_problemas_encontrados (
tar_id serial not null primary key,
tar_app int not null,
tar_descripcion varchar (50) not null,
tar_fecha date not null,
tar_estado char (1) DEFAULT '1',
foreign key (tar_app) REFERENCES sancioneses(app_id)
);
