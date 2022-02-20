<?php

if (empty($_GET["id"])) {
	die("um id é necessário para acessar");
}

$username = "root";
$password = "";
$pdo2 = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);

$consulta_forum = $pdo2->query("SELECT * FROM forum WHERE id=" . $_GET["id"]);

$forum = [];
while ($linha_forum = $consulta_forum->fetch(PDO::FETCH_ASSOC)) {
    $forum = [
        "id" => $linha_forum['id'],
        "titulo_forum" => $linha_forum['titulo_forum'],
        "mini_titulo_forum" => $linha_forum['mini_titulo_forum'],
        "imagem_forum" => $linha_forum['imagem_forum'],
        "texto1_forum" => $linha_forum['texto1_forum'],
        "texto2_forum" => $linha_forum['texto2_forum']
    ];
}

?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="responsive.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<title> Newscore - Seu estádio dos stats! </title>
</head>

<body>
	<nav class="navbar justify-content-between">
		<a class="nav-drop" style="visibility: hidden;"> <button class="navbar-toggler navbar-dark p-2" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<p>MENU </p>
		</a>
		<a href="index.html" class="logo-nav"><img src="imagens/logo.png" alt="Newscore" /></a>
		<a href="telalogin/Login_v1/index.html" class="nav-drop"><img src="imagens/user-face.png" style="width:37px;height:37px;" class="p-1" />
			<p> ENTRAR </p>
		</a>
	</nav>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>
	<div class="container body-container">
		<div class="row main-row">
			<center><h1><?= $forum['titulo_forum'] ?></h1></center>
			<center><h4><?= $forum['texto1_forum'] ?></h4></center>
			<img src='<?= $forum['imagem_forum'] ?>' class="img-fluid" />
			<div class="informacao-privilegiada">
				<center><p style="font-size:22px;text-align:justify"><?= $forum['texto2_forum'] ?></p></center>
			</div>
			
		</div>
	</div>
	<div class="footer">
        <div class="container footer-container">
            <div class="left-logo-footer">
                <a href="index.php"><img src="imagens/logo.png" class="logo-footer" /></a>
                <div>
                    <p> Fique por dentro das informações
                        <br> do futebol brasileiro!
                    </p>
                </div>
            </div>
            <div class="menu-center-footer">
                <h4> MENU </h4>
                <ul class="menu-footer">
                    <!-- <li> Times </li> -->
                    <li><a href="tabela.html"> Tabela e Jogos </a></li>
                </ul>
            </div>
            <div class="sidebar-right-footer-main">
                <h4> CONTATO </h4>
                <ul class="sidebar-right-footer">
                    <li><img src="imagens/envelope.png" height="28px" width="28px" />equipe@newscore.com.br </li>
                </ul>
            </div>
        </div>
    </div>

    <footer>
        &copy; Newscore 2021. Todos os direitos reservados.
    </footer>

</body>

</html>