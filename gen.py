import random;
import datetime;
N = 100; #num of lines per table
fileName = "file.sql";


def genCamara():
	#Camara (numCamara)
	Camara = []

	for a in range(0,N):
		Camara.append([str(a)])

	return Camara

def genVideo(Camara):
	#Video(dataHoraInicio, dataHoraFim, numCamara)

	#para facilitar, cada camara vai ter um video
	#cada video tem o mesmo inicio e fim
	#OPTIMIZE datas mais realistas

	Video = []
	dataHoraInicio = datetime.datetime.utcnow()
	dataHoraFim = dataHoraInicio + datetime.timedelta(minutes=5)
	#FIXME verificar que as datas guardadas sao compativeis com sql
	dataHoraInicio_toSQL = dataHoraInicio.strftime("'%Y-%m-%d %H:%M:%S'")
	dataHoraFim_toSQL = dataHoraFim.strftime("'%Y-%m-%d %H:%M:%S'")

	for camara in Camara:
		Video.append([dataHoraInicio_toSQL, dataHoraFim_toSQL, camara[0]])

	return Video

def genSegmentoVideo(Video):
	#SegmentoVideo(​numSegmento​, duração, d​ ataHoraInicio, numCamara​)
	SegmentoVideo = []

	i=0
	for video in Video:
		duracao = random.randrange(6)
		numSegmento = i
		SegmentoVideo.append([str(numSegmento), str(duracao), video[0], video[2]])
		i+=1

	return SegmentoVideo

def genLocal():
	#Local(moradaLocal)
	Local = []

	for b in range(0,N):
	    Local.append(["'local"+str(b)+"'"])

	return Local;

def genVigia(Camara, Local):
	#Vigia(moradaLocal, numCamara)
	#cada Camara vai ter um local aleatorio
	#nem todos os locais vao ter camara *insert sad face*
	Vigia = []

	for camara in Camara:
		local = Local[random.randrange(len(Local))]
		Vigia.append([local[0], camara[0]])

	return Vigia;

def genProcessoSocorro():
	#ProcessoSocorro(numProcessoSocorro)
	ProcessoSocorro = []

	for a in range(0,N):
		ProcessoSocorro.append([str(a)])

	return ProcessoSocorro

def genEventoEmergencia(ProcessoSocorro, Local):
	#EventoEmergencia(numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro)

	EventoEmergencia = []
	i = 0
	for processo in ProcessoSocorro:
		numTelefone = str(960000000+i)
		instanteChamada = datetime.datetime.utcnow()
		instanteChamada_toSQL = instanteChamada.strftime("'%Y-%m-%d %H:%M:%S'")
		nomePessoa = "'pessoa"+str(i)+"'"
		moradaLocal = Local[random.randrange(len(Local))]
		EventoEmergencia.append([numTelefone, instanteChamada_toSQL, nomePessoa, moradaLocal[0], processo[0]])
		i +=1

	return EventoEmergencia

def genEntitadeMeio():
	#EntidadeMeio(nomeEntidade)
	EntidadeMeio = []

	for i in range(0, N*3):
		EntidadeMeio.append(["'EntidadeMeio"+str(i)+"'"])

	return EntidadeMeio

def genMeio(EntidadeMeio):
	#Meio(numMeio, nomeMeio, nomeEntidade)
	Meio = []
	i=0
	for entidade in EntidadeMeio:
		Meio.append([str(i), "'Meio"+str(i)+"'", entidade[0]])
		i+=1;
	return Meio

def genMeioCombate(Meio):
	#MeioCombate(numMeio, nomeEntidade)
	MeioCombate = []

	for i in range(0, N):
		MeioCombate.append([Meio[i][0], Meio[i][2]])
	return MeioCombate

def genMeioApoio(Meio):
	#MeioApoio(numMeio, nomeEntidade)
	MeioApoio = []

	for i in range(N, N*2):
		MeioApoio.append([Meio[i][0], Meio[i][2]])

	return MeioApoio

def genMeioSocorro(Meio):
	#MeioSocorro(numMeio, nomeEntidade)
	MeioSocorro = []

	for i in range(N*2, N*3):
		MeioSocorro.append([Meio[i][0], Meio[i][2]])
	return MeioSocorro

def genTransporta(MeioSocorro, ProcessoSocorro):
	#Transporta(numMeio, nomeEntidade, numVitimas, numProcessoSocorro)
	Transporta = []

	for i in range(0, N):
		processo = ProcessoSocorro[random.randrange(len(ProcessoSocorro))]
		numVitimas = str(random.randint(1,10))
		Transporta.append([MeioSocorro[i][0], MeioSocorro[i][1], numVitimas, processo[0]])

	return Transporta

def genAlocado(MeioApoio, ProcessoSocorro):
	#Alocado(numMeio, nomeEntidade, numhoras, numProcessoSocorro)
	Alocado=[]

	for meio in MeioApoio:
		numhoras = str(random.randint(1, 20))
		processo = ProcessoSocorro[random.randrange(len(ProcessoSocorro))]
		Alocado.append([meio[0], meio[1], numhoras, processo[0]])

	return Alocado

def genAcciona(Meio, ProcessoSocorro):
	#Acciona(numMeio, nomeEntidade, numProcessoSocorro)
	Acciona = []

	for i in range(0, N):
		processo = ProcessoSocorro[random.randrange(len(ProcessoSocorro))]
		Acciona.append([Meio[i][0], Meio[i][2], processo[0]])

	return Acciona

def genCoordenador():
	#Coordenador(idCoordenador)
	Coordenador = []

	for i in range(0, N):
		Coordenador.append([str(i)])
	return Coordenador

def genAudita(Acciona, Coordenador):
	#Audita(idCoordenador, numMeio, nomeEntidade, numProcessoSocorro, datahoraInicio, datahoraFim)
	Audita = []

	datahoraInicio = datetime.datetime.utcnow()
	datahoraFim = datahoraInicio + datetime.timedelta(minutes=5)
	datahoraInicio_toSQL = datahoraInicio.strftime("'%Y-%m-%d %H:%M:%S'")
	datahoraFim_toSQL = datahoraFim.strftime("'%Y-%m-%d %H:%M:%S'")

	for coordenador in Coordenador:
		acciona = Acciona[random.randrange(len(Acciona))]
		Audita.append([coordenador[0], acciona[0], acciona[1], acciona[2], datahoraInicio_toSQL, datahoraFim_toSQL])

	return Audita

def genSolicita(Coordenador, Video):
	#Solicita(idCoordenador, dataHoraInicioVideo, numCamara, dataHoraInicio, dataHoraFim)
	Solicita = []

	datahoraInicio = datetime.datetime.utcnow()
	datahoraFim = datahoraInicio + datetime.timedelta(minutes=5)
	datahoraInicio_toSQL = datahoraInicio.strftime("'%Y-%m-%d %H:%M:%S'")
	datahoraFim_toSQL = datahoraFim.strftime("'%Y-%m-%d %H:%M:%S'")

	i = 0;
	for coordenador in Coordenador:

		randI = random.randrange(len(Video))
		horaVideo = Video[randI][0]
		camara = Video[randI][2]
		Solicita.append([coordenador[0], horaVideo, camara, datahoraInicio_toSQL, datahoraFim_toSQL])
		i+=1

	return Solicita


def writeTable(file, tableName, data):

	file.write("TRUNCATE TABLE " + tableName + " CASCADE;\n");
	file.write("INSERT INTO " + tableName + " VALUES\n")

	first = True
	for line in data:

		if not first:
			file.write(",\n")
		else:
			first = False;

		file.write("(")
		first2 = True
		for value in line:
			if not first2:
				file.write(", ")
			else:
				first2 = False;
			file.write(value)
		file.write(")");
	file.write(";\n")
	#end

if __name__ == "__main__":

	populate =  []

	Camara = genCamara()
	populate.append(("Camara", Camara))
	Video = genVideo(Camara)
	populate.append(("Video", Video))
	SegmentoVideo = genSegmentoVideo(Video)
	populate.append(("SegmentoVideo", SegmentoVideo))
	Local = genLocal()
	populate.append(("Local", Local))
	Vigia = genVigia(Camara, Local)
	populate.append(("Vigia", Vigia))
	ProcessoSocorro = genProcessoSocorro()
	populate.append(("ProcessoSocorro", ProcessoSocorro))
	EventoEmergencia = genEventoEmergencia(ProcessoSocorro, Local);
	populate.append(("EventoEmergencia", EventoEmergencia))
	EntidadeMeio = genEntitadeMeio()
	populate.append(("EntidadeMeio", EntidadeMeio))
	Meio = genMeio(EntidadeMeio);
	populate.append(("Meio", Meio))
	MeioCombate = genMeioCombate(Meio)
	populate.append(("MeioCombate", MeioCombate))
	MeioApoio = genMeioApoio(Meio)
	populate.append(("MeioApoio", MeioApoio))
	MeioSocorro = genMeioSocorro(Meio)
	populate.append(("MeioSocorro", MeioSocorro))
	Transporta = genTransporta(MeioSocorro, ProcessoSocorro)
	populate.append(("Transporta", Transporta))
	Alocado = genAlocado(MeioApoio, ProcessoSocorro)
	populate.append(("Alocado", Alocado))
	Acciona = genAcciona(Meio, ProcessoSocorro)
	populate.append(("Acciona", Acciona))
	Coordenador = genCoordenador()
	populate.append(("Coordenador", Coordenador))
	Audita = genAudita(Acciona, Coordenador)
	populate.append(("Audita", Audita))
	Solicita = genSolicita(Coordenador, Video)
	populate.append(("Solicita", Solicita))

	file = open(fileName, "w")
	for table in populate:
		writeTable(file, table[0], table[1])
	file.close()
