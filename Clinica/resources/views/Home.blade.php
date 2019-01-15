<!DOCTYPE html>
<html>
<head>
	<title>
		Atividade 1
	</title>
</head>
<body>
<div>
	<h1> Clínica Dentária</h1>
	<li>
		<a href= "cadastro">Cadastrar

		</a>
	</li>
	<br>
	<h2> Inicio </h2>
	<br>
	<ul >


		<br>
		<br>
		<h3>Clínica Filial</h3>
		<table border="1">
			<tr>
				<th>Dia</th>
				<th>Horário de atendimento</th>
				<th>Dentista</th>

			</tr>

			<?php
				//aqui é onde acontece o looping para criação das tabelas que serão exibidas mostrnado rspectivamente dias com horarios e os dentistas que atenderão nesses dias (esse mesmo código é feito logo depois para exibir a tabela da outra clinica)
				for($i = 0;$i<5;$i++){
                    $contador=0;
                    $arr = array("Segunda", "Terça", "Quarta","Quinta","Sexta");
                    echo "<tr>";
					foreach($dadosFilial as $dados){
					 	if($dados['dia'] == $arr[$i]){
							echo "<th>". $dados['dia'] ."</th>";
                            echo "<th>". $dados['horario'] ."</th>";
                            echo "<th>". $dados['nomeDentista'] ."</th>";
                            $contador++;
                            break;
						}

					}
					if($contador==0){
                        echo "<th>". $arr[$i] ."</th>";
                        echo "<th> -- </th>";
                        echo "<th> -- </th>";
					}else{
					    $contador==0;
					}
					echo"</tr>";
				}
				?>

		</table>

		<br>
		<br>
		<h3>Clínica Matriz</h3>
		<table border="1">
			<tr>
				<th>Dia</th>
				<th>Horário de atendimento</th>
				<th>Dentista</th>
			</tr>
            <?php
            $contador=0;
            for($i = 0;$i<5;$i++){
                $contador=0;
                $arr = array("Segunda", "Terça", "Quarta","Quinta","Sexta");
                echo "<tr>";
                foreach($dadosMatriz as $dados){
                    if($dados['dia'] == $arr[$i]){
                        echo "<th>". $dados['dia'] ."</th>";
                        echo "<th>". $dados['horario'] ."</th>";
                        echo "<th>". $dados['nomeDentista'] ."</th>";
                        $contador++;
                        break;
                    }
                }
                if($contador==0){
                    echo "<th>". $arr[$i] ."</th>";
                    echo "<th> -- </th>";
                    echo "<th> -- </th>";
                }else{
                    $contador==0;
                }
                echo"</tr>";
            }
            ?>
		</table>
	</ul>

</div>
<br>
<br>

<br>
<table>

</table>
<div>

	</form>

</div>


</body>
</html>