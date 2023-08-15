<!DOCTYPE html>
<html>
<head>
    <title>Contas Bancárias</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="/picaretas-bank/js/script.js"></script>
    <script src="/picaretas-bank/js/confirmation.js"></script>

</head>
<body>

<?php
$contasBancarias = array(
    array(
        'numero' => '123456',
        'saldo' => 1500.00,
        'chequeEspecial' => 500.00
    ),
    array(
        'numero' => '654321',
        'saldo' => 3000.00,
        'chequeEspecial' => 1000.00
    ),
    array(
        'numero' => '987654',
        'saldo' => 800.00,
        'chequeEspecial' => 200.00
    )
);

$contaEncontrada = null;

if (isset($_POST['numeroConta'])) {
    $numeroContaBuscada = $_POST['numeroConta'];

    foreach ($contasBancarias as $conta) {
        if ($conta['numero'] === $numeroContaBuscada) {
            $contaEncontrada = $conta;
            break;
        }
    }
}
?>

<h1>Contas Bancárias</h1>

<h2>Buscar Conta Bancária</h2>
<form method="post" action="">
    <label for="numeroConta">Número da Conta:</label>
    <input type="text" id="numeroConta" name="numeroConta" required>
    <button type="submit">Buscar</button>
</form>

<?php
if ($contaEncontrada !== null) {
    echo '<h2>Opções Adicionais</h2>';
    echo '<p>Número da Conta Encontrada: ' . $contaEncontrada['numero'] . '</p>';
    echo '<p>Saldo Atual: R$ ' . number_format($contaEncontrada['saldo'], 2, ',', '.') . '</p>';
    echo '<p>Valor do Cheque Especial: R$ ' . number_format($contaEncontrada['chequeEspecial'], 2, ',', '.') . '</p>';
    echo '<ul>';
    echo '<li><a href="pages/deposito.php">Depósito Bancário</a></li>';
    echo '<li><a href="pages/retirada.php">Retirada/Saque Bancário</a></li>';
    echo '<li><a href="pages/desconto_cheques.php">Desconto de Cheques</a></li>';
    echo '<li><a href="pages/pagamento_faturas.php">Pagamento de Faturas</a></li>';
    echo '<li><a href="pages/listar.php">Listar Dados das Contas</a></li>';
    echo '</ul>';
}
?>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>
</body>
</html>
