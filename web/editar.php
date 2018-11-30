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

			$bd->beginTransaction();
			//Editar
			$table = $_GET['table'];
			$nummeioA = $_GET['nummeioA'];
			$nomeentidadeA = $_GET['nomeentidadeA'];
			$nummeio = $_GET['nummeio'];
			$nomeentidade = $_GET['nomeentidade'];
			echo "switch";
			switch ($table){


				case "meiocombate":
					//MeioCombate(numMeio, nomeEntidade)

					$sql = "UPDATE meiocombate SET nummeio ={$nummeio}, nomeentidade='{$nomeentidade}' WHERE nummeio ={$nummeioA} AND nomeentidade= '{$nomeentidadeA}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;


				case "meioapoio":
					//MeioApoio(numMeio, nomeEntidade)

					$sql = "UPDATE meiocombate SET nummeio ={$nummeio}, nomeentidade='{$nomeentidade}' WHERE nummeio ={$nummeioA} AND nomeentidade= '{$nomeentidadeA}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "meiosocorro":
					//MeioSocorro(numMeio, nomeEntidade)
					echo "socorro";
					$sql = "UPDATE meiocombate SET nummeio ={$nummeio}, nomeentidade='{$nomeentidade}' WHERE nummeio ={$nummeioA} AND nomeentidade= '{$nomeentidadeA}';";
					$result = $db->prepare($sql);
					$result->execute();
					echo($sql);
					break;

				default:
					echo "erro";
					break;
			}

			$bd->commit();
			echo($sql);
			$db = null;

		} catch (PDOException $e){
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
		?>

	</body>
</html>
