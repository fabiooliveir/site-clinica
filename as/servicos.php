<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
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
<div class="painel-cliente-icone"><img src="img/icons/servicos.png" width="100%"/></div>
	

<?php
$sql = "SELECT * FROM servicos ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); ;
echo"<div class=\"alinha14\">SERVIÇOS ($linhas)</div>";?>
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
	
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="banner-cadastrar"><div class="painel-banner-botoes1"><a href="servicos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">	
	
<?php

$sql = "SELECT * FROM servicos ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$titulo= $res['titulo']; 
$data_cadastro = $res ['data_cadastro'];
$categoria = $res ['categoria'];
$imagem = $res ['imagem'];
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$titulo</div>";

$sql3 = "SELECT * FROM categorias WHERE tipo ='banner' and categoria_slug = '$categoria'";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){

$categoriax = $res['categoria'];
	
echo"<div class=\"painel-banner-text\">$categoriax</div>";}



echo"
<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href='servicos?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href=\"servicos-editar?id=$id\"><img src=\"img/editar2.png\"/></a></div>
</div>

<div class=\"painel-banner-listagem-icon\"><a href='servicos-fotos.php?id=$id&tipo=obra' title=\"Fotos do Serviço\"><img src=\"img/listagem.png\"/></a></div></div>

<div id=\"showbanner\"><img src=\"../img2/servicos/$imagem\" width=\"100%\"></div>
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
$sql = "DELETE FROM `servicos` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


</body>
</html>