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

#TODO def genSegmentoVideo(Video):

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

def writeTable(file, tableName, data):

	file.write("\nINSERT INTO " + tableName + " VALUES\n")

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
	file.write(";")
	#end

if __name__ == "__main__":

	populate =  []

	Camara = genCamara(); populate.append(("Camara", Camara))
	Video = genVideo(Camara); populate.append(("Video", Video))
	Local = genLocal(); populate.append(("Local", Local))
	Vigia = genVigia(Camara, Local); populate.append(("Vigia", Vigia))

	file = open(fileName, "w")
	for table in populate:
		writeTable(file, table[0], table[1])
	file.close()
