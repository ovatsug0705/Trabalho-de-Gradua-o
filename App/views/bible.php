<div>
    <div>
    <h1>Bíblia<h1>
    </div>
    <?php
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    ?>
    <form action="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}";?>/filtro/bib">
    	<label for="test">Texto a ser procurado</label>
    	<input type="text" name="t" id="test">
    	
    	<label for="livros">Livros</label>

    	<input type="radio" checked name="p" id="all" value="all">
    	<label for="all">Todos</label>

    	<input type="radio" name="p" id="old" value="old">
    	<label for="old">Antigo testamento</label>

    	<input type="radio" name="p" id="new" value="new">
    	<label for="new">Novo testamento</label>
    	
    	<input type="radio" name="p" id="customized" value="customized">
		<label for="customized">Customizado</label>


		<input type="checkbox" name="b[]" id="lucas" value="lucas">
    	<label for="lucas">Lucas</label>

    	<input type="checkbox" name="b[]" id="genesis" value="genesis">
    	<label for="genesis">Genesis</label>

    	<input type="checkbox" name="b[]" id="salmos" value="salmos">
    	<label for="salmos">Salmos</label>


    	<input type="submit" value="enviar">
    </form>

    <form action="<?php echo (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";?>filtro/pas" method="get" accept-charset="utf-8">
    	<label for="livro">Livro</label>
    	<select name="l" id="livro">
    		<option value="lucas">Lucas</option>
    		<option value="genesis">Gênesis</option>
    		<option value="lucas">Salmos</option>
    	</select>

    	<label for="cap">Capítulo</label>
    	<select name="c" id="cap">
    		<option value="1">1</option>
    		<option value="2">2</option>
    		<option value="3">3</option>
    	</select>

    	<input type="submit" value="enviar">
    </form>
</div>