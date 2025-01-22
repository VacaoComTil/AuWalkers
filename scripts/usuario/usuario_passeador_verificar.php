<?php
function usuarioChecarPasseador($idUsuario) {
    // Conectando ao banco
    include('conexao.php');

    // Comando SQL para abrir o registro do login
    $sqlcommand = " SELECT * FROM passeadores WHERE idUsuario = $idUsuario";

    $result = mysqli_query($conexao, $sqlcommand);

    // Checagem do resultado do SQL
    return ($result && mysqli_num_rows($result) == 0);
}
?>