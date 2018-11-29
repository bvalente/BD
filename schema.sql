
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

-- Named constraints are global to the database.
-- Therefore the following use the following naming rules:
--	1. pk_table for names of primary key constraints
--	2. fk_table_another for names of foreign key constraints


create table Camara(
	numCamara integer not null unique,

    primary key (numCamara)
);

create table Video(
	dataHoraInicio timestamp not null,
	dataHoraFim timestamp not null,
	numCamara integer not null ,

    primary key (dataHoraInicio, numCamara),
	foreign key (numCamara) references Camara
);

create table SegmentoVideo(
	numSegmento integer not null unique,
	duracao integer not null,
	dataHoraInicio timestamp not null,
	numCamara integer not null ,

    primary key (numSegmento, dataHoraInicio, numCamara),
	foreign key (numCamara) references Camara
);

create table Local(
	moradaLocal varchar(80) not null unique,

    primary key (moradaLocal)
);

create table Vigia(
	moradaLocal char(80) not null ,
	numCamara integer not null ,

    primary key(moradaLocal, numCamara),
	foreign key(moradaLocal) references Local ON DELETE CASCADE,
	foreign key(numCamara) references Camara
	--TODO duvida: varios references numa so linha? varios foreign keys
);
create table ProcessoSocorro(
	numProcessoSocorro integer not null unique,

    primary key (numProcessoSocorro)
);

create table EventoEmergencia(
	numTelefone integer not null unique,
	instanteChamada timestamp not null ,
	nomePessoa varchar(80) not null unique,
	moradaLocal varchar(80) not null,
	numProcessoSocorro integer,

    primary key (numTelefone, instanteChamada),
	foreign key (moradaLocal) references Local ON DELETE CASCADE,
	foreign key (numProcessoSocorro) references ProcessoSocorro ON DELETE CASCADE
);



create table EntidadeMeio(
	nomeEntidade varchar(80) not null unique,

    primary key (nomeEntidade)
);

create table Meio(
	numMeio integer not null unique,
	nomeMeio varchar(80) not null,
	nomeEntidade varchar(80) not null unique,

    primary key(numMeio, nomeEntidade),
	foreign key(nomeEntidade) references EntidadeMeio ON DELETE CASCADE
);

create table MeioCombate(
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,

    primary key(numMeio,nomeEntidade),
	foreign key(numMeio) references Meio(numMeio) ON DELETE CASCADE,
	foreign key(nomeEntidade) references EntidadeMeio(nomeEntidade) ON DELETE CASCADE
);

create table MeioApoio(
	numMeio integer not null unique,
	nomeEntidade varchar(80) not null unique,

    primary key(numMeio, nomeEntidade),
	foreign key(numMeio) references Meio(numMeio) ON DELETE CASCADE,
	foreign key(nomeEntidade) references Meio(nomeEntidade) ON DELETE CASCADE
);

create table MeioSocorro(
	numMeio integer not null unique,
    nomeEntidade varchar(80) not null unique,

    primary key(numMeio, nomeEntidade),
	foreign key(numMeio) references Meio(numMeio) ON DELETE CASCADE,
	foreign key(nomeEntidade) references Meio(nomeEntidade) ON DELETE CASCADE
);

create table Transporta(
    numMeio integer not null unique,
    nomeEntidade varchar(80) not null unique,
    numVitimas integer not null,
    numProcessoSocorro integer not null ,

    primary key(numMeio, nomeEntidade, numProcessoSocorro),
    foreign key(numMeio, nomeEntidade) references MeioSocorro ON DELETE CASCADE,
    foreign key(numProcessoSocorro)references ProcessoSocorro(numProcessoSocorro) ON DELETE CASCADE
);

create table Alocado(
	numMeio integer not null ,
	nomeEntidade varchar(80) not null ,
	numVitimas integer not null, --TODO pode ser null?
	numProcessoSocorro integer not null ,
	primary key(numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio, nomeEntidade) references MeioApoio ON DELETE CASCADE,
	foreign key(numProcessoSocorro) references ProcessoSocorro ON DELETE CASCADE
);

create table Acciona(
	numMeio integer not null ,
    nomeEntidade varchar(80) not null ,
	numProcessoSocorro integer not null ,

    primary key(numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio) references Meio(numMeio) ON DELETE CASCADE,
	foreign key(nomeEntidade) references Meio(nomeEntidade) ON DELETE CASCADE,
	foreign key(numProcessoSocorro) references ProcessoSocorro(numProcessoSocorro) ON DELETE CASCADE
);

create table Coordenador(
	idCoordenador integer not null unique,
	primary key(idCoordenador)
);

create table Audita(
	idCoordenador integer not null unique,
	numMeio integer not null ,
	nomeEntidade varchar(80) not null ,
	numProcessoSocorro integer not null ,
	datahoraInicio timestamp not null ,
	datahoraFim timestamp not null ,

	primary key(idCoordenador, numMeio, nomeEntidade, numProcessoSocorro),
	foreign key(numMeio, nomeEntidade, numProcessoSocorro) references Acciona ON DELETE CASCADE,
	foreign key(idCoordenador) references Coordenador
	--TODO como fazer dataHoraInicio < dataHoraFim?
);

create table Solicita(
    idCoordenador integer not null unique,
    dataHoraInicioVideo timestamp not null ,
    numCamara integer not null ,
    dataHoraInicio timestamp not null,
    dataHoraFim timestamp not null ,

    primary key(idCoordenador,dataHoraInicioVideo,numCamara),
    foreign key(idCoordenador) references Coordenador,
    foreign key(dataHoraInicioVideo,numCamara) references Video
);
