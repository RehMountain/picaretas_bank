<!DOCTYPE html>
<html>
<head>
    <title>Listar Dados das Contas</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <script src="../js/confirmation.js"></script>

</head>
<body>

<h1>Listar Dados das Contas</h1>

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
    ),
    array(
        'numero' => '111111',
        'saldo' => 5000.00,
        'chequeEspecial' => 1000.00
    ),
    array(
        'numero' => '222222',
        'saldo' => 250.00,
        'chequeEspecial' => 50.00
    ),
    array(
        'numero' => '333333',
        'saldo' => 1800.00,
        'chequeEspecial' => 600.00
    )
);

echo '<table border="1">';
echo '<tr><th>Número da Conta</th><th>Saldo</th><th>Valor do Cheque Especial</th></tr>';

foreach ($contasBancarias as $conta) {
    echo '<tr>';
    echo '<td>' . $conta['numero'] . '</td>';
    echo '<td>R$ ' . number_format($conta['saldo'], 2, ',', '.') . '</td>';
    echo '<td>R$ ' . number_format($conta['chequeEspecial'], 2, ',', '.') . '</td>';
    echo '</tr>';
}

echo '</table>';
?>

<p><a href="../index.php">Voltar</a></p>
<div class="footer">
    &copy; <?php echo date("Y"); ?> Picaretas Bank. Todos os direitos reservados.
</div>

</body>
</html>
