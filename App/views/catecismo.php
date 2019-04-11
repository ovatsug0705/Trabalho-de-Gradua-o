<?php
use App\controllers\Controller;
?>
<div>
    <pre>
        <?php 
            $data = Controller::$catecismoData;
            var_dump(Controller::$catecismoData);
        ?>
    </pre>
    <?php
        for ($i=0; $i < count($data); $i++) { 
            echo '<h1 style=\"color: red;\">' . $data[$i]['texto'] . '</h1>';
        }
    ?>
    
</div>