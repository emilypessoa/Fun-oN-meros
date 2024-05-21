<!DOCTYPE html>
<html>
<head>
    <title>Verificação de Números</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Verificação de Números</h1>
        <form method="post" action="">
            <label for="numeros">Digite os números separados por vírgula:</label>
            <input type="text" id="numeros" name="numeros" required>
            <input type="submit" value="Verificar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numerosInput = $_POST["numeros"];
            $numerosArray = explode(",", $numerosInput);

            function verificarNumero($numero) {
                $resultado = "O número $numero é ";

                // Verificar se é par ou ímpar
                if ($numero % 2 == 0) {
                    $resultado .= "par";
                } else {
                    $resultado .= "ímpar";
                }

                // Verificar se é redondo (múltiplo de 10)
                if ($numero % 10 == 0) {
                    $resultado .= ", redondo";
                } else {
                    $resultado .= ", não redondo";
                }

                // Verificar se é positivo, negativo ou zero
                if ($numero > 0) {
                    $resultado .= ", positivo";
                } elseif ($numero < 0) {
                    $resultado .= ", negativo";
                } else {
                    $resultado .= ", zero";
                }

                return $resultado . ".";
            }

            foreach ($numerosArray as $numero) {
                $numero = trim($numero);
                if (is_numeric($numero)) {
                    echo "<p>" . verificarNumero((int)$numero) . "</p>";
                } else {
                    echo "<p>Valor inválido: $numero </p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
