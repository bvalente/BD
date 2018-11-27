<html>
	<head>

	</head>
	<body>
		<h3>Alinea A</h3>
		<p>Inserir e remover Locais, Eventos de Emergência, Processos de Socorro, Meios e Entidades</p>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT moradalocal FROM local;";
			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border="1" cellspacing=\"5\" style=\"float: left;\">\n");
			echo("<tr><caption>Local</caption></tr>");
			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['moradalocal']}</td>\n");
				echo("<td><a href=\"remove.php?........\">Remove</a></td>\n")
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
