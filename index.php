<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Gustavo da Silva Gomes">
    <meta keywords="Bíblia, Catecismo, Encíclica">
    <title>Vida Cristã</title>
    <link rel="stylesheet" href="dist/styles/main.css">
</head>
<body>
    <h1 data-title>Hello world</h1>
    <?php 
        require_once 'vendor/autoload.php';
        use App\route\Router;

        echo '<br/>index<br/>';
        
        $route = new Router();
        $route->verifyUrl();
        $route->routing();
    ?>
    <script src="dist/scripts/main.js"></script>
</body>
</html>


