<html>
	<head>

	</head>
	<body style="overflow-x: scroll;width:auto; white-space: nowrap; background-color: azure;">
		<h3>Alinea F</h3>
		<p>Listar os meios de Socorro acionados em processos de socorro originados num dado local de incendio </p>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$value = $_GET['value'];
			echo("<p>moradalocal={$value}</p><br>");

			$sql = "SELECT numMeio, nomeEntidade FROM Acciona NATURAL JOIN EventoEmergencia NATURAL JOIN MeioSocorro WHERE moradaLocal = '{$value}';";
			//locais 57, 45, 91

			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
			echo("<tr><caption>MeioSocorro</caption></tr>");
			echo("<tr><td>numMeio</td>");
			echo("<td>nomeEntidade</td></tr>");

			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['nummeio']}</td>\n");
				echo("<td>{$row['nomeentidade']}</td>\n");
				echo("</tr>\n");
			}
			echo("</table>\n");


			$db = null;

		} catch (PDOException $e){
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
		?>

	</body>
</html>
