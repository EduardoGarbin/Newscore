<?php

	$titulo = $_POST["titulo"];
	$imagem = $_FILES["imagem"];
	$texto1 = $_POST["texto1"];
	$texto2 = $_POST["texto2"];

	if (empty($titulo)) {
		die("Tem q ter titulo");
	}

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

		$sql = "INSERT INTO posts (titulo, imagem, texto1, texto2) VALUES (?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$titulo, $path, $texto1, $texto2]);

		if ($stmt->rowCount() > 0) {
			header("Location: http://localhost/trabalhogarbin/Newscore/painel/reportagens.php?status=sucesso");
		}
		die();
	} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
?>
