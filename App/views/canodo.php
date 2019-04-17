<?php
use App\controllers\Controller;
?>
<div>
    <?php
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        for ($i=0; $i < count($data); $i++) { 
            echo '<h1>' . $data[$i]['texto'] . '</h1>';
        }
    ?>
    
</div>