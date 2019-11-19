--Create Database RecursosHumanos2;

CREATE DATABASE IF NOT EXISTS `RecursosHumanos` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use RecursosHumanos;

--Topo
Create Table Area(
    Id_area Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Area varchar(25) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Topo
Create Table Puesto(
    Id_puesto Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Puesto varchar(25) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
); 

--Topo
create table Tipo_usuario(
    Id_tipo_usuario Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Tipo_usuario varchar(20) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1         
);
--Topo
Create Table Usuario(
    Id_usuario Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres_usuario varchar(40) NOT NULL,
    Apellidos_usuario varchar(40) NOT NULL,
    Correo_usuario varchar(50) UNIQUE NOT NULL,
    Id_tipo_usuario Integer Unsigned NOT NULL,
    Alias_usuario VARCHAR(25) NOT NULL,
    Clave_usuario VARCHAR(250) NOT NULL,
    Intentos TINYINT NOT NULL DEFAULT 0,
    Estado TINYINT(1) NOT NULL DEFAULT 1,               
    Actividad TINYINT(1) NOT NULL DEFAULT 0,
    Fecha date NOT NULL,
    Token VARCHAR(250) null,
    FOREIGN KEY (Id_tipo_usuario) REFERENCES Tipo_usuario(Id_tipo_usuario)
);

-- Create Table Vistas(
--     Id_vistas INTEGER Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     Nombre varchar(25) UNIQUE NOT NULL,
--     Id_tipo_usuario INTEGER Unsigned NOT NULL
--  );


-- create table Identidad(
--     Id_identidad integer Unsigned PRIMARY KEY NOT NULL,
--     Documento varchar(20) NOT NULL
-- );

--Joel
Create Table Nacionalidad (
    Id_nacionalidad Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nacionalidad varchar (25) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Joel
Create Table Nivel_idioma(
    Id_nivel_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nivel varchar (25) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Joel
Create Table Idioma(
    Id_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Idioma varchar(25) NOT NULL,
    Id_nivel_idioma Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_nivel_idioma) REFERENCES Nivel_idioma(Id_nivel_idioma) 
);
--Cristian
Create Table Tipo_equipo (
    Id_tipo_equipo Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Tipo_equipo varchar(50) UNIQUE NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Cristian
Create Table Equipo (
    Id_equipo Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombre_equipo varchar(50) NOT NULL,
    Id_tipo_equipo Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_tipo_equipo) REFERENCES Tipo_equipo(Id_tipo_equipo)
); 
--Joel
create table Departamento(
    Id_departamento Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Departamento varchar(30) NOT NULL,
    Id_nacionalidad Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_nacionalidad) REFERENCES Nacionalidad(Id_nacionalidad)
);
--Joel
create table Municipio(
    Id_municipio Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Municipio varchar(30) NOT NULL,
    Id_departamento Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_departamento) REFERENCES Departamento(Id_departamento)
);
--Cristian
Create Table Estado_civil(
    Id_estado_civil Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Estado_civil VARCHAR(20) NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Topo
Create Table Religion (
    Id_religion Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Religion varchar(25) NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Cristian esta tabla es categoria de educación
Create Table Categoria (
    Id_categoria Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Categoria varchar(25) NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Cristian
Create Table Parentesco(
    Id_parentesco Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Parentesco varchar(50) NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1
);
--Cr7 Super Crud
Create Table Colaborador(
    Id_Colaborador Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Codigo_colaborador varchar(5) UNIQUE NOT NULL,
    Nombres varchar(50) NOT NULL,
    Apellidos varchar(50) NOT NULL,
    Genero ENUM('M', 'F') NOT NULL,
    Fecha_nacimiento date NOT NULL,   
    Id_religion Integer Unsigned NOT NULL,
    Id_municipio Integer Unsigned NOT NULL,
    Telefono_casa varchar(9) NOT NULL,
    Telefono_celular varchar(9) NOT NULL,
    Correo_institucional varchar(50) NOT NULL,
    Direccion_residencial Text NOT NULL,
    NIP varchar(15) NULL,
    Nivel TINYINT(1) NULL,
    Estudiando TINYINT(1) NULL,
    Fecha_ingreso date NOT NULL,
    Estado_colaborador TINYINT(1) NOT NULL DEFAULT 1,    
    FOREIGN KEY (Id_religion) REFERENCES Religion(Id_religion),    
    FOREIGN KEY (Id_municipio) REFERENCES Municipio(Id_municipio)       
);
--Cr7 Super Crud
create table Datos_identificacion(
    Id_datos integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,    
    Num_documento varchar(10) NOT NULL,
    Residencia varchar(30) NOT NULL,
    Lugar_expedicion varchar(30) NOT NULL,
    Fecha_expedicion date NOT NULL,
    Profesion_oficio varchar(30) NOT NULL,
    Id_estado_civil Integer Unsigned NOT NULL,    
    Fecha_expiracion date NOT NULL,
    Num_ISSS varchar(20) NOT NULL UNIQUE,
    AFP varchar(20) NOT NULL UNIQUE,
    NUP varchar(20) NOT NULL,
    Tipo_documento TINYINT(1) NOT NULL,
    Id_Colaborador INTEGER Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador),
    FOREIGN KEY (Id_estado_civil) REFERENCES Estado_civil (Id_estado_civil)
);
--Cristian Super Crud
Create Table Detalle_idioma (
    Id_detalle_idioma Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_idioma Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_idioma) REFERENCES Idioma(Id_idioma),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador) 
);
--Cristian Super Crud
Create Table Educacion (
    Id_educacion Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_categoria Integer Unsigned NOT NULL,
    Especialidad varchar (40) NOT NULL,
    Descripcion Text NULL,
    Id_Colaborador Integer Unsigned NOT NULL,    
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_categoria) REFERENCES Categoria (Id_categoria),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador (Id_Colaborador)      
);
--Cristian Super Crud
Create Table datosFamiliares(
    Id_datos_familiares Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombres varchar(50) NOT NULL,
    Apellidos varchar(50) NOT NULL,
    Fecha_nacimiento date NOT NULL,
    Dependiente TINYINT (1) NOT NULL,
    Id_parentesco Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    Genero ENUM('M', 'F') NOT NULL,
    Numero_telefono VARCHAR(10) NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_parentesco) REFERENCES Parentesco (Id_parentesco),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)
);
--Joel Super Crud
Create Table equipoTotal(
    Id_equipo_total Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_equipo Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_equipo) REFERENCES Equipo(Id_equipo),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)       
);
--Joel Super Crud
Create table Experiencia_laboral(
    Id_experiencia_laboral Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Empresa varchar(25) NOT NULL,
    Fecha_ingreso date NOT NULL,
    Fecha_retiro date NOT NULL,
    Puesto varchar(25) NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)    
);
--Cr7 Super Crud
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
    Id_Colaborador INTEGER Unsigned NOT NULL,    
    Estado TINYINT(1) NOT NULL DEFAULT 1,
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)
);
--Topo Super Crud
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
--Topo Super Crud
Create table Area_detalle(
    Id_area_detalle Integer Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Id_laboral Integer Unsigned NOT NULL,
    Id_Colaborador Integer Unsigned NOT NULL,    
    FOREIGN KEY (Id_laboral) REFERENCES Area_laboral(Id_laboral),
    FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)
);
--Las notificaciones las haremos después
-- CREATE TABLE Notificaciones(
--     Id_notificacion INTEGER Unsigned PRIMARY KEY NOT NULL AUTO_INCREMENT,
--     Descripcion varchar(30) NOT NULL,
--     Id_Colaborador Integer Unsigned NOT NULL,
--     FOREIGN KEY (Id_Colaborador) REFERENCES Colaborador(Id_Colaborador)    
-- );


--Inserts--
insert into Tipo_usuario (Id_tipo_usuario, Tipo_usuario) values (1, 'Admin'),
                                                                (2, 'Enfermeria'),
                                                                (3, 'Colaborador'),
                                                                (4, 'Profesor'),
                                                                (5, 'Asistente');




-- insert into Usuario (Id_usuario, Nombres, Apellidos, Correo, Id_tipo_usuario) values
--                                  (4, 'Crack', 'Champions', 'd.@gmail.com', (Select Id_tipo_usuario from Usuario where Tipo_usuario = 'Admin'));                           

insert into Area (Area) values ('Coordinación'),
                            ('Enfermeria'),
                            ('Oficinas'),
                            ('Deportiva'),
                            ('Academico'),
                            ('Tecnico'),
                            ('Disiplina'),
                            ('Pedagogia'),
                            ('Psicologia'),
                            ('Libreia');

insert into Puesto (Puesto) values ('Coordinadora'),
                          ('Enfermera'),
                          ('colaborador'),
                          ('Profesor'),
                          ('Director');

-- insert into Identidad values (1,'Dui'),
--                              (2,'Carnet de residente');

insert into Nacionalidad (Nacionalidad) values ('Salvadoreña'),
                                ('Estadounidense'),
                                ('Mexicana'),
                                ('Canadiense'),
                                ('Brasileño'),
                                ('Argentino'),
                                ('Chileno'),
                                ('Peruano'),
                                ('Español'),
                                ('Colombiano');

insert into Nivel_idioma (Nivel) values ('basico'),
                                ('intermedio'),
                                ('avanzado');

insert into Idioma (Idioma, Id_nivel_idioma) values ('Espanol',3),
                          ('Ingles',2),
                          ('Frances',1),
                          ('Italiano',3),
                          ('Suajili',1),
                          ('Koreano',2),
                          ('Aleman',1),
                          ('Portugues',3),
                          ('Arabe',2),
                          ('Islandes',1);           

insert into Tipo_equipo (Tipo_equipo) values ('Mecanicos'),
                               ('Salon de clases'),                                                   
                               ('Electricos'),
                               ('Laboratorios'),
                               ('Comedores'),
                               ('Talleres'),
                               ('Bodega'),
                               ('IT'),
                               ('Oficinas'),
                               ('SUM');

insert into Equipo (Nombre_equipo, Id_tipo_equipo) values ('cierra',1),
                          ('cañon',2),
                          ('soplete',3),
                          ('computadora',4),
                          ('platos',5),
                          ('mesas',6),
                          ('escoba',7),
                          ('cables de red',8),
                          ('escritorio',9),
                          ('sillas',10);

insert into Departamento (Id_departamento, Departamento, Id_nacionalidad) VALUES (1,'San salvador',1),                         
                         (2,'Santa Ana',1), 
                         (3,'La Libertad',1),
                         (4,'Ahuachapan',1),
                         (5,'San Vicente',1),
                         (6,'La Union',1),
                         (7,'La Paz',1),
                         (8,'Usulutan',1),
                         (9,'Sonsonate',1),
                         (10,'San Miguel',1);

insert into Municipio (Id_municipio, Municipio, Id_departamento) VALUES (1,'mejicanos',1),                                                         
                      (2,'Chalchuapa',2),
                      (3,'Santa Tecla',3),
                      (4,'Apaneca',4),
                      (5,'Apastepeque',5),
                      (6,'Santa Rosa de Lima',6),
                      (7,'Olocuilta',7),
                      (8,'Berlin',8),
                      (9,'Izalco',9),
                      (10,'El Transito',10);

insert into Estado_civil (Id_estado_civil, Estado_civil) values (1,'Casado'),
                                (2,'Divorsiado'),
                                (3,'Soltero'),
                                (4,'Viuda'),
                                (5,'Comprometido');

insert into Religion (Id_religion, Religion) values (1,'Catolico'),
                            (2,'Evangelico'),
                            (3,'Testigo de Jehova'),
                            (4,'Protestante'),
                            (5,'Judio'),
                            (6,'Hindu'),
                            (7,'Budista'),
                            (8,'Ateo'),
                            (9,'Politeista'),
                            (10,'Bautista');

insert into Categoria (Id_categoria, Categoria) values (1,'Tecnico'),
                             (2,'Ingeniero'),
                             (3,'Master'),
                             (4,'Lincenciado'),
                             (5,'Psicologo'),
                             (6,'Pedagogo'),
                             (7,'Profesorado'),
                             (8,'Arquitecto'),
                             (9,'Consejeria'),
                             (10,'Vendedores');

insert into Parentesco (Parentesco) values('Papá'),('Mamá'),('Tio/a'),('Hijo/a'),('Abuelo/a'),('Cuñado/a'),('Primo/a'),('Novio/a');

insert into Colaborador (Id_Colaborador, Codigo_colaborador, Nombres, Apellidos, Genero, Fecha_nacimiento, Id_religion, Id_municipio, Telefono_casa, Telefono_celular, Correo_institucional, Direccion_residencial, NIP, Nivel, Estudiando, Fecha_ingreso, Estado_colaborador) values (1,'NJ01', 'Jeffersson Joel','Novoa Lopez','M','2001-04-11',1,1,'22731127','77497179','20170743@ricaldone.edu.sv','San salvador','11475',0,0,'2017-10-17', 1),
                             (2, 'RT01', 'tania eunice','Ramirez Martinez','F','1999-10-05',1,2,'22111079','75197129','20140353@ricaldone.edu.sv','Mejicanos','25475',1,0,'2017-05-13',1),
                             (3, 'NP01', 'pedro Joel','Novoa Campos','M','2001-04-05',2,1,'25731127','78941235','20190524@ricaldone.edu.sv','San salvador','19478',0,1,'2015-07-15', 1);
        

insert into Datos_identificacion (Id_datos, Num_documento, Residencia, Lugar_expedicion, Fecha_expedicion, Profesion_oficio, Id_estado_civil, Fecha_expiracion, Num_ISSS, AFP, NUP, Id_Colaborador)
 values (1,'01618181-4','avenida el colibri casa 61D','san salvador','20-08-2017','empresaria',1,'21-08-2022','20A08713','2020159','96374115',1),
 (2,'06198408-9','colonia la gloria pasaje 3 casa 15E mejicanos','mejicanos','29-09-2017','motorista',2,'20-10-2021','4681351','168151','35431u',2),
 (3,'15182545-3','Centro Urbano de Mejicanos Edificio F Apto 42','mejicans','10-10-2010','programador',1,'08-08-2018','15021521','316541351','646541', 3);

insert into Detalle_idioma (Id_idioma, Id_Colaborador) values (1,1),(2,2),(3,3),(4,1),(5,2),(6,3),(7,1),(8,2),(9,3),(10,1);    --Agregada

insert into Educacion (Id_categoria, Especialidad, Descripcion, Id_Colaborador) values (1,'informatica','muy buenas notas',1),
                            (2,'Electricidad','Buena persona',2),
                            (3,'Mecanico','buenas referencias',3),
                            (4,'Profesor','excelente trabajador',1),
                            (5,'Arquitecto','alto desempeño',2),
                            (6,'Lincenciado','colabora demasiado',3),
                            (7,'Ingeniero','titulos con honores',1),
                            (8,'Diseñador','buen trabajo en equipo',2),
                            (9,'Psicologo','permanece siempre centrado en su trabajo',3),
                            (10,'Pedagogo','bueno en conducta',1);

insert into datosFamiliares (Id_datos_familiares, Nombres, Apellidos, Fecha_nacimiento, Dependiente, Id_parentesco, Id_Colaborador, Genero, Numero_telefono) values (1,'Maria','gonzales','10-05-1980',0,1,1,'F','7979-7979'),
                                   (2,'Josue','reyes','13-10-1975',1,2,2,'M','7979-7979'),
                                   (3,'Alejandro','perez','03-04-2000',0,3,3,'M','7979-7979'),
                                   (4,'Luis','castro','04-04-2000',1,4,3,'M','7979-7979'),
                                   (5,'Marcos','flores','05-04-2000',0,5,3,'M','7979-7979'),
                                   (6,'Karla','hernandez','06-04-2000',1,6,3,'F','7979-7979'),
                                   (7,'Fabiola','pacheco','07-04-2000',0,7,3,'F','7979-7979'),
                                   (8,'Wanda','paramo','08-04-2000',1,8,3,'F','7979-7979'),
                                   (9,'Nicki','enriquez','09-04-2000',0,8,3,'M','7979-7979'),
                                   (10,'Fernando','luna','10-04-2000',1,8,3,'M','7979-7979'); 

insert into equipoTotal (Id_equipo, Id_Colaborador) values (1,1),(2,2),(3,3),(4,1),(5,2),(6,3),(7,1),(8,2),(9,3),(10,1);

insert into Experiencia_laboral (Empresa, Fecha_ingreso, Fecha_retiro, Puesto, Id_Colaborador)
 values ('claro','15-05-2017','30-10-2018','recursos humanos',1),                                
 ('tigo','04-05-2017','14-05-2017','programacion',2),
 ('sykes','20-05-2017','30-12-2018','marketing',3),
 ('anda','21-05-2017','30-12-2018','gerente',1),
 ('ministerio de hacienda','22-05-2017','30-12-2018','contador',2),
 ('cuscatlan','23-05-2017','30-12-2018','cajero',3),
 ('embajada americana','24-05-2017','30-12-2018','jefe',1),
 ('print sv','25-05-2017','30-12-2018','diseñador',2),
 ('el diario de hoy','26-05-2017','30-12-2018','empresario',3),
 ('movistar','27-05-2017','30-12-2018','mantenimiento de computadoras',1);

insert into Salud (Id_Salud, Enfermedades_Tratamiento, Descripcion_enfermedades, Medicamentos, Descripcion_medicamentos, Alergias, Descripcion_alergias, Alergias_medicamentos, Descripcion_alergias_medicamentos, Id_Colaborador) values (1,1,'Necesita tratamiento',1,'son comunes',0,'no tiene', 0, 'No Perro', 1),
                         (2,0,' tratamiento',0,' comunes',0,'no tiene',1, 'No maje', 2),
                         (3,1,'no tratamiento',1,'no tan comunes',0,'no tiene',1,'No necesita', 3),
                         (4,0,'en control',0,'comunes',0,'no tiene',1,'Medicamento diario', 1),
                         (5,1,'bajo medicamento',1,'no tan comunes',0,'no tiene',1,'Pastilla semanal', 2),
                         (6,0,'en control',0,'son comunes',0,'no tiene',1,'Medicamento diario', 3),
                         (7,1,'tratamiento',1,'no tan comunes',0,'no tiene',1,'Pastilla semanal', 1),
                         (8,0,'bajo medicamento',0,'son comunes',0,'no tiene',1,'Aspirina', 2),
                         (9,1,'no tratamiento',1,'comunes',0,'no tiene',1,'No necesita', 3),
                         (10,0,'necesita tratamiento',0,'no tan comunes',0,'no tiene',1,'Aspina',1);

insert into Area_laboral (Id_laboral, Id_area, Id_puesto, Sueldo_plaza, Fecha_ingreso, Inicio_contrato, Fin_contrato, Horas_al_dia) values (1,1,1,800.90,'2017-10-20','2017-10-25','2018-10-25',8),
                                (2,2,2,1800.90,'2017-10-10','15-10-2017','25-10-2018',10),
                                (3,3,3,750.90,'20-10-2016','25-10-2017','25-10-2018',8),
                                (4,4,4,950.90,'21-10-2016','26-10-2017','25-10-2018',10),
                                (5,5,5,600.90,'22-10-2016','27-10-2017','25-10-2018',8),
                                (6,6,1,990.90,'23-10-2016','28-10-2017','25-10-2018',10),
                                (7,7,2,1175.90,'24-10-2016','29-10-2017','25-10-2018',8),
                                (8,8,3,725.90,'25-10-2016','30-10-2017','25-10-2018',10),
                                (9,9,4,850.90,'26-10-2016','31-10-2017','25-10-2018',8),
                                (10,10,5,1900.90,'27-10-2016','01-11-2017','25-10-2018',10);

insert into Area_detalle (Id_laboral, Id_Colaborador) values (1,1), (2,2), (3,3), (4,1), (5,2), (6,3), (7,1), (8,2), (9,3), (10,1);

insert into Notificaciones(Descripcion, Id_Colaborador) values('necesita renovar el DUI',1),
                                ('Pidio permiso una semana',2),
                                ('En maternidad',3),
                                ('Permiso para aunsentarme una clase',1),
                                ('Consula por todo un dia',2),
                                ('Prestamo de proyector',3),
                                ('Pedir prestado el salon Don Bosco',1),
                                ('Renovar papeles de trabajador',2),
                                ('Aunsentarme una mañana',3),
                                ('Tramite de renovar papeleos',1);


Select U.Nombres_usuario, U.Apellidos_usuario FROM Usuario as U INNER JOIN Tipo_usuario as T ON U.Id_tipo_usuario = T.Id_tipo_usuario WHERE T.Tipo_usuario = ''; 

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
    Select C.Nombres, C.Apellidos, C.Fecha_nacimiento, count(Id_datos_familiares) as Hijos FROM Colaborador as C LEFT JOIN datosFamiliares as D ON C.Id_Colaborador = D.Id_Colaborador
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


-- CREATE TRIGGER LLENAR_NOTICACION AFTER INSERT ON Colaborador
--     FOR EACH ROW
--    INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Se agregó un nuevo Colaborador', 1);

-- CREATE TRIGGER selectNotificaion AFTER UPDATE ON  Usuario
--     FOR EACH ROW
--    INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Se Inicio Sesión', 1);
    
    
-- CREATE TRIGGER notificacionSalud AFTER INSERT ON Salud
--     FOR EACH ROW
--    INSERT INTO Notificaciones (Descripcion, Id_Colaborador) VALUES ('Añadido Registro de Salud', 2);


SELECT Sum(A.Sueldo_plaza) FROM Area_laboral as A INNER JOIN Puesto as P ON P.Id_puesto = A.Id_puesto INNER JOIN Area as AR ON AR.Id_area = A.Id_area;

SELECT SUM(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'M';

SELECT SUM(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'F';

SELECT AVG(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'M';

SELECT AVG(A.Sueldo_plaza) FROM Colaborador as C INNER JOIN Area_detalle as AD ON AD.Id_Colaborador = C.Id_Colaborador
INNER JOIN Area_laboral as A ON A.Id_laboral = AD.Id_laboral WHERE C.Genero = 'F';

SELECT R.Religion FROM Colaborador as C INNER JOIN Religion as R ON R.Id_religion = C.Id_religion WHERE R.Id_religion = '';

SELECT R.Religion, count(R.Id_religion) FROM Colaborador as C INNER JOIN Religion as R ON R.Id_religion = C.Id_religion Group By R.Id_religion;


insert into Colaborador values (10, 'NJ02', 'Jeffersson Joel','Novoa Lopez','M','11-04-2001',1,1,'22731127','77497179','20170743@ricaldone.edu.sv','San salvador','11475',0,0,'20-10-2017', 1);




   



    







