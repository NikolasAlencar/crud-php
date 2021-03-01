<main>
    
    <h2 class="mt-3" style="text-align: center"><?=TITLE?></h2>

    <form method="post">

        <!--label + input para inserção do nome do funcionario-->
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=$obFuncionario->nome?>">
        </div>

        <!--label + input para inserção do cargo do funcionario-->
        <div class="form-group">
            <label>Cargo</label>
            <input type="text" class="form-control" name="cargo" value="<?=$obFuncionario->cargo?>">
        </div>

        <!--label + input para inserção do salario do funcionario-->
        <div class="form-group">
            <label>Salario</label>
            <input type="text" class="form-control" name="salario" value="<?=$obFuncionario->salario?>">
        </div>

        <!--label + input para inserção do email do funcionario-->
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" value="<?=$obFuncionario->email?>">
        </div>

        <!--o usuario informa se o funcionario esta trabalhando homeoffice ou nao-->
        <div class="form-group">
            <label>Homeoffice</label>
            <div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="homeoffice" value="s" checked> Sim
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="homeoffice" value="n" <?=$obFuncionario->homeoffice == 'n' ? 'checked' : ''?>> Não
                    </label>
                </div>
            </div>
        </div>
        <br>

        <!--botoes de voltar(cancelar a operacao) e enviar(editar ou salvar um novo funcionario)-->
        <div class="form-group" style="text-align: center">
            <a href="index.php" style="text-decoration:none">
                <button type="button" class="btn btn-danger">Voltar</button>
            </a>
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>

</main>