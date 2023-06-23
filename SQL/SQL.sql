create database secuide;
use secuide;

create table perfil
(
idPerfil int(10) not null auto_increment,
descricao varchar(100) not null,
primary key (idPerfil)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table especialidade
(
idEspecialidade int(10) not null auto_increment,
especialidade varchar(500) not null,
primary key (idEspecialidade)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table usuario
(
idUsuario int(10) not null auto_increment,
nome varchar(300) not null,
email varchar(50) not null,
login varchar (20) not null, 
senha varchar (32) not null,
idPerfil int(10) not null,
primary key (idUsuario),
constraint perfil_usuario foreign key (idPerfil) references perfil (idPerfil)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table funcionario
(
idFuncionario int (10) not null auto_increment,
nome varchar (500) not null,
pai varchar (500) not null,
mae varchar (500) not null,
dt_nasc date not null,
naturalidade varchar (500) not null,
nacionalidade varchar (500) not null,
registro varchar (50) not null, 
endereco varchar (100) not null, 
rg varchar (20) not null,
cpf varchar (50) not null,
sexo char (2) not null,
idEspecialidade int(10) not null,
primary key (idFuncionario),
idUsuario int(10) not null,
constraint usuario_funcionario foreign key (idUsuario) references usuario (idUsuario)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table paciente
(
idPaciente int(10) not null auto_increment,
nome varchar (500) not null,
pai varchar (500) not null,
mae varchar (500) not null,
dt_nasc varchar(15) not null,
naturalidade varchar (500) not null,
nacionalidade varchar (500) not null,
raca varchar (50) not null, 
endereco varchar (100) not null, 
rg varchar (20) not null,
cpf varchar (50) not null,
sexo char (2) not null,
primary key (idPaciente),
idUsuario int(10) not null,
constraint usuario_paciente foreign key (idUsuario) references usuario (idUsuario)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table agenda
(
idAgenda int(10) not null auto_increment,
data date not null,
hora varchar (8) not null,
idEspecialidade int(10) not null,
idFuncionario int (10) not null,
idPaciente int(10) not null,
primary key (idAgenda),
constraint especialidade_agenda foreign key (idEspecialidade) references especialidade (idEspecialidade),
constraint funcionario_agenda foreign key (idFuncionario) references funcionario (idFuncionario),
constraint paciente_agenda foreign key (idPaciente) references paciente (idPaciente)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table prontuario
(
idProntuario int(10) not null auto_increment,
data date not null,
hora varchar(8) not null,
idPaciente int(10) not null,
idFuncionario int(10) not null,
idAgenda int(10) not null,
anamnese varchar (500) not null,
primary key (idProntuario),
constraint paciente_prontuario foreign key (idPaciente) references paciente (idPaciente),
constraint funcionario_prontuario foreign key (idFuncionario) references funcionario (idFuncionario),
constraint agenda_prontuario foreign key (idAgenda) references agenda (idAgenda)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table consulta
(
idConsulta int(10) not null auto_increment,
idAgenda int(10) not null,
idEspecialidade int(10) not null,
idFuncionario int (10) not null,
idPaciente int(10) not null,
primary key (idConsulta),
constraint especialidade_consulta foreign key (idEspecialidade) references especialidade (idEspecialidade),
constraint funcionario_consulta foreign key (idFuncionario) references funcionario (idFuncionario),
constraint paciente_consulta foreign key (idPaciente) references paciente (idPaciente),
constraint agenda_consulta foreign key (idAgenda) references agenda (idAgenda)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table documentos
(
idDocumentos int(10) not null auto_increment,
idConsulta int(10) not null,
primary key (idDocumentos),
constraint consulta_documentos foreign key (idConsulta) references consulta (idConsulta)
)
engine = innodb
auto_increment = 1
default character set = utf8;

create table prontuario_funcionario
(
idProntuario_Funcionario int(10) not null auto_increment,
idFuncionario int(10) not null,
idProntuario int(10) not null,
primary key (idProntuario_Funcionario),
constraint funcionario_prontuariofuncionario foreign key (idFuncionario) references funcionario (idFuncionario),
constraint prontuario_prontuariofuncionario foreign key (idProntuario) references prontuario (idProntuario)
)
engine = innodb
auto_increment = 1
default character set = utf8;

use secuide;
insert into perfil (descricao) values ('Administrador');
insert into perfil (descricao) values ('Medico');
insert into perfil (descricao) values ('Paciente');

insert into especialidade (especialidade) values ('Cardiologia');
insert into especialidade (especialidade) values ('Oftalmologia');

insert into usuario(nome, email, login, senha, idPerfil) values ('Admin', 'admin@email.com', 'admin', '202cb962ac59075b964b07152d234b70', '1');
insert into usuario(nome, email, login, senha, idPerfil) values ('Joao', 'Joao@email.com', 'joao', '202cb962ac59075b964b07152d234b70', '2');
insert into usuario(nome, email, login, senha, idPerfil) values ('Leticia', 'leticia@email.com', 'leticia', '202cb962ac59075b964b07152d234b70', '2');

insert into usuario(nome, email, login, senha, idPerfil) values ('Manoel', 'manuel@email.com', 'manoel.gomes', '202cb962ac59075b964b07152d234b70', '3');
insert into usuario(nome, email, login, senha, idPerfil) values ('Renata', 'renata@email.com', 'renata.torres', '202cb962ac59075b964b07152d234b70', '3');

insert into paciente (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, raca, endereco, rg, cpf, sexo, idUsuario) values
('Manoel Gomes', 'Manoel', 'Célia', '1980-08-15', 'Brasília - DF', 'Brasileiro', 'Pardo', 'Ceilândia', '1.234.567', '123.456.789-10', 'M', 4);
insert into paciente (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, raca, endereco, rg, cpf, sexo, idUsuario) values
('Renata Silva', 'Birobiro', 'Madalene', '1829-05-24', 'São Paulo - SP', 'Alemão', 'Branco', 'Taguatinga', '1.234.567', '123.456.789-10', 'F', 5);


insert into funcionario (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, registro, endereco, rg, cpf, sexo, idEspecialidade, idUsuario) values
('Joao', 'Souza', 'Maria', '2003-03-12', 'São Paulo - SP', 'Brasileiro', '123456', 'Ceilândia', '1.234.567', '123.456.789-10', 'M', 1, 2);
insert into funcionario (nome, pai, mae, dt_nasc, naturalidade, nacionalidade, registro, endereco, rg, cpf, sexo, idEspecialidade, idUsuario) values
('Leticia', 'Bittencourt', 'Misha', '2003-09-01', 'São Paulo - SP', 'Brasileiro', '123456', 'Aguas Claras', '1.234.567', '123.456.789-10', 'F', 2, 3);