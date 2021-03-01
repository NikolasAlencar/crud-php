<?php

//exibe uma mensagem de sucesso caso a operação de inserção ou edição seja concluida ou de falha 
$mensagem = '';
if(isset($_GET['status'])){
  switch ($_GET['status']) {
    case 'success':
      $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
      break;

    case 'error':
      $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
      break;
  }
}

    $resultados = '';
    foreach($funcionarios as $funcionario){
        $resultados .= '<tr>
                            <td>'.$funcionario->id.'</td>
                            <td>'.$funcionario->nome.'</td>
                            <td>'.$funcionario->cargo.'</td>
                            <td>'.$funcionario->salario.'</td>
                            <td>'.$funcionario->email.'</td>
                            <td>'.($funcionario->homeoffice == 's' ? 'Sim' : 'Não').'</td>
                            <td>
                            <a href="editar.php?id='.$funcionario->id.'">
                              <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="excluir.php?id='.$funcionario->id.'">
                              <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                          </td>
                        </tr>';
    }
    $resultados = strlen($resultados) ? $resultados : ' <tr>
                                                            <td colspan="6" class="text-center">
                                                                Nenhum funcionário encontrado
                                                            </td>
                                                        </tr>';

?>
<main>
    <?=$mensagem?>
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Novo funcionário</button>
        </a>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Salario</th>
                    <th>Email</th>
                    <th>Homeoffice</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>