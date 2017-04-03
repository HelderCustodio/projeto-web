<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="utf-8"/>
      <title> Formulário de Contato </title>
      <link rel="stylesheet" type="text/css" href="../_css/estilo.css"/>
      <link rel="stylesheet" type="text/css" href="../_css/form.css">
      <script language="javascript" src="../_javascript/funcoes.js">
      </script>
    </head>
    <body>
        <div id="interface">
            <header id="cabecalho">
                <nav id="menu">
                    <h1> Menu Principal </h1>
                       <ul>
                <a href="index.html" onMouseOver="mudaFoto('../_imagens/home.png')" onMouseOut="mudaFoto('../_imagens/glass-oculos-preto-peq.png')">
                  <li> Home </li>
                </a>
                           <a href="specs.html" onMouseOver="mudaFoto('../_imagens/especificacoes.png')"
                   onMouseOut="mudaFoto('../_imagens/glass-oculos-preto-peq.png')"> <!-- chama a função que muda a foto quando passa o mouse lá -->
                  <li> Especificações </li>
                </a>
                           <a href="../fotos.html" onMouseOver="mudaFoto('../_imagens/fotos.png')" onMouseOut="mudaFoto('../_imagens/glass-oculos-preto-peq.png')">
                  <li> Fotos </li>
                </a>
                           <a href="../multimida.html" onMouseOver="mudaFoto('../_imagens/multimidia.png')" onMouseOut="mudaFoto('../_imagens/glass-oculos-preto-peq.png')">
                  <li> Multimídia </li>
                </a>
                           <a href="../fale-conosco.html" onMouseOver="mudaFoto('../_imagens/contato.png')" onMouseOut="mudaFoto('../_imagens/glass-oculos-preto-peq.png')">
                  <li> Fale conosco </li>
                </a>
                      </ul>
          </nav>
                <hgroup id="titulo">
                    <h1> Google Glass </h1>
                    <h2> A revolução do Google está chegando </h2>
                </hgroup>
                    <img id="icone" src="../_imagens/glass-oculos-preto-peq.png"/>
            </header>
            <section id="corpo-inteiro"> <!-- html5 semântico - só serve para os motores de busca -->
        <article id="noticia"> <!-- outro elemento semântico -->
           <header> <!-- semântico também -->
              <hgroup> <!-- semântico -->
                 <h3> Fale Conosco > Contato </h3>
                 <h1> Formulário de Contato </h1>
                 <h2>por Gustavo Guanabara</h2>
                 <h3 class="direita"> Atualizado em 01/Maio/2013 <h3>
              </hgroup>
            </header>


<?php
	
	include 'config.inc.php';

	// recupera os dados do formulário
	$nome = $_POST["tNome"];
	$senha = $_POST["tSenha"];
	$email = $_POST["tEmail"];
	$sexo = $_POST["tSexo"];
	$data = $_POST["tData"];
	$logradouro = $_POST["tLogradouro"];
	$numero = $_POST["tNumero"];
	$estado = $_POST["tEstado"];
	
	

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
    	die("Falha na conexão: " . mysqli_connect_error());
	}
	
	$sql = "INSERT INTO cliente (nome, senha, email, sexo, data, logradouro, numero, estado)
	VALUES ('$nome', '$senha', '$email', '$sexo', '$data', '$logradouro', '$numero', '$estado')";

	if (!mysqli_query($conn, $sql)) {
    	echo "<br/> Erro: " . $sql . "<br>" . mysqli_error($conn);
	} 

	// vamos consultar os dados do banco
	echo "<br/><br/>";
	echo "<table border=\"1\">";
	echo "<tr>";
	echo "<th> Nome </th> <th> Senha </th> <th> Email </th>";
	echo "<th> Sexo </th> <th> Data </th> <th> Logradouro </th>";
	echo "<th> Número </th> <th> Estado </th> <th> Remover </th> <th> Atualizar </th>";
	echo "</tr>";
	$sql = "select * from cliente";
	$resultado = mysqli_query($conn, $sql);
	if (mysqli_num_rows($resultado) > 0){
		while ($registro = mysqli_fetch_assoc($resultado)){
			echo "<tr>";
			echo "<td>" . $registro["nome"] . "</td>";
			echo "<td>" . $registro["senha"] . "</td>";
			echo "<td>" . $registro["email"] . "</td>";
			echo "<td>" . $registro["sexo"] . "</td>";
			echo "<td>" . $registro["data"] . "</td>";
			echo "<td>" . $registro["logradouro"] . "</td>";
			echo "<td>" . $registro["numero"] . "</td>";
			echo "<td>" . $registro["estado"] . "</td>";
			echo "<td> <a href=\"remove.php?codigo=$registro[codigo]\"> <img src=\"../_imagens/remove.png\"/> </a> </td>";  
			echo "<td> <a href=\"atualiza.php?codigo=$registro[codigo]\"> <img src=\"../_imagens/atualiza.jpg\"/> </a> </td>";
			echo "</tr>";
		}
	}
	echo "</table>";
	mysqli_close($conexao);

	mysqli_close($conn);
?>

        </article>
            </section>
    <footer id="rodape">
      <p>Copyright 2013 - by Gustavo Guanabara<br/>
        Facebook | Twitter</p>
        <footer>
    </div>
    </body>
</html>
