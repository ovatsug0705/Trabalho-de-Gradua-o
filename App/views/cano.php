<main class="canon">
	 <form action="http://tg.working:81/filtro/can">
	<label for="test">Texto a ser procurado</label>
	<input type="text" name="t" id="test">
	
	<input type="submit" value="enviar">
</form>
  <div class="canon__holder content">
  <h1 class="title canon__title">Código de Direito Canônico</h1>
    <?php
      for ($i = 0; $i < count($data); $i++) {
        echo "<p class=\"canon__paragraph\"> <span class=\"canon__number\">{$data[$i]['numero']}</span> {$data[$i]['texto']} </p>";
      }
    ?>
  </div>
</main>
