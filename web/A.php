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

			//Locais (moradaLocal)
			$sql = "SELECT moradalocal FROM local;";
			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;\">\n");
			echo("<tr><caption>Local</caption></tr>");
			echo("<tr><td>moradalocal</td></tr>");
			echo("<form action=\"inserir.php\" method=\"get\">");
			echo("<input type=\"hidden\" name=\"table\" value=\"local\"/>");
			echo("<tr><td><input type=\"text\" name=\"moradalocal\"/></td>\n");
			echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
			echo("</form>");

			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['moradalocal']}</td>\n");
				echo("<td><a href=\"remove.php?table=local&value={$row['moradalocal']}\">Remove</a></td>\n");
				echo("</tr>\n");
			}
			echo("</table>\n");

			//EventoEmergencia (numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro)
			$sql = "SELECT numTelefone, instanteChamada, nomePessoa, moradaLocal, numProcessoSocorro FROM EventoEmergencia;";
			$result = $db->prepare($sql);
			$result->execute();

			echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;\">\n");
			echo("<tr><caption>EventoEmergencia</caption></tr>");

			echo("<tr><td>numTelefone</td>");
			echo("<td>instanteChamada</td>");
			echo("<td>nomePessoa</td>");
			echo("<td>moradaLocal</td>");
			echo("<td>numProcessoSocorro</td></tr>");

			echo("<form action=\"inserir.php\" method=\"get\">");
			echo("<input type=\"hidden\" name=\"table\" value=\"eventoemergencia\"/>");

			echo("<tr><td><input type=\"text\" name=\"numtelefone\"/></td>\n");
			echo("<td><input type=\"text\" name=\"instantechamada\"/></td>\n");
			echo("<td><input type=\"text\" name=\"nomepessoa\"/></td>\n");
			echo("<td><input type=\"text\" name=\"moradalocal\"/></td>\n");
			echo("<td><input type=\"text\" name=\"numprocessosocorro\"/></td>\n");



			echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
			echo("</form>");

			foreach($result as $row)
			{
				echo("<tr>\n");
				echo("<td>{$row['numtelefone']}</td>\n");
				echo("<td>{$row['instantechamada']}</td>\n");
				echo("<td>{$row['nomepessoa']}</td>\n");
				echo("<td>{$row['moradalocal']}</td>\n");
				echo("<td>{$row['numprocessosocorro']}</td>\n");
					echo("<td><a href=\"remove.php?table=eventoemergencia&value1={$row['numtelefone']}&value2={$row['instantechamada']}\">Remove</a></td>\n");
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
