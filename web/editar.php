<html>
	<head>

	</head>
	<body>
		<h3>Editar</h3>

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

				case "meiocombate":
					//MeioCombate(numMeio, nomeEntidade)

					$value1 = $_GET['nummeio'];
					$value2 = $_GET['nomeentidade'];

					$sql = "UPDATE meiocombate SET ({$value1}, '{$value2}');";
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
