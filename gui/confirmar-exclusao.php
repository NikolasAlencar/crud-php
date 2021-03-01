<main>

    <h2 class="mt-3">Excluir o funcionario</H2></h2>

    <form method="post">

        <!--exibe mensagem de confirmacao referente a exclusao do funcionario escolhido-->
        <div class="form-group">
          <p>Você deseja realmente excluir o funcionario <strong><?=$obFuncionario->nome?></strong>?</p>
        </div>

        <!--botoes de voltar(cancelar a operacao) e excluir(excluir o funcionario escolhido)-->
        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-success">Voltar</button>
             </a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>

</main>