<html>
	<head>

	</head>
	<body>
		<h3>Inserir</h3>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//inserir
			$table = $_GET['table'];
			switch ($table){
				case "local":

					$value = $_GET['moradalocal'];
					$sql = "INSERT INTO local VALUES ('{$value}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "eventoemergencia":

					$value1 = $_GET['numtelefone'];
					$value2 = $_GET['instantechamada'];
					$value3 = $_GET['nomepessoa'];
					$value4 = $_GET['moradalocal'];
					$value5 = $_GET['numprocessosocorro'];
					$sql = "INSERT INTO eventoemergencia VALUES ({$value1} ,'{$value2}', '{$value3}', '{$value4}' ,{$value5});";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "processosocorro":

					$value = $_GET['numprocessosocorro'];
					$sql = "INSERT INTO processosocorro VALUES ({$value});";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "meio":
					//Meio (numMeio, nomeEntidade)

					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomemeio'];
					$value3 = $_GET['nomeentidade'];

					$sql = "INSERT INTO meio VALUES ({$value1},'{$value2}','{$value3}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "entidademeio":
					//EntidadeMeio(nomeEntidade)

					$value = $_GET['nomeentidade'];

					$sql = "INSERT INTO entidademeio VALUES ('{$value}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "meiocombate":
					//MeioCombate(numMeio, nomeEntidade)

					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomeentidade'];

					$sql = "INSERT INTO meiocombate VALUES ({$value1}, '{$value2}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;


				case "meioapoio":
					//MeioApoio(numMeio, nomeEntidade)
					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomeentidade'];

					$sql = "INSERT INTO meioapoio VALUES ({$value1}, '{$value2}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "meiosocorro":
					//MeioSocorro(numMeio, nomeEntidade)
					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomeentidade'];

					$sql = "INSERT INTO meiosocorro VALUES ({$value1}, '{$value2}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "acciona":
					//Acciona(numMeio, nomeEntidade, numProcessoSocorro)
					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomeentidade'];
					$value3 = $_GET['numprocessosocorro'];

					$sql = "INSERT INTO acciona VALUES ({$value1}, '{$value2}', '{$value3}');";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				default:
					echo "erro";
					break;
			}

			echo($sql);
			$db = null;

		} catch (PDOException $e){
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
		?>

	</body>
</html>
