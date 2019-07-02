<div>
   <h1>Encíclica<h1>
</div>

 <form action="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>/filtro/enc">
	<label for="test">Texto a ser procurado</label>
	<input type="text" name="t" id="test">
	
	<input type="submit" value="enviar">
</form>

<?php
echo '<pre>';
var_dump($data);