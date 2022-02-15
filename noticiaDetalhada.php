<?php

if (empty($_GET["id"])) {
	die("um id é necessário para acessar");
}

$username = "root";
$password = "";
$pdo = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);

$consulta = $pdo->query("SELECT * FROM posts WHERE id=" . $_GET["id"]);

$noticia = [];
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	$noticia = [
		"id" => $linha['id'],
		"titulo" => $linha['titulo'],
		"imagem" => $linha['imagem'],
		"texto1" => $linha['texto1'],
		"texto2" => $linha['texto2'],
	];
}

?>



<h1><?= $noticia['titulo'] ?></h1>
<h4><?= $noticia['texto1'] ?></h4>
<img src='<?= $noticia['imagem'] ?>' class="img-fluid" />
<p><?= $noticia['texto2'] ?></p>
