<?php

$mensagemPraNaoQuebrar = "";

if (!empty($_GET["status"])) {
	$mensagemPraNaoQuebrar = $_GET["status"];	
}
?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="reportagens.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title> Reportagens </title>
</head>

<body>
    <nav class="navbar navbar-primary bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white"> NEWSCORE </span>
        </div>
    </nav>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar-bootstrap" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <span class="fs-4"> Navegue </span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link link-dark" aria-current="page">
                        <img src="casa-unica.png" height="25" width="25" /> Página Inicial
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <img src="noticia.png" height="25" width="25" /> Reportagens
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-dark">
                        <img src="bate-papo.png" height="25" width="25" /> Fóruns
                    </a>
                </li>
            </ul>
            <hr>
            <div class="d-flex flex-row align-items-center">
                <span class="fs-6 fw-light p-1"> © 2022 </span><span class="p-1"> - </span><strong>
                    <p class="text-primary font-weight-bold m-0 p-1 fs-6"> Newscore </p>
                </strong>
            </div>
        </div>
        <div class="container d-flex flex-column">
            <div class="reportagens">
                <span class="fs-1 text-primary font-weight-bold" id="titulo-geral"> REPORTAGENS </span>
            </div>
			<div>
				<span class="text-success"><?= strtoupper($mensagemPraNaoQuebrar) ?></span>
			</div>
            <div class="container pick-filter">
                <div>
                    <span class="fs-1 text-primary font-weight-bold"> ACESSE UMA PÁGINA </span>
                </div>
                <div class="items-filter">
                    <div class="square" id="clicarReportagem">
                        <img src="noticia.png" />
                        <span> Reportagens </span>
                    </div>
                    <div class="square" id="clicarForum">
                        <img src="bate-papo.png" />
                        <span> Fóruns </span>
                    </div>
                </div>
            </div>


            <form method="post" action="salvarPost.php" enctype="multipart/form-data">
                <div class="item">
                    <div class="titulo-2">
                        <label> Título </label>
                    </div>
                    <input type="text" name="titulo" class="form-control" />
                </div>
                <div class="item">
                    <div class="imagem">
                        <label> Imagem </label>
                    </div>
                    <input type="file" name="imagem" />
                </div>
                <div class="item">
                    <div class="texto">
                        <label> Texto 1</label>
                    </div>
                    <textarea name="texto1" class="form-control" rows="4"></textarea>
                </div>
				<div class="item">
                    <div class="texto">
                        <label> Texto 2</label>
                    </div>
                    <textarea name="texto2" class="form-control" rows="4"></textarea>
                </div>
                <button id="botao" class="btn btn-primary"> Voltar </button>
				<button id="enviar" type="submit" class="btn btn-success"> Enviar </button>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
            <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
            <script>
                $('form').css("display", "none");

                $('#clicarForum').click(function() {
                    $('#titulo-geral').text('FÓRUM');
                    $('form').show();
                    $('.pick-filter').hide();

                })
                $('#botao').click(function() {
                    $('#titulo-geral').text('REPORTAGENS');
                    $('form').hide();
                    $('.pick-filter').show();
                })

                $('#clicarReportagem').click(function() {
                    $('#titulo-geral').text('REPORTAGEM');
                    $('form').show();
                    $('.pick-filter').hide();
                })
            </script>
</body>

</html>
