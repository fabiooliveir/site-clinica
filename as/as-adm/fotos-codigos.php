﻿<!doctype html>
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php';?>	
</head>

<body>
    <?php  include'topo-mobile.php';?>

    <?php  include'topo.php';?>	

	<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">
	
<div id="sistemas-infos">
	
<div id="grid12">		
<div class="ferramentas-painel-logo"><img src="img/icons/fotos.png" width="100%"/></div>
<div class="alinha6">GALERIA DE FOTOS CÓDIGOS</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> fotos</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/capa_galeria</div>	

<div id="codigos_php">
<strong>Título:</strong> $titulo<BR><BR>
<strong>Local:</strong> $local<BR><BR>
<strong>Imagem:</strong> $imagem<BR><BR>
<strong>Descrição da Galeria:</strong> $desc<BR><BR>
<strong>Data de Cadastro:</strong> $data_cadastro<BR><BR>	
</div>
	
	
	
	
	
<div id="grid12">		
<div class="ferramentas-painel-logo"><img src="img/icons/fotos.png" width="100%"/></div>
<div class="alinha6">FOTOS DA GALERIA CÓDIGOS</div>
</div>
	
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> fotos_galeria</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/fotos_galeria</div>	

<div id="codigos_php">
<strong>Id da Galeria:</strong> $postid<BR><BR>
<strong>Imagem:</strong> $imagem<BR><BR>
</div>

	
<div id="codigos_php"><strong>Exemplo de utilização:</strong> 
<br><br><br>
SELECT * FROM fotos_galeria WHERE postid = '$id'</div>	
	
</div></div>
	 
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>