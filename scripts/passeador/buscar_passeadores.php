<?php

// Script para obter os passeadores na região que estão passeando

function buscarPasseadores() {
    // Conectando ao banco
    include_once('conexao.php');

    $estado = "sp";
    $cidade = "jau";

    $sqlcommand = "SELECT * 
        FROM passeadores_atividades p_a
        
        INNER JOIN passeadores p ON p.id = p_a.idPasseador
        INNER JOIN usuarios u ON u.id = p.idUsuario

        WHERE 
            p_a.horarioSaida > now() and
            p_a.ativo = true and
            p_a.cidade = '$cidade' and
            p_a.estado = '$estado';
    ";

    $result = mysqli_query($conexao, $sqlcommand);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) 
        {
            echo "
                <form class='walker' action='mapa_lista_passeador.php' method='POST'> <br>
                    <span>" . $row['nome'] . "</span>
                    <span>Disponível até " . substr($row['horarioSaida'], 11, 5) ."</span>
                    <input type='text' name='idPasseador' value='" .  $row['idPasseador'] . "' hidden>
                    <input type='submit' value='Visualizar'>
                </form>";
        }
        return $result;
    }

    mysqli_close($conexao);
    return null;
}



?>