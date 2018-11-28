<html>
	<head>

	</head>
	<body>
		<h3>Alinea C</h3>
		<p>Listar Processos de Socorro e Meios</p>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT numprocessosocorro FROM processosocorro;";
			$result = $db->prepare($sql);
	        $result->execute();

			echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;\">\n");
			echo("<tr><caption>ProcessoSocorro</caption></tr>");
			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['numprocessosocorro']}</td>\n");
				echo("</tr>\n");
			}
			echo("</table>\n");

			$sql = "SELECT nummeio, nomemeio, nomeentidade FROM meio;";
			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border=\"0\" cellspacing=\"5\" style=\"float: left;\">\n");
			echo("<tr><caption>EntidadeMeio</caption></tr>");
			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['nummeio']}</td>\n");
				echo("<td>{$row['nomemeio']}</td>\n");
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
