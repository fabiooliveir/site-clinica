<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
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
<div class="painel-cliente-icone"><img src="img/icons/portfolio.png" width="100%"/></div>
<div class="alinha14"><a href="banner">PORTFÓLIO</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="banner-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="portfolio-cadastrar.php"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$titulo = $_POST ['titulo'];
$titulo_slug = $_POST ['titulo_slug'];
$imagem = $_POST ['imagem'];
$posicao = $_POST ['posicao'];
$data_cadastro = $_POST ['data_cadastro'];
$desc = $_POST ['desc'];
		
$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');



setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    } 
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
     return $clean;}

$titulo_slug = toAscii($titulo);


	
$pasta = '../img2/portfolio';
$permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');	
$img = $_FILES['img'];
$countImg  = count($img['name']);

require('upload_func.php');		
for($i=0;$i<$countImg;$i++){
	
$tmp = $img['tmp_name'][$i];
$name = $img ['name'][$i];
$type = $img ['type'][$i];


if(!empty($name) && in_array($type, $permitido)){
$nome_imagem = 'asweb-' .md5(uniqid(rand(), true)).$i.'.jpg';
upload($tmp, $nome_imagem, 2000, $pasta);
chmod ("../img2/portfolio/$nome_imagem", 0777);
		 
$sql = "INSERT INTO `portfolio` (`id`, `titulo`, `titulo_slug`, `imagem`, `posicao` , `data_cadastro` , `desc`) 
VALUES (NULL, '$titulo', '$titulo_slug',   '$nome_imagem', '$posicao' , '$diaatual/$mesatual/$anoatual' , '$desc' )";
	
if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Portfólio cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
	
}}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}?>

<form  action='portfolio-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="titulo">Título:</label>
<input type="text" name="titulo" class="form3" required/>
</div>


<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 0x0px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>

<div id="formulario">
<label for="posicao">Posição:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Posição de exibição do serviço</span>
</div></label>
<select name="posicao" class="form3" required>
	<option value="">Posição</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
</select>
</div>
	
	
<div id="grid12E">
<label for="desc">Descrição:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição do serviço</span>
</div></label>
<textarea class='form4' name='desc'/></textarea>
</div>
	
	

</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div>
</div></div>
	
	</form>
	
	



<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>
	



</body>
</html>