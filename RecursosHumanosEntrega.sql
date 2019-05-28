Create Database RecursosHumanos;
use RecursosHumanos;
--Topo
create table Tipo_usuario(
    Id_tipo_usuario Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Tipo_usuario varchar(20) NOT NULL
);
--Topo
Create Table Usuario(
    Id_usuario Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres varchar(40) NOT NULL,
    Apellidos varchar(40) NOT NULL,
    Correo varchar(50) UNIQUE NOT NULL,
    Id_tipo_usuario Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_tipo_usuario) REFERENCES Tipo_usuario(Id_tipo_usuario)
);
--Topo
Create Table Area(
    Id_area Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Area varchar(25) NOT NULL
);
--Topo
Create Table Puesto(
    Id_puesto Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Puesto varchar(25) NOT NULL
);

-- create table Identidad(
--     Id_identidad integer Unsigned PRIMARY KEY NOT NULL,
--     Documento varchar(20) NOT NULL
-- );

--Joel
Create Table Nacionalidad (
    Id_nacionalidad Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nacionalidad varchar (25) NOT NULL
);
--Joel
Create Table Nivel_idioma(
    Id_nivel_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nivel varchar (15) NOT NULL
);
--Joel
Create Table Idioma(
    Id_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Idioma varchar(15) NOT NULL,
    Id_nivel_idioma Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_nivel_idioma) REFERENCES Nivel_idioma(Id_nivel_idioma) 
);
--Cristian
Create Table Tipo_equipo (
    Id_tipo_equipo Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Tipo_equipo varchar(50) NOT NULL
);
--Cristian
Create Table Equipo (
    Id_equipo Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombre_equipo varchar(50) NOT NULL,
    Id_tipo_equipo Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_tipo_equipo) REFERENCES Tipo_equipo(Id_tipo_equipo)
); 
--Joel
create table Departamento(
    Id_departamento Integer Unsigned PRIMARY KEY NOT NULL,
    Departamento varchar(30) NOT NULL,
    Id_nacionalidad Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_nacionalidad) REFERENCES Nacionalidad(Id_nacionalidad)
);
--Joel
create table Municipio(
    Id_municipio Integer Unsigned PRIMARY KEY NOT NULL,
    Municipio varchar(30) NOT NULL,
    Id_departamento Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_departamento) REFERENCES Departamento(Id_departamento)
);
--Cristian
Create Table Estado_civil(
    Id_estado_civil Integer Unsigned PRIMARY KEY NOT NULL,
    Estado_civil VARCHAR(20) NOT NULL
);
--Topo
Create Table Religion (
    Id_religion Integer Unsigned PRIMARY KEY NOT NULL,
    Religion varchar(25) NOT NULL
);
--Cristian esta tabla es categoria de educación
Create Table Categoria (
    Id_categoria Integer Unsigned PRIMARY KEY NOT NULL,
    Categoria varchar(25) NOT NULL
);
--Cristian
Create Table Parentesco(
    Id_parentesco Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Parentesco varchar(50) NOT NULL
);
--Cr7
create table Datos_identificacion(
    Id_datos integer Unsigned PRIMARY KEY NOT NULL,    
    Num_documento varchar(10) NOT NULL,
    Residencia varchar(30) NOT NULL,
    Lugar_expedicion varchar(30) NOT NULL,
    Fecha_expedicion date NOT NULL,
    Profesion_oficio varchar(30) NOT NULL,
    Id_estado_civil Integer Unsigned NOT NULL,
    Id_identidad Integer Unsigned NOT NULL,
    Fecha_expiracion date NOT NULL,
    Num_ISSS varchar(20) NOT NULL UNIQUE,
    AFP varchar(20) NOT NULL UNIQUE,
    NUP varchar(20) NOT NULL,
    Tipo_documento TINYINT(1) NOT NULL,
    FOREIGN KEY (Id_estado_civil) REFERENCES Estado_civil (Id_estado_civil)
);
--Cr7
Create Table Colaborador(
    Id_Colaborador Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres varchar(50) NOT NULL,
    Apellidos varchar(50) NOT NULL,
    Genero ENUM('M', 'F') NOT NULL,
    Fecha_nacimiento date NOT NULL,
    Edad Integer Unsigned NOT NULL,    
    Id_datos Integer Unsigned NOT NULL,
    Id_religion Integer Unsigned NOT NULL,
    Id_municipio Integer Unsigned NOT NULL,
    Telefono_casa varchar(9) NOT NULL,
    Telefono_celular varchar(9) NOT NULL,
    Correo_insitucional varchar(50) NOT NULL,
    Direccion_residencial Text NOT NULL,
    NIP varchar(15) NULL,
    Nivel TINYINT(1) NULL,
    Estudiando TINYINT(1) NULL,
    Fecha_ingreso date NOT NULL,
    FOREIGN KEY (Id_religion) REFERENCES Religion(Id_religion),
    FOREIGN KEY (Id_datos) REFERENCES Datos_identificacion(Id_datos),
    FOREIGN KEY (Id_municipio) REFERENCES Municipio(Id_municipio)      
);
--Joel
Create Table Detalle_idioma (
    Id_detalle_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_idioma Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_idioma) REFERENCES Idioma(Id_idioma),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador) 
);
--Cristian
Create Table Educacion (
    Id_educacion Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_categoria Integer Unsigned NOT NULL,
    Especialidad varchar (40) NOT NULL,
    Descripcion Text NULL,        
    FOREIGN KEY (Id_categoria) REFERENCES Categoria (Id_categoria),
    Id_Colaborador Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador (Id_Colaborador)      
);
--Cr7
Create Table datosFamiliares(
    Id_datos_familiares Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres varchar(50) NOT NULL,
    Apellidos varchar(50) NOT NULL,
    Fecha_nacimiento date NOT NULL,
    Dependiente TINYINT (1) NOT NULL,
    Id_parentesco Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    Genero TINYINT (1) NOT NULL,
    FOREIGN KEY (Id_parentesco) REFERENCES Parentesco (Id_parentesco),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)
);
--Cristian
Create Table equipoTotal(
    Id_equipo_total Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_equipo Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_equipo) REFERENCES Equipo(Id_equipo),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)       
);
--Cr7
Create table Experiencia_laboral(
    Id_experiencia_laboral Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Empresa varchar(25) NOT NULL,
    Fecha_ingreso date NOT NULL,
    Fecha_retiro date NOT NULL,
    Puesto varchar(25) NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)    
);
--Cr7
Create Table Salud(
    Id_Salud Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Enfermedades_Tratamiento TINYINT(1) NOT NULL,
    Descripcion_enfermedades Text NULL,
    Medicamentos TINYINT(1) NOT NULL,
    Descripcion_medicamentos Text NULL,
    Alergias TINYINT(1) NOT NULL,
    Descripcion_alergias Text NULL,
    Alergias_medicamentos TINYINT(1) NOT NULL,
    Descripcion_alergias_medicamentos Text NULL,
    Notificacion_emergencia Integer Unsigned NOT NULL,    
    FOREIGN KEY (Notificacion_emergencia) REFERENCES datosFamiliares(Id_datos_familiares)
);
--Cr7
Create Table Area_laboral(
    Id_laboral Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_area Integer Unsigned NOT NULL,
    Id_puesto Integer Unsigned,
    Sueldo_plaza Double(6,2) NOT NULL,
    Fecha_ingreso date NOT NULL,
    Inicio_contrato date NOT NULL,
    Fin_contrato date NOT NULL,
    Horas_al_dia varchar(6) NOT NULL,
    FOREIGN KEY (Id_area) REFERENCES Area(Id_area),
    FOREIGN KEY (Id_puesto) REFERENCES Puesto(Id_puesto)
);
--Topo
Create table Area_detalle(
    Id_area_detalle Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_laboral Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,    
    FOREIGN KEY (Id_laboral) REFERENCES Area_laboral(Id_laboral),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)
);
--Las notificaciones las haremos después
CREATE TABLE Notificaciones(
    Id_notificacion INTEGER Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Descripcion varchar(30) NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)    
);


--Inserts--
insert into Tipo_usuario (Id_tipo_usuario, Tipo_usuario) values (1, 'Admin'),
                                                                (2, 'Enfermeria'),
                                                                (3, 'Colaborador');


insert into Usuario values (1,'Joel','Novoa', 'Eltanio69@gmail.com', 2),
                           (2,'Diego','Arias', 'd.arias@gmail.com', 1),
                           (3,'Cristian','topo', 'NoobMaster69', 3);--Excelente--

-- insert into Usuario (Id_usuario, Nombres, Apellidos, Correo, Id_tipo_usuario) values
--                                  (4, 'Crack', 'Champions', 'd.@gmail.com', (Select Id_tipo_usuario from Usuario where Tipo_usuario = 'Admin'));                           

insert into Area (Area) values ('Coordinación'), ('Enfermeria'), ('Oficinas');

insert into Puesto (Puesto) values ('Coordinadora'),
                          ('Enfermera'),
                          ('colaborador');

insert into Identidad values (1,'Dui'),
                             (2,'Carnet de residente');

insert into Nacionalidad (Nacionalidad) values ('Salvadoreña'),
                                ('Estadounidense'),
                                ('Mexicana');

insert into Nivel_idioma (Nivel) values ('basico'),
                                ('intermedio'),
                                ('avanzado');

insert into Idioma (Idioma, Id_nivel_idioma)values ('Español',3),
                          ('Ingles',2),
                          ('Frances',1);           

insert into Tipo_equipo (Tipo_equipo) values ('Mecanicos'),
                               ('Salon de clases'),                                                   
                               ('Electricos');

insert into Equipo (Nombre_equipo, Id_tipo_equipo) values ('cierra',1),
                          ('cañon',2),
                          ('soplete',3);

insert into Departamento VALUES (1,'San salvador',1),                         
                         (2,'Santa Ana',1), 
                         (3,'La Libertad',2);

insert into Municipio VALUES (1,'mejicanos',1),                                                         
                      (2,'Chalchuapa',2),
                      (3,'Santa Tecla',3);

insert into Estado_civil values (1,'Casado'),
                                (2,'Divorsiado'),
                                (3,'Soltero');

insert into Religion values (1,'Catolico'),
                            (2,'Evangelico'),
                            (3,'Testigo de Jehova');

insert into Categoria values (1,'Tecnico'),
                             (2,'Ingeniero'),
                             (3,'Master');

insert into Parentesco (Parentesco) values('Papá'),('Mamà'),('tio/a'), ('Hijo/a');

    Id_datos 
    Num_documento 
    Residencia 
    Lugar_expedicion 
    Fecha_expedicion 
    Profesion_oficio 
    Id_estado_civil 
    Id_identidad 
    Fecha_expiracion 
    Num_ISSS 
    AFP 
    NUP    

insert into Datos_identificacion (Id_datos, Num_documento, Residencia, Lugar_expedicion, Fecha_expedicion, Profesion_oficio, Id_estado_civil, Id_identidad, Fecha_expiracion, Num_ISSS, AFP, NUP)
 values (1,'01618181-4','avenida el colibri casa 61D','san salvador','20-08-2017','empresaria',1,1,'21-08-2022','20A08713','2020159','96374115'),
 (2,'06198408-9','colonia la gloria pasaje 3 casa 15E mejicanos','mejicanos','29-09-2017','motorista',2,2,'20-10-2021','4681351','168151','35431u'),
 (3,'15182545-3','Centro Urbano de Mejicanos Edificio F Apto 42','mejicans','10-10-2010','programador',1,2,'08-08-2018','15021521','316541351','646541');

insert into Colaborador values (1,'Jeffersson Joel','Novoa Lopez','M','11-04-2001','18',1,1,1,'22731127','77497179','20170743@ricaldone.edu.sv','San salvador','11475',0,0,'20-10-2017'),
                             (2,'tania eunice','Ramirez Martinez','F','05-10-1999','20',2,1,2,'22111079','75197129','20140353@ricaldone.edu.sv','Mejicanos','25475',1,0,'13-05-2017'),
                             (3, 'pedro Joel','Novoa Campos','M','05-04-2001','18',2,2,1,'25731127','78941235','20190524@ricaldone.edu.sv','San salvador','19478',0,1,'15-07-2015');

insert into Detalle_idioma (Id_idioma, Id_Colaborador) values (1,1),(2,2),(3,3);    --Agregada

insert into Educacion (Id_categoria, Especialidad, Descripcion, Id_Colaborador) values (1,'informatica','muy buenas notas',1),
                            (2,'Electricidad','Buena persona',2),
                            (3,'Mecanico','buenas referencias',3);

insert into datosFamiliares values (1,'Maria','gonzales','10-05-1980',0,2,1,0),
                                   (2,'Josue','reyes','13-10-1975',0,3,2,1),
                                   (3,'Alejandro','perez','03-04-2000',1,2,3,0); 

insert into equipoTotal (Id_equipo, Id_Colaborador) values (1,1),(2,2),(3,3);

insert into Experiencia_laboral (Empresa, Fecha_ingreso, Fecha_retiro, Puesto, Id_Colaborador)
 values ('claro','15-05-2017','30-10-2018','recursos humanos',1),                                
 ('tigo','04-05-2017','14-05-2017','programacion',2),
 ('sykes','20-05-2017','30-12-2018','marketing',3);

insert into Salud values (1,1,'Necesita tratamiento',1,'son comunes',0,'no tiene',0, 'No Perro',1),
                         (2,0,' tratamiento',0,' comunes',0,'no tiene',1, 'No maje' ,2),
                         (3,1,'no tratamiento',1,'no tan comunes',0,'no tiene',1,'No topo',3);

insert into Area_laboral values (1,1,1,800.90,'20-10-2017','25-10-2017','25-10-2018',8),
                                (2,2,2,1800.90,'10-10-2017','15-10-2017','25-10-2018',10),
                                (3,3,1,750.90,'20-10-2016','25-10-2017','25-10-2018',8);

insert into Area_detalle (Id_laboral, Id_Colaborador) values (1,1), (2,2), (3,3);

insert into Notificaciones(Descripcion, Id_Colaborador) values('necesita renovar el DUI',1),
                                ('Pidio permiso una semana',2),
                                ('En maternidad',3);


Select U.Nombres, U.Apellidos FROM Usuario as u INNER JOIN Tipo_usuario as t ON u.Id_tipo_usuario = t.Id_tipo_usuario WHERE t.Tipo_usuario = ''; 

--El Colaborador quizás pueda negociar su Salario
--Hijos(número) de los Colaboradores--
--Número de personas dependientes de un Colaboradores--
--Después de Agregar a un Colaborador--
--Colaboradores con alguna enfermedad--
--Duis Cercanos a expiración--
--Cuando comenzarón (fecha) a trabajar--
--Colaboradores para renovar su contrato--
--Cuando se ingrese un Colorador Notificar--
--Colaboradores Hombre y Mujeres--
--Estadisticas de Salarios--
--Estadisticas de Religión--
--Estadisticas de Estado Civil e Idioma y Departamento--


CREATE PROCEDURE mostrarSegunParentesco (Parentesco varchar(30))
    Select C.Nombres, C.Apellidos, C.Edad, count(Id_datos_familiares) as Hijos FROM Colaborador as C LEFT JOIN datosFamiliares as D ON C.Id_Colaborador = D.Id_Colaborador
    INNER JOIN Parentesco as P ON P.Id_parentesco = D.Id_parentesco WHERE P.Parentesco = Parentesco
    Group by D.Id_Colaborador;

 CALL mostrarSegunParentesco('Hijo/a');   

CREATE PROCEDURE porGenero (Genero char(1))
    SELECT * FROM Colaborador as C WHERE C.Genero = Genero;

 CALL porGenero('M');  


CREATE PROCEDURE personasDependientesDos (Colaborador Integer, Dependecia TINYINT(1))
    SELECT D.nombres, D.Apellidos, D.Dependiente FROM datosFamiliares as D INNER JOIN Colaborador as C ON D.Id_Colaborador = C.Id_Colaborador
    WHERE C.Id_Colaborador = Colaborador AND D.Dependiente = Dependecia;

 CALL personasDependientesDos(2, 0);  


CREATE TRIGGER LLENAR_NOTICACION AFTER INSERT ON Colaborador
    FOR EACH ROW
   INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Se agregó un nuevo Colaborador', 1);

CREATE TRIGGER selectNotificaion AFTER UPDATE ON  Usuario
    FOR EACH ROW
   INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Se Inicio Sesión', 1);
    
    
CREATE TRIGGER notificacionSalud AFTER INSERT ON Salud
    FOR EACH ROW
   INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Añadido Registro de Salud', 2);


SELECT Sum(A.Sueldo_plaza) FROM Area_laboral as A INNER JOIN Puesto as P ON P.Id_puesto = A.Id_puesto INNER JOIN Area as AR ON AR.Id_area = A.Id_area

SELECT SUM(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'M';

SELECT SUM(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'F';

SELECT AVG(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'M';

SELECT AVG(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'F';

SELECT R.Religion FROM Colaborador as C INNER JOIN Religion as R ON R.Id_religion = C.Id_religion WHERE R.Id_religion = ?;

SELECT R.Religion, count(R.Id_religion) FROM Colaborador as C INNER JOIN Religion as R ON R.Id_religion = C.Id_religion Group By R.Id_religion;


insert into Colaborador values (10,'Jeffersson Joel','Novoa Lopez','M','11-04-2001','18',1,1,1,'22731127','77497179','20170743@ricaldone.edu.sv','San salvador','11475',0,0,'20-10-2017');




   



    







