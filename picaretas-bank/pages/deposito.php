<!DOCTYPE html>
<html>
<head>
    <title>Depósito Bancário</title>
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
    if (isset($_POST['acao']) && $_POST['acao'] === 'depositar') {
        $valorDeposito = floatval($_POST['valor']);
        $contaEncontrada['saldo'] += $valorDeposito;
        $_SESSION['contaEncontrada'] = $contaEncontrada;
        echo '<p>Depósito realizado com sucesso!</p>';
    } elseif (isset($_POST['acao']) && $_POST['acao'] === 'retirar') {
        $valorRetirada = floatval($_POST['valor']);
        $saldoAtual = $contaEncontrada['saldo'] + $contaEncontrada['chequeEspecial'];

        if ($valorRetirada <= $saldoAtual) {
            $contaEncontrada['saldo'] -= $valorRetirada;
            $_SESSION['contaEncontrada'] = $contaEncontrada;
            echo '<p>Retirada realizada com sucesso!</p>';
        } else {
            echo '<p>Saldo insuficiente para realizar a retirada.</p>';
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] === 'descontar') {
        $valorDesconto = floatval($_POST['valor']);
        $saldoAtual = $contaEncontrada['saldo'] + $contaEncontrada['chequeEspecial'];

        if ($valorDesconto <= $saldoAtual) {
            $contaEncontrada['saldo'] -= $valorDesconto;
            $_SESSION['contaEncontrada'] = $contaEncontrada;
            echo '<p>Cheque descontado com sucesso!</p>';
        } else {
            echo '<p>O cheque não tem fundos suficientes.</p>';
        }
    } elseif (isset($_POST['acao']) && $_POST['acao'] === 'pagar') {
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

<h1>Depósito Bancário</h1>
<p>Número da Conta: <?php echo $contaEncontrada['numero']; ?></p>
<p>Saldo Atual: R$ <?php echo number_format($contaEncontrada['saldo'], 2, ',', '.'); ?></p>

<form method="post" action="">
    <label for="valorDeposito">Valor do Depósito:</label>
    <input type="text" id="valorDeposito" name="valor" required>
    <button type="submit" name="acao" value="depositar">Depositar</button>
</form>

<h2>Listar Dados de Todas as Contas</h2>
<a class="highlight" href="listar.php">Listar Dados de Todas as Contas</a>

<p><a href="../index.php">Voltar</a></p>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>

</body>
</html>
