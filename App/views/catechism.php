 <form action="http://tg.working:81/filtro/cic">
	<label for="test">Texto a ser procurado</label>
	<input type="text" name="t" id="test">
	
	<input type="submit" value="enviar">
</form>
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