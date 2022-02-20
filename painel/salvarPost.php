<?php

	$titulo = $_POST["titulo"];
	$subtitulo = $_POST['mini_titulo'];
	$imagem = $_FILES["imagem"];
	$texto1 = $_POST["texto1"];
	$texto2 = $_POST["texto2"];

	$destino = "";
	$path = "";
	if ( isset( $_FILES[ 'imagem' ][ 'name' ] ) && $_FILES[ 'imagem' ][ 'error' ] == 0 ) {
		$path = 'imagensPosts/' . $_FILES['imagem']['name'];
		$destino = '../' . $path;
 		$arquivo_tmp = $_FILES['imagem']['tmp_name'];	
		move_uploaded_file( $arquivo_tmp, $destino  );
	}


	$username = "root";
	$password = "";
	try {
		$conn = new PDO('mysql:host=localhost;dbname=newscore', $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "INSERT INTO posts (titulo, mini_titulo, imagem, texto1, texto2) VALUES (?,?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$titulo, $subtitulo, $path, $texto1, $texto2]);

		if ($stmt->rowCount() > 0) {
			header("Location: http://localhost/news/Newscore/painel/reportagens.php?status=sucesso");
		}
		die();
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
?>
