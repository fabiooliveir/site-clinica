<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/fotos.png" width="100%"/></div>
	

<?php
$sql = "SELECT * FROM fotos ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">GALERIA DE FOTOS ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="fotos-cadastrar"><div class="painel-banner-botoes1"><a href="fotos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">	
	
<?php

$sql = "SELECT * FROM fotos ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo'];
$data_cadastro = $res ['data_cadastro'];
$imagem = $res ['imagem'];	
$desc = $res ['desc'];	
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$titulo</div>

<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href='fotos?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='fotos-galeria?id=$id'><img src=\"img/listagem.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href=\"fotos-editar?id=$id\"><img src=\"img/editar2.png\"/></a></div>
</div></div>

<div id=\"showbanner\"><img src=\"../img2/capa_galeria/$imagem\" width=\"100%\"></div>
</div>




"; }?>
	

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
	

<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'remove'){
$sql = "DELETE FROM `fotos` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


</body>
</html>