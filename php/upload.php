<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["img-noticia"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img-noticia"]["tmp_name"]);
    if($check !== false) {
        echo "Arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}
// Verifique se o arquivo já existe
if (file_exists($target_file)) {
    echo "Desculpe, o arquivo já existe.";
    $uploadOk = 0;
}
// Verifique  o tamanho arquivo
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Desculpe, seu arquivo é maior do que o permitido.";
    $uploadOk = 0;
}
// Permitir determinados formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Desculpe, só aceitamos esses tipos de arquivo: JPG, JPEG, PNG";
    $uploadOk = 0;
}
// Verifique se $ uploadOk está definido como 0 por um erro
if ($uploadOk == 0) {
    echo "Aquivo não enviado!";
// se tudo estiver ok, tente fazer o upload do arquivo
} else {
    if (move_uploaded_file($_FILES["img-noticia"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["img-noticia"]["name"]). " upload feito com sucesso.";
    } else {
        echo "Encontramos algum erro... Por favor reveja o arquivo";
    }
}
?>
