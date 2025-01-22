<?php
function obterHistorico() {
    // Conectando ao banco
    include_once('conexao.php');

    $sqlcommand = "SELECT * 
        FROM passeios p_a
        
        INNER JOIN passeadores p ON p.id = p_a.idPasseador
        INNER JOIN usuarios u ON u.id = p.idUsuario
    ";

    echo "<br> <br>Passeios passados: <br> <br>";
    $result = mysqli_query($conexao, $sqlcommand);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "<br> Passeador: ";
            echo $row["nome"];
            echo "<br> Cidade: ";
            echo $row["cidade"];
            echo " - ";
            echo $row["estado"];
        }
        return $result;
    }

    mysqli_close($conexao);
    return null;
}
?>