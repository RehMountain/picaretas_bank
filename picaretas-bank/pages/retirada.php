<!DOCTYPE html>
<html>
<head>
    <title>Retirada/Saque Bancário</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <script src="../js/confirmation.js"></script>

</head>
<body>

<?php
session_start();

if (!isset($_SESSION['contaEncontrada'])) {
    echo '<p>Conta não encontrada.</p>';
    echo '<p><a href="../index.php">Voltar</a></p>';
    exit;
}

$contaEncontrada = $_SESSION['contaEncontrada'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao']) && $_POST['acao'] === 'retirar') {
        $valorRetirada = floatval($_POST['valor']);
        $saldoAtual = $contaEncontrada['saldo'] + $contaEncontrada['chequeEspecial'];

        if ($valorRetirada <= $saldoAtual) {
            $contaEncontrada['saldo'] -= $valorRetirada;
            $_SESSION['contaEncontrada'] = $contaEncontrada;
            echo '<p>Retirada realizada com sucesso!</p>';
        } else {
            echo '<p>Saldo insuficiente para realizar a retirada.</p>';
        }
    }
}
?>

<h1>Retirada/Saque Bancário</h1>
<p>Número da Conta: <?php echo $contaEncontrada['numero']; ?></p>
<p>Saldo Atual: R$ <?php echo number_format($contaEncontrada['saldo'], 2, ',', '.'); ?></p>

<form method="post" action="">
    <label for="valorRetirada">Valor do Saque:</label>
    <input type="text" id="valorRetirada" name="valor" required>
    <button type="submit" name="acao" value="retirar">Realizar Saque</button>
</form>

<p><a href="../index.php">Voltar</a></p>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>

</body>
</html>
