<?php

function verificarChamados() {
    include('conexao.php');

    $idPasseador = $_SESSION['id'];

    $sqlcommand = "SELECT p_a.id, us.nome
        FROM passeios p_a
        INNER JOIN usuarios us ON p_a.idUsuario = us.id
        WHERE 
            p_a.ativo AND
            NOT p_a.confirmado AND
            p_a.idPasseador = $idPasseador";

    $result = mysqli_query($conexao, $sqlcommand);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "
            <form action='scripts/passeio/passeio_confirmar.php' method='post'>
                Cliente: " . $row['nome'] . " <br>
                Local: [----------------], Jaú-SP
                <input type='number' value='" . $row['id'] . "' name='idPasseio' readonly hidden>
                <input type='submit' value='Atender'>
            </form>
            <br>";
        }
        mysqli_close($conexao);
        return $result;
    }

}

function verificarChamadosAtivos() {
    include('conexao.php');

    $idPasseador = $_SESSION['id'];

    $sqlcommand = "SELECT p_a.id, us.nome 
        FROM passeios p_a
        INNER JOIN usuarios us ON p_a.idUsuario = us.id
        WHERE 
            p_a.ativo AND
            p_a.confirmado AND
            p_a.idPasseador = $idPasseador
    ";
    $result = mysqli_query($conexao, $sqlcommand);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "
            <form action='scripts/passeio/passeio_encerrar.php' method='post'>
                Cliente: " . $row['nome'] . " 
                Local: [----------------], Jaú-SP
                <br>
                <input type='number' value='" . $row['id'] . "' name='idPasseio' readonly hidden>
                <input type='submit' value='Finalizar'>
            </form>
             <form action='scripts/passeio/passeio_cancelar.php' method='post'>
                <input type='number' value='" . $row['id'] . "' name='idPasseio' readonly hidden>
                <input type='submit' value='Cancelar'>
            </form>
            <br>";
        }
        mysqli_close($conexao);
        return $result;
    }

    

}
?>