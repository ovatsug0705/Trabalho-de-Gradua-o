<?php 
echo '<br/>index<br/>';

//se tentou acessar alguma coisa da url
if (isset($_GET['url']) && !empty($_GET['url'])) {
    $url = $_GET['url'];
} else {
    $url = 'home';
}

$url = array_filter(explode("/", $url));

$file = 'controllers/' . $url[0]. '.php';

if (is_file($file)) {
    require 'controllers/controller.php';
}
else if ($url[0] == 'home') {
    require 'views/home.php';    
}
else {
    require 'views/404.php';
}

?>
<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Gustavo da Silva Gomes">
    <meta keywords="Bíblia, Catecismo, Encíclica">
    <title>Document</title>
    <link rel="stylesheet" href="dist/styles/main.css">
</head>
<body>
    <h1 data-title>Hello world</h1>
    <script src="dist/scripts/main.js"></script>
</body>
</html> -->


