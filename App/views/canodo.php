<main class="canon">
  <div class="canon__holder content">
  <h1 class="title canon__title">Código de Direito Canônico</h1>
    <?php
      for ($i = 0; $i < count($data); $i++) {
        echo "<p class=\"canon__paragraph\"> <span class=\"canon__number\">{$data[$i]['numero']}</span> {$data[$i]['texto']} </p>";
      }
    ?>
  </div>
</main>
