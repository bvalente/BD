<html>
	<head>

	</head>
	<body style="overflow-x: scroll;width:auto; white-space: nowrap; background-color: azure;">
		<h3>Alinea D</h3>
		<p>Associar Processos de Socorro a Meios e Processos de Socorro a Eventos de Emergencia</p>
		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //ProcessoSocorro(numProcessoSocorro)
			$sql = "SELECT numProcessoSocorro FROM ProcessoSocorro;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>ProcessoSocorro</caption></tr>");
				echo("<tr><td>numProcessoSocorro</td></tr>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['numprocessosocorro']}</td>\n");
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
				echo("<td>nomeEntidade</td></tr>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['nummeio']}</td>\n");
					echo("<td>{$row['nomeentidade']}</td>\n");
					echo("</tr>\n");
				}
				echo("</table>\n");

			//Acciona(numMeio, nomeEntidade, numProcessoSocorro)
			$sql = "SELECT nummeio, nomeentidade, numprocessosocorro FROM acciona;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>Acciona</caption></tr>");
                echo("<tr><td>numMeio</td>");
                echo("<td>nomeEntidade</td>");
				echo("<td>numProcessoSocorro</td></tr>");

				echo("<form action=\"inserir.php\" method=\"get\">");
				echo("<input type=\"hidden\" name=\"table\" value=\"acciona\"/>");
				echo("<tr><td><input type=\"text\" name=\"nummeio\"/></td>\n");
                echo("<td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
                echo("<td><input type=\"text\" name=\"numprocessosocorro\"/></td>\n");

				echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
				echo("</form>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['nummeio']}</td>\n");
					echo("<td>{$row['nomeentidade']}</td>\n");
					echo("<td>{$row['numprocessosocorro']}</td>\n");
					echo("</tr>\n");
				}
				echo("</table>\n");

            //PROCESSO SOCORRO +  EventoEmergencia

            //ProcessoSocorro(numProcessoSocorro)
            $sql = "SELECT numProcessoSocorro FROM ProcessoSocorro;";
            $result = $db->prepare($sql);
            $result->execute();

                echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
                echo("<tr><caption>ProcessoSocorro</caption></tr>");
                echo("<tr><td>numProcessoSocorro</td></tr>");

                foreach($result as $row)
                {
                    echo("<tr>\n");
                    echo("<td>{$row['numprocessosocorro']}</td>\n");
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
