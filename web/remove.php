<html>
	<head>

	</head>
	<body>
		<h3>Remove</h3>


		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//remove
			$table = $_GET['table'];
			switch ($table){
				case "local":

					$value = $_GET['value'];
					$sql = "DELETE FROM local WHERE moradalocal='{$value}';";
					$result = $db->prepare($sql);
					$result->execute();
					break;

				case "eventoemergencia":

					$value1 = $_GET['value1'];
					$value2 = $_GET['value2'];
					$sql = "DELETE FROM eventoemergencia WHERE numtelefone='{$value1}' AND instantechamada='{$value2}';";
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
