<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	


<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/exames.png" width="100%"/></div>
	
 

<?php
$sql = "SELECT * FROM exames ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">EXAMES ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<a href="exames-sequencia"><div class="painel-banner-botoes2"><img src="img/reorder.png" width="100%"/></div></a>
<a href="exames-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>
<a href="exames-cadastrar"><div class="painel-banner-botoes1"><a href="exames-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>

</div></div></div>

<div id="painel-cliente">	

<ul id="sortable" >
	
<?php

$sql = "SELECT * FROM exames ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo']; if(strlen($titulo) > 17){ $titulo = substr($titulo, 0,  17) . "...";}
$titulo_slug = $res ['titulo_slug'];
$data_cadastro = $res ['data_cadastro'];	
$desc = $res ['desc'];
$posicao = $res ['posicao'];
$filial_bueno = $res ['filial_bueno'];
$filial_universitario = $res ['filial_universitario'];
$filial_anapolis = $res ['filial_anapolis'];
$filial_1 = $res ['filial_1'];
$icone = $res ['icone'];
$imagem = $res ['imagem'];
$i++;

echo "	

<div id=\"painel-banner-listagem3\">
<div class=\"painel-banner-text-produtos\"><a title=\"Data de Cadastro: $data_cadastro\">$i</a></div>
";

$sql2 = "SELECT * FROM categorias WHERE tipo ='Exames'";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){

$categoriax = $res['categoria'];}
	
echo"<div class=\"painel-banner-text-produtos\"><a title=\"Categoria: $categoriax\">$titulo</a></div>";



echo"
<div style=\"width: 100%; float: left;\"><div id=\"painel-banner-listagemIcon-center-produtos\"\">

<div class=\"painel-banner-listagem-icon\" style=\"margin-left: 80px; \"><a href=\"exames-editar?id=$id\"><img src=\"img/editar2.png\"/ title=\"Editar\"></a></div>

<div  class=\"painel-banner-listagem-icon\"><a href=\"imagem-png-exames?id=$id\"><img src=\"img/icon-icon.png\"/ title=\"Editar Ícone\"></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='exames?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\" title=\"Excluir\"><img src=\"img/excluir2.png\"/></a>

</div></div></div>";

if ($imagem==''){echo"<div id=\"showprodutos\"><img src=\"avatar.jpg\" width=\"100%\"></div></div>";}
else {echo"<div id=\"showprodutos\"><img src=\"../img2/exames/$imagem\" width=\"100%\"></div></div>";}


 }?> 


</ul>
	

	
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
$sql = "DELETE FROM `exames` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


</body>
</html>