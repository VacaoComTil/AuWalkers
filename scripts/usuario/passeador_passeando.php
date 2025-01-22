<?php
    function passeadorPasseando($idPasseador) {
        // Conectando ao banco
        include('conexao.php');

        // Comando SQL para abrir o registro do login
        $sqlcommand = " SELECT * FROM passeadores_atividades WHERE 
        idPasseador = $idPasseador AND (ativo = true OR horarioSaida < now())"; 

        $result = mysqli_query($conexao, $sqlcommand);

        // Checagem do resultado do SQL
        return ($result && mysqli_num_rows($result) == 0);
    }
?>