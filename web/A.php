<html>
	<head>

	</head>
	<body style="overflow-x: scroll;width:auto; white-space: nowrap; background-color: azure;">
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

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
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

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
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

			//ProcessoSocorro(numProcessoSocorro)
			$sql = "SELECT numProcessoSocorro FROM ProcessoSocorro;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>ProcessoSocorro</caption></tr>");
				echo("<tr><td>numProcessoSocorro</td></tr>");

				echo("<form action=\"inserir.php\" method=\"get\">");
				echo("<input type=\"hidden\" name=\"table\" value=\"processosocorro\"/>");
				echo("<tr><td><input type=\"text\" name=\"numprocessosocorro\"/></td>\n");
				echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
				echo("</form>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['numprocessosocorro']}</td>\n");
						echo("<td><a href=\"remove.php?table=processosocorro&value={$row['numprocessosocorro']}\">Remove</a></td>\n");
					echo("</tr>\n");
				}
				echo("</table>\n");


			//Meio (numMeio, nomeEntidade)
			$sql = "SELECT nummeio, nomemeio, nomeentidade FROM meio;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>Meio</caption></tr>");
				echo("<tr><td>numMeio</td>");
				echo("<td>nomeMeio</td>");
				echo("<td>nomeEntidade</td></tr>");

				echo("<form action=\"inserir.php\" method=\"get\">");
				echo("<input type=\"hidden\" name=\"table\" value=\"meio\"/>");
				echo("<tr><td><input type=\"text\" name=\"nummeio\"/></td>\n");
				echo("<td><input type=\"text\" name=\"nomemeio\"/></td>");
				echo("<td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
				echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
				echo("</form>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['nummeio']}</td>\n");
					echo("<td>{$row['nomemeio']}</td>\n");
					echo("<td>{$row['nomeentidade']}</td>\n");

					echo("<td><a href=\"remove.php?table=meio&value1={$row['nummeio']}&value2={$row['nomeentidade']}\">Remove</a></td>\n");
					echo("</tr>\n");
				}
				echo("</table>\n");

			//EntidadeMeio(nomeEntidade)
			$sql = "SELECT nomeentidade FROM entidademeio;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>EntidadeMeio</caption></tr>");
				echo("<tr><td>nomeEntidade</td></tr>");

				echo("<form action=\"inserir.php\" method=\"get\">");
				echo("<input type=\"hidden\" name=\"table\" value=\"entidademeio\"/>");
				echo("<tr><td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
				echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
				echo("</form>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['nomeentidade']}</td>\n");
					echo("<td><a href=\"remove.php?table=entidademeio&value={$row['nomeentidade']}\">Remove</a></td>\n");
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
