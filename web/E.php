<html>
	<head>

	</head>
	<body style="overflow-x: scroll;width:auto; white-space: nowrap; background-color: azure;">
		<h3>Alinea E</h3>
		<p>Listar os Meios acionados num processo de socorro</p>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$value = $_GET['value'];
			echo("<p>numprocessosocorro={$value}</p><br>");

			$sql ="SELECT nummeio, nomeentidade FROM acciona WHERE numprocessosocorro = {$value};";
			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
			echo("<tr><caption>Meio</caption></tr>");
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
