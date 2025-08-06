<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mega-Sena</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f1f1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      text-align: center;
    }
    h1 {
      color: #2c3e50;
    }
    .numeros {
      display: flex;
      gap: 10px;
      margin: 20px 0;
      flex-wrap: wrap;
      justify-content: center;
    }
    .bola {
      background-color: #e67e22;
      color: white;
      font-size: 1.5em;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
    }
    .btn-sortear {
      padding: 10px 20px;
      font-size: 1em;
      background-color: #2980b9;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn-sortear:hover {
      background-color: #3498db;
    }
    #formulario {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }
    #formulario input {
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 200px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Sorteio da Mega-Sena</h1>

  <form id="formulario" method="POST">
    <label for="quantidadeInput" style="margin-bottom: 5px;">Digite a quantidade de bolas:</label>
    <input type="number" id="quantidadeInput" name="quantidade" placeholder="Quantidade entre 6 e 10" min="6" max="10" />
    <button class="btn-sortear" type="submit">Sortear</button>
  </form>

  <div class="numeros">
    <?php
      function gerarNumerosUnicos($quantidade, $min = 1, $max = 60) {
          $numerosSorteados = [];

          while (count($numerosSorteados) < $quantidade) {
              $num = rand($min, $max);
              if (!in_array($num, $numerosSorteados)) {
                  $numerosSorteados[] = $num;
              }
          }

          sort($numerosSorteados);
          return $numerosSorteados;
      }

      $quantidadeDeBolas = 6;

      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantidade'])) {
          $entrada = (int)$_POST['quantidade'];
          if ($entrada >= 6 && $entrada <= 10) {
              $quantidadeDeBolas = $entrada;
          }
      }

      $resultado = gerarNumerosUnicos($quantidadeDeBolas);

      foreach ($resultado as $numero) {
          echo "<div class='bola'>$numero</div>";
      }
    ?>
  </div>
</body>
</html>
