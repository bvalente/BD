<html>
	<head>

	</head>
	<body style="overflow-x: scroll;width:auto; white-space: nowrap; background-color: azure;">
		<h3>Alinea B</h3>
		<p> Inserir, editar e remover Meios de Combate, Meios de Apoio, e Meios de Socorro. </p>

		<?php
		try{

			$host = "db.ist.utl.pt";
			$user ="ist187521";
			$password = "bananasplit";
			$dbname = $user;

			$db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //MeioCombate (numMeio, nomeEntidade)
			$sql = "SELECT nummeio, nomeentidade FROM meiocombate;";
			$result = $db->prepare($sql);
			$result->execute();

				echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
				echo("<tr><caption>MeioCombate</caption></tr>");
				echo("<tr><td>numMeio</td>");
				echo("<td>nomeEntidade</td></tr>");

				echo("<form action=\"inserir.php\" method=\"get\">");
				echo("<input type=\"hidden\" name=\"table\" value=\"meiocombate\"/>");
				echo("<tr><td><input type=\"text\" name=\"nummeio\"/></td>\n");
				echo("<td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
				echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
				echo("</form>");

				foreach($result as $row)
				{
					echo("<tr>\n");
					echo("<td>{$row['nummeio']}</td>\n");
					echo("<td>{$row['nomeentidade']}</td>\n");

					echo("<td><a href=\"remove.php?table=meiocombate&value1={$row['nummeio']}&value2={$row['nomeentidade']}\">Remove</a></td>\n");
					echo("</tr>\n");
				}
				echo("</table>\n");

                //MeioApoio (numMeio, nomeEntidade)
                $sql = "SELECT nummeio, nomeentidade FROM meioapoio;";
                $result = $db->prepare($sql);
                $result->execute();

                    echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
                    echo("<tr><caption>MeioApoio</caption></tr>");
                    echo("<tr><td>numMeio</td>");
                    echo("<td>nomeEntidade</td></tr>");

                    echo("<form action=\"inserir.php\" method=\"get\">");
                    echo("<input type=\"hidden\" name=\"table\" value=\"meioapoio\"/>");
                    echo("<tr><td><input type=\"text\" name=\"nummeio\"/></td>\n");
                    echo("<td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
                    echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
                    echo("</form>");

                    foreach($result as $row)
                    {
                        echo("<tr>\n");
                        echo("<td>{$row['nummeio']}</td>\n");
                        echo("<td>{$row['nomeentidade']}</td>\n");

                        echo("<td><a href=\"remove.php?table=meioapoio&value1={$row['nummeio']}&value2={$row['nomeentidade']}\">Remove</a></td>\n");
                        echo("</tr>\n");
                    }
                    echo("</table>\n");

                //MeioSocorro (numMeio, nomeEntidade)
                $sql = "SELECT nummeio, nomeentidade FROM meiosocorro;";
                $result = $db->prepare($sql);
                $result->execute();

                    echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
                    echo("<tr><caption>MeioSocorro</caption></tr>");
                    echo("<tr><td>numMeio</td>");
                    echo("<td>nomeEntidade</td></tr>");

                    echo("<form action=\"inserir.php\" method=\"get\">");
                    echo("<input type=\"hidden\" name=\"table\" value=\"meiosocorro\"/>");
                    echo("<tr><td><input type=\"text\" name=\"nummeio\"/></td>\n");
                    echo("<td><input type=\"text\" name=\"nomeentidade\"/></td>\n");
                    echo("<td><input type=\"submit\" value=\"Inserir\"/></td> </tr>\n");
                    echo("</form>");

                    foreach($result as $row)
                    {
                        echo("<tr>\n");
                        echo("<td>{$row['nummeio']}</td>\n");
                        echo("<td>{$row['nomeentidade']}</td>\n");

                        echo("<td><a href=\"remove.php?table=meiosocorro&value1={$row['nummeio']}&value2={$row['nomeentidade']}\">Remove</a></td>\n");
                        echo("</tr>\n");
                    }
                    echo("</table>\n");


					//Alterar
					echo("<form action=\"editar.php\" method=\"get\">");

					echo("<table border=\"1\" cellspacing=\"5\" style=\"float: left;display: inline-block;\">\n");
					echo("<tr><caption>Editar Meio</caption></tr>");
					echo("<tr><td><input type=\"text\" name=\"table\"/></td>");
					echo("<td>numMeio</td>");
					echo("<td>nomeEntidade</td></tr>");

					echo("<tr><td>Valor Antigo</td>");
					echo("<td><input type=\"text\" name=\"nummeioA\"/></td>\n");
					echo("<td><input type=\"text\" name=\"nomeentidadeA\"/></td></tr>\n");

					echo("<tr><td>Valor Novo</td>");
					echo("<td><input type=\"text\" name=\"nummeio\"/></td>\n");
					echo("<td><input type=\"text\" name=\"nomeentidade\"/></td></tr>\n");

					echo("<tr><td><input type=\"submit\" value=\"Submit\"/></td></tr>");

					echo("</table>\n");
					echo("</form>");


			$db = null;

		} catch (PDOException $e){
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
		?>

		<!-- -->
	</body>
</html>
