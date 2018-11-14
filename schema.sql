schema.sql

drop table Camara cascade;
drop table Video cascade;
drop table SegmentoVideo cascade;
drop table Local cascade;
drop table Vigia cascade;
drop table EventoEmergencia cascade;
drop table ProcessoSocorro cascade;
drop table EntidadeMeio cascade;
drop table Meio cascade;
drop table MeioCombate cascade;
drop table MeioApoio cascade;
drop table MeioSocorro cascade;
drop table Transporta cascade;
drop table Alocado cascade;
drop table Acciona cascade;
drop table Coordenador cascade;
drop table Audita cascade;
drop table Solicita cascade;

----------------------------------------
-- Table Creation
----------------------------------------

-- Delete these comments?

-- Named constraints are global to the database.
-- Therefore the following use the following naming rules:
--   1. pk_table for names of primary key constraints
--   2. fk_table_another for names of foreign key constraints

create table Camara
    (numCamara    integer    not null unique,
    primary key (numCamara));

create table Video
   (dataHoraInicio    varchar(80)    not null unique,
    dataHoraFim    varchar(30)    not null,
    numCamara    integer    not null unique,
    primary key (dataHoraInicio, numCamara),
    foreign key (numCamara)
        references Camara);

create table SegmentoVideo
   (numSegmento    integer    not null unique,
    duracao    integer    not null,
    dataHoraInicio    integer    not null unique,
    numCamara    integer    not null unique,
    primary key (numSegmento, dataHoraInicio, numCamara),
    foreign key (numCamara) references Camara);

create table Local
   (moradaLocal    varchar(80)    not null unique,
   primary key (moradaLocal));

create table Vigia
   (moradaLocal    char(80)    not null unique,
   numCamara    integer    not null unique,
   primary key(moradaLocal, numCamara),
   foreign key(moradaLocal, numCamara) references Local, Camara);

create table EventoEmergencia
   (numTelefone    integer    not null unique,
   instanteChamada    integer    not null unique,
   nomePessoa    varchar(80)    not null unique,
   moradaLocal    varchar(80)    not null,
   numProcessoSocorro    integer,
   primary key (numTelefone, instanteChamada),
   foreign key (moradaLocal)
       references Local,
    foreign key (numProcessoSocorro)
        references ProcessoSocorro);

