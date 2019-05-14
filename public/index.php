<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta author="Gustavo da Silva Gomes">
    <meta keywords="Bíblia, Catecismo, Encíclica">
    <title>Vida Cristã</title>
</head>
<body>
    <?php
        include './../App/views/partials/header.php';
        include './../App/views/partials/menu.php';
    ?>
    <?php
        require_once './../vendor/autoload.php';
        use App\route\Router;


        $route = new Router();

        $route->verifyUrl();
        $route->routing();
    ?>
    <?php
        include './../App/views/partials/footer.php';
    ?>
    <link rel="stylesheet" href="/dist/styles/main.css">
    <script src="/dist/scripts/main.js"></script>
</body>
</html>


