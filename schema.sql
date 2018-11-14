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
--	1. pk_table for names of primary key constraints
--	2. fk_table_another for names of foreign key constraints


create table Camara(
	numCamara integer not null unique,

    primary key (numCamara)
);

create table Video(
	dataHoraInicio varchar(80) not null unique,
	dataHoraFim varchar(30) not null,
	numCamara integer not null unique,

    primary key (dataHoraInicio, numCamara),
	foreign key (numCamara) references Camara
);

create table SegmentoVideo(
	numSegmento integer not null unique,
	duracao integer not null,
	dataHoraInicio integer not null unique,
	numCamara integer not null unique,

    primary key (numSegmento, dataHoraInicio, numCamara),
	foreign key (numCamara) references Camara
);

create table Local(
	moradaLocal varchar(80) not null unique,

    primary key (moradaLocal)
);

create table Vigia(
	moradaLocal char(80) not null unique,
	numCamara integer not null unique,

    primary key(moradaLocal, numCamara),
	foreign key(moradaLocal, numCamara) references Local, Camara
	--TODO duvida: varios references numa so linha? varios foreign keys
);

create table EventoEmergencia(
	numTelefone integer not null unique,
	instanteChamada integer not null unique,
	nomePessoa varchar(80) not null unique,
	moradaLocal varchar(80) not null,
	numProcessoSocorro integer,

    primary key (numTelefone, instanteChamada)
	foreign key (moradaLocal) references Local,
	foreign key (numProcessoSocorro) references ProcessoSocorro
);

create table ProcessoSocorro(
	numProcessoSocorro integer not null unique,

    primary key (numProcessoSocorro)
);

create table EntidadeMeio(
	nomeEntidade varchar(80) not null unique,

    primary key (nomeEntidade)
);

create table Meio(
	numMeio integer not null unique,
	nomeMeio varchar(80) not null,
	nomeEntidade varchar(80) not null unique

    primary key(numMeio, nomeEntidade),
	foreign key(nomeEntidade) references EntidadeMeio
);

create table MeioCombate(
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,

    primary key(numMeio,nomeEntidade),
	foreign key(numMeio) references Meio,
	foreign key(nomeEntidade) references EntidadeMeio,
);

create table MeioApoio(
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,

    primary key(numMeio, nomeEntidade),
	foreign key(numMeio) references Meio,
	foreign key(nomeEntidade) references Meio
);

create table MeioSocorro(
	numMeio integer not null unique,
    nomeEntidade varchar(80) not null unique,

    primary key(numMeio, nomeEntidade),
	foreign key(numMeio) references Meio,
	foreign key(nomeEntidade) references Meio
);

create table Transporta(
    numMeio integer not null unique,
    nomeEntidade varchar(80) not null unique,
    numVitimas integer not null,
    numProcessoSocorro integer not null unique,

    primary key(numMeio, nomeEntidade, numProcessoSocorro),
    foreign key(numMeio) references Meio,
    foreign key(nomeEntidade) references EntidadeMeio,
    foreign key(numProcessoSocorro)references ProcessoSocorro,
);

create table Alocado(
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,
	numVitimas integer not null, --TODO pode ser null?
	numProcessoSocorro integer not null unique,
	primary key(numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio, nomeEntidade)
		references Meio,
	foreign key(numProcessoSocorro)
		references ProcessoSocorro
);

create table Acciona(
	numMeio integer not null unique,
    nomeEntidade varchar(80) not null unique,
	numProcessoSocorro integer not null unique,

    primary key(numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio) references Meio,
	foreign key(nomeEntidade) references Meio,
	foreign key(numProcessoSocorro) references ProcessoSocorro
);

create table Coordenador(
	idCoordenador integer not null unique,
	primary key(idCoordenador)
);

create table Audita(
	idCoordenador integer not null unique,
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,
	numProcessoSocorro integer not null unique,
	datahoraInicio integer not null unique,
	datahoraFim integer not null unique,

	primary key(idCoordenador, numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio, nomeEntidade, numProcessoSocorro) references Acciona,
	foreign key(idCoordenador) references Coordenador
	--TODO como fazer dataHoraInicio < dataHoraFim?
);

create table Solicita(
    idCoordenador integer not null unique,
    dataHoraInicioVideo varchar(80) not null unique,
    numCamara integer not null unique,
    dataHoraInicio varchar(80) not null unique,
    dataHoraFim varchar(80) not null unique,

    primary key(idCoordenador,dataHoraInicioVideo,numCamara)
    foreign key(idCoordenador) references Coordenador,
    foreign key(dataHoraInicioVideo,numCamara) references Video,
);
