<section class="activity">
    <h2>Atividade</h2>

    <?php
        include_once("scripts/usuario/passeador_passeando.php");
        if (passeadorPasseando($_SESSION['id'])) {
            echo '<form action="scripts/passeador/passeador_ativar.php" method="post">
                <p>
                    Duração:
                    <select class="form-select form-select-sm" aria-label="Selecionar duração" name="duracao">
                        <option value="1">1 minuto</option>
                        <option value="30" selected>30 minutos</option>
                        <option value="45">45 minutos</option>
                        <option value="60">60 minutos</option>
                        <option value="90">90 minutos</option>
                        <option value="120">120 minutos</option>
                        <option value="180">180 minutos</option>
                    </select>
                </p>
                    <input type="submit" class="btn btn-success" value="Iniciar atividade">
                </form>';
        } else {
            echo '
            <form action="scripts/passeador/passeador_desativar.php" method="post">
                <input type="submit" class="btn btn-danger" value="Finalizar atividade">
            </form>
            ';
        }
    ?>
    
    <?php
        include_once("scripts/passeador/verificar_chamados.php");
        echo '<hr><h2>Chamados</h2>';
        verificarChamados();
        echo '<hr><h2>Passeio atual</h2>';
        verificarChamadosAtivos();
    ?>
</section>