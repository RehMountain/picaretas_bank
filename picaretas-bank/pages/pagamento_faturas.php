<!DOCTYPE html>
<html>
<head>
    <title>Pagamento de Faturas</title>
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
    if (isset($_POST['acao']) && $_POST['acao'] === 'pagar') {
        $valorPagamento = floatval($_POST['valor']);
        $saldoAtual = $contaEncontrada['saldo'] + $contaEncontrada['chequeEspecial'];

        if ($valorPagamento <= $saldoAtual) {
            $contaEncontrada['saldo'] -= $valorPagamento;
            $_SESSION['contaEncontrada'] = $contaEncontrada;
            $beneficiario = $_POST['beneficiario'];
            echo '<p>Pagamento de fatura realizado para: ' . $beneficiario . '</p>';
        } else {
            echo '<p>Saldo insuficiente para realizar o pagamento.</p>';
        }
    }
}
?>

<h1>Pagamento de Faturas</h1>
<p>Número da Conta: <?php echo $contaEncontrada['numero']; ?></p>
<p>Saldo Atual: R$ <?php echo number_format($contaEncontrada['saldo'], 2, ',', '.'); ?></p>

<form method="post" action="">
    <label for="valorPagamento">Valor do Pagamento:</label>
    <input type="text" id="valorPagamento" name="valor" required>
    <label for="beneficiario">Beneficiário:</label>
    <input type="text" id="beneficiario" name="beneficiario" required>
    <button type="submit" name="acao" value="pagar">Realizar Pagamento</button>
</form>

<p><a href="../index.php">Voltar</a></p>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>

</body>
</html>
