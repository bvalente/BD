<html>
	<head>

	</head>
	<body>
		<h3>Inserir</h3>
		<p>Inserir e remover Locais, Eventos de Emergência, Processos de Socorro, Meios e Entidades</p>

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
					$sql = "INSERT INTO local moradalocal='{$value}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "eventoemergencia":

					$value1 = $_GET['numtelefone'];
					$value2 = $_GET['instantechamada'];
					$value3 = $_GET['nomepessoa'];
					$value4 = $_GET['moradalocal'];
					$value5 = $_GET['numprocessosocorro'];
					$sql = "INSERT INTO eventoemergencia VALUES {$value1};";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "processosocorro":

					$value = $_GET['value'];
					$sql = "DELETE FROM processosocorro WHERE numprocessosocorro={$value};";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "meio":

					$value1 = $_GET['value1'];
					$value2 = $_GET['value2'];

					$sql = "DELETE FROM meio WHERE nummeio='{$value1}' AND nomeentidade='{$value2}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "entidademeio":

					$value = $_GET['value'];

					$sql = "DELETE FROM entidademeio WHERE nomeentidade='{$value}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;
				default:
					echo "erro";
					break;
			}

			$db = null;

		} catch (PDOException $e){
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
		?>

	</body>
</html>
