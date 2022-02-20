<?php 

$titulo_forum = $_POST['titulo_forum'];
$subtitulo_forum = $_POST['mini_titulo_forum'];
$imagem_forum = $_FILES['imagem_forum'];
$texto1_forum = $_POST['texto1_forum'];
$texto2_forum = $_POST['texto2_forum'];

$destino_forum = "";
$path_forum = "";
if ( isset( $_FILES[ 'imagem_forum' ][ 'name' ] ) && $_FILES[ 'imagem_forum' ][ 'error' ] == 0 ) {
    $path_forum = 'imagensPosts/' . $_FILES['imagem_forum']['name'];
    $destino_forum = '../' . $path_forum;
     $arquivo_tmp = $_FILES['imagem_forum']['tmp_name'];	
    move_uploaded_file( $arquivo_tmp, $destino_forum);
}

$username = "root";
$password = "";
try {
    $conn = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO forum (titulo_forum, mini_titulo_forum, imagem_forum, texto1_forum, texto2_forum) VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$titulo_forum, $subtitulo_forum, $path_forum, $texto1_forum, $texto2_forum]);

    if ($stmt->rowCount() > 0) {
        header("Location: http://localhost/news/Newscore/painel/reportagens.php?status=sucesso");
    }
    die();
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>