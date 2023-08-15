<!DOCTYPE html>
<html>
<head>
    <title>Desconto de Cheques</title>
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
    if (isset($_POST['acao']) && $_POST['acao'] === 'descontar') {
        $valorDesconto = floatval($_POST['valor']);
        $saldoAtual = $contaEncontrada['saldo'] + $contaEncontrada['chequeEspecial'];

        if ($valorDesconto <= $saldoAtual) {
            $contaEncontrada['saldo'] -= $valorDesconto;
            $_SESSION['contaEncontrada'] = $contaEncontrada;
            echo '<p>Cheque descontado com sucesso!</p>';
        } else {
            echo '<p>O cheque não tem fundos suficientes.</p>';
        }
    }
}
?>

<h1>Desconto de Cheques</h1>
<p>Número da Conta: <?php echo $contaEncontrada['numero']; ?></p>
<p>Saldo Atual: R$ <?php echo number_format($contaEncontrada['saldo'], 2, ',', '.'); ?></p>

<form method="post" action="">
    <label for="valorDesconto">Valor do Desconto:</label>
    <input type="text" id="valorDesconto" name="valor" required>
    <button type="submit" name="acao" value="descontar">Descontar Cheque</button>
</form>

<p><a href="../index.php">Voltar</a></p>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>

</body>
</html>
