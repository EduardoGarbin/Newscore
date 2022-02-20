<?php

session_start();

$username = "root";
$password = "";
$pdo = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);
$pdo2 = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);

$consulta = $pdo->query("SELECT * FROM posts ORDER BY id DESC;");
$consulta_forum = $pdo2->query("SELECT * FROM forum ORDER BY id DESC;");

$noticias = [];
$forum = [];

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $noticias[] = [
        "id" => $linha['id'],
        "titulo" => $linha['titulo'],
        "mini_titulo" => $linha['mini_titulo'],
        "imagem" => $linha['imagem'],
        "texto1" => $linha['texto1'],
        "texto2" => $linha['texto2']
    ];
}
while ($linha_forum = $consulta_forum->fetch(PDO::FETCH_ASSOC)) {
    $forum[] = [
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
        <?php

        if (!empty($_SESSION) && ($_SESSION['username'] == 'Thaciano')) {
            echo '<a href="painel/reportagens.php"><span style="font-weight:bold;font-size:20px;"> PAINEL DE ADM </span></a>';
        } else {
            echo '<div style="visibility:hidden"></div>';
        }

        ?>
        <a href="index.html" class="logo-nav"><img src="imagens/logo.png" alt="Newscore" /></a>
        <?php
        if (!empty($_SESSION) && ($_SESSION['loggedin'])) {
            echo "<span>" . $_SESSION['username'] . "<a href='../logout.php'><span> (Deslogar) </span></a></span>";
        } else {
            echo '<a href="../login.php" class="nav-drop"><img src="imagens/user-face.png" style="width:37px;height:37px;" class="p-1" />
            <p> ENTRAR </p>
        </a>';
        }
        ?>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <div class="container body-container">
        <div class="row main-row">
            <!-- Reportagem principal -->
            <div class="main-news">
                <a href="noticiaDetalhada.php?id=<?= $noticias[0]['id'] ?>">
                    <img class="img-fluid img-fill" src="<?= $noticias[0]['imagem'] ?>">
                    <label class="main-titulo"> <?= $noticias[0]['titulo'] ?> </label>
                    <label class="main-subtitulo"> <?= $noticias[0]['texto1'] ?> </label>
                </a>
            </div>
            <!-- Reportagens secundárias -->
            <div class="secondary-news d-flex flex-column responsive-secondary-news">
                <div class="other-news">
                    <a href="noticiaDetalhada.php?id=<?= $noticias[1]['id'] ?>">
                        <img class="img-fluid" src="<?= $noticias[1]['imagem'] ?>">
                        <label class="titulo"> <?= $noticias[1]['titulo'] ?> </label>
                        <label class="subtitulo"> <?= $noticias[1]['texto1'] ?> </label>
                    </a>
                </div>
                <div class="other-news">
                    <a href="noticiaDetalhada.php?id=<?= $noticias[2]['id'] ?>">
                        <img class="img-fluid" src="<?= $noticias[2]['imagem'] ?>">
                        <label class="titulo"> <?= $noticias[2]['titulo'] ?> </label>
                        <label class="subtitulo"> <?= $noticias[2]['texto1'] ?> </label>
                    </a>
                </div>
            </div>
        </div>

        <div class="secondary-row">
            <!-- Notícias e fóruns sobre os times do Brasileirão -->
            <div class="row-letter">
                <?php
                for ($i = 3; $i < count($noticias) - 1; $i++) {
                    echo '<hr><div class="news">
								<a href="noticiaDetalhada.php?id=' . $noticias[$i]['id'] . '">
									<div class="image-info">
										<img class="img-fluid" src="' . $noticias[$i]['imagem'] . '" />
									</div>
									<div class="text-info">
										<p> ' . $noticias[$i]['mini_titulo'] . ' </p>
										<h4> ' . $noticias[$i]['titulo'] . ' </h4>
										<ul>
											<li> ' . $noticias[$i]['texto1'] . ' </li>
										</ul>
									</div>
								</a>
							</div>';
                }
                ?>
                <hr>
                <div class="news">
                    <a href="reportagem.html">
                        <div class="image-info">
                            <img class="img-fluid" src="imagens/feminino.jpg" />
                        </div>
                        <div class="text-info">
                            <p> time feminino </p>
                            <h4> A equipe feminina segue invicta no Gauchão </h4>
                            <ul>
                                <li> Grêmio se aproxima do rival </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="news">
                    <a href="reportagem.html">
                        <div class="image-info">
                            <img class="img-fluid" src="imagens/onibus.jpg" />
                        </div>
                        <div class="text-info">
                            <p> viagem </p>
                            <h4> Problemas no ônibus impediram viagem do Grêmio à Salvador </h4>
                            <ul>
                                <li> Jogo poderá ser adiado </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="news">
                    <a href="reportagem.html">
                        <div class="image-info">
                            <img class="img-fluid" src="imagens/mulher.jpg" />
                        </div>
                        <div class="text-info">
                            <p> categorias de base feminina </p>
                            <h4> A equipe Sub-20 do Grêmio perde para o Palmeiras </h4>
                            <ul>
                                <li> Situação do Imortal complica no campeonato </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="news">
                    <a href="reportagem.html">
                        <div class="image-info">
                            <img class="img-fluid" src="imagens/onibus.jpg" />
                        </div>
                        <div class="text-info">
                            <p> viagem </p>
                            <h4> Problemas no ônibus impediram viagem do Grêmio à Salvador </h4>
                            <ul>
                                <li> Jogo poderá ser adiado </li>
                            </ul>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="news">
                    <a href="reportagem.html">
                        <div class="image-info">
                            <img class="img-fluid" src="imagens/onibus.jpg" />
                        </div>
                        <div class="text-info">
                            <p> viagem </p>
                            <h4> Problemas no ônibus impediram viagem do Grêmio à Salvador </h4>
                            <ul>
                                <li> Jogo poderá ser adiado </li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
            <div class="tab">
                <!-- Tabela Brasileirão (5 primeiros times) -->
                <div class="tabela">
                    <table class="table table-hover">
                        <thead>
                            <tr class="cabeca-tabela">
                                <th scope="col" colspan="3"> CLASSIFICAÇÃO </th>
                                <th scope="col"> P </th>
                                <th scope="col"> V </th>
                            </tr>
                        </thead>
                        <tbody id='tabela-brasileirao'>
                        </tbody>

                    </table>
                    <div class="ir-tabela-completa">
                        <a href="tabela.html"> Ver tabela completa
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="tabela">
                    <div class="agenda">
                        <div class="titulo-agenda">
                            <h4> Agenda do dia </h4>
                            <hr>
                        </div>
                        <div class="jogos-dia" id="jogos">
                            <p> HOJE CAMPEONATO BRASILEIRO 21:30 </p>
                            <div class="confrontos">
                                <div class="confrontos-times">
                                    <span> GRE </span>
                                    <img src="imagens/gremio.svg" />
                                    <p class="duelo"> X </p>
                                    <img src="imagens/sao-paulo.svg" />
                                    <span> SAO </span>
                                </div>
                            </div>
                            <hr>
                            <p> HOJE CAMPEONATO BRASILEIRO 21:30 </p>
                            <div class="confrontos">
                                <div class="confrontos-times">
                                    <span> ATM </span>
                                    <img src="imagens/atletico-mg.svg" />
                                    <p class="duelo"> X </p>
                                    <img src="imagens/bahia.svg" />
                                    <span> BAH </span>
                                </div>
                            </div>
                            <hr>
                            <p> HOJE CAMPEONATO BRASILEIRO 21:30 </p>
                            <div class="confrontos">
                                <div class="confrontos-times">
                                    <span> FLA </span>
                                    <img src="imagens/Flamengo-2018.svg" />
                                    <p class="duelo"> X </p>
                                    <img src="imagens/sport.svg" />
                                    <span> SPO </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="ir-tabela-completa">
                            <a href="tabela.html"> Mais Jogos
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tabela responsive-blog-colunas">
                    <div class="blogs-colunas">
                        <div class="titulo-blog">
                            <h4> Blogs e colunas </h4>
                        </div>
                        <hr>
                        <?php
                        for ($f = 0; $f < 3; $f++) {
                            echo
                            '<div class="info-blog">
                                <a href="noticiaForum.php?id=' . $forum[$f]['id'] . '">
                                    <div class="texto-blog">
                                        <h5> ' . $forum[$f]['titulo_forum'] . ' </h5>
                                        <p> ' . $forum[$f]['mini_titulo_forum'] . ' </p>
                                    </div>
                                    <div class="imagem-blog">
                                        <img src="' . $forum[$f]['imagem_forum'] . '" style="width:94px;height:94px;" />
                                    </div>
                                </a>
                            </div>
                            <hr>';
                        }
                        ?>

                    </div>
                </div>
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
<script>
    $.ajax({
        url: "https://api.api-futebol.com.br/v1/campeonatos/10/tabela",
        headers: {
            "Authorization": "Bearer live_7502b99e142ea542c6938c51e6db9c"
        },
        type: "GET",
        success: function(data) {

            for (let i = 0; i < 5; i++) {
                const element = data[i];
                console.log(element)
                $("#tabela-brasileirao").append("<tr>" +
                    "<td>" + element.posicao + "</td>" +
                    "<td class='escudo-times'><img class='banana' src='" + element.time.escudo +
                    "'/></td>" +
                    "<td class='sigla-times'>" + element.time.sigla + "</td>" +
                    "<td class='pontos-times'>" + element.pontos + "</td>" +
                    "<td>" + element.vitorias + "</td>" +
                    "</tr>")
            }
        }
    });
</script>

</html>