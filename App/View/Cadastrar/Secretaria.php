<?php
use App\Model\Secretaria\SecretariaDao;
$secretaria = new SecretariaDao;
$secretaria->setSqlRead("SELECT * FROM tbsecretarias");
?>

<div clas="container-fluid">
    <div class="col-md-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastrar Secretaria</h3>
            </div>
            <div class="card-body">
                <!-- Date -->
                <form class="form-group" action="App/Controler/Secretaria/Create.php" method="post">
                    <div class="">
                        <label>Nome da Secretaria</label>
                        <div class="input-group date">
                            <input type="text" name="secretariaNome" class="form-control" placeholder="Insira o nome da Secretaria" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 form-group">
                        <button type="submit" class="btn btn-primary"> Enviar</button>
                    </div>
                </form>
            </div>
            <!-- /.form group -->
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div>
        
        <div class="">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listar equipamentos</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nome do local</th>
                                    <th>Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($secretaria->read() as $rowsSecretaria) : ?>
                                    <tr>
                                        <td><?php echo $rowsSecretaria['nome']; ?></td>

                                        <td>
                                            <div class="col">
                                                <a onclick="pegarId('<?php echo $rowsSecretaria['id']; ?>', '<?php echo $rowsSecretaria['nome']; ?>')" class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    <i class="fas fa-comments"></i>Alterar Local
                                                </a>

                                                <a onclick="confirmarExclusao('<?php echo $rowsSecretaria['id']; ?>')" class="btn btn-sm btn-danger mt-1">
                                                    <i class="fas fa-comments"></i>Excluir Local
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nome do local</th>
                                    <th>Funções</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
    <!-- iCheck -->

</div>
<!-- /.card -->



<script>
    var comfirmacao;

    function confirmarExclusao(id) {
        confirmacao = window.confirm("Tem certeza que deseja excluir o loca");
        console.log(id)
        if (confirmacao == true) {
            location.href = "App/Controler/Secretaria/Create.php?idDelete=" + id;
        }
    }



    function pegarId(id, nome, numero, setor) {
        console.log(id, nome, numero, setor);
        document.getElementById('id').value = id; // Usar 'value' em vez de 'innerText'
        document.getElementById("nome").value = nome;
        document.getElementById("numero").value = numero;
        document.getElementById("setor").value = setor;

    }

</script>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Alterar nome do local</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="App/Controler/RamaisEx/Create.php" method="get">
                    <div>
                        <input type="text" id="id" name="idUpdate" hidden>
                    </div>

                    <div class="name mt-3">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="text" id="nome" name="ramaisExNome" class="form-control" placeholder="Digite seu nome completo" id="">
                    </div>

                    <div class="row mt-3">

                        <div class="col">
                            <label for="">Numero</label>
                            <input class="form-control" id="numero" type="text" name="ramaisExNumero" placeholder="Endereço*">
                        </div>

                        <div class="col">
                            <label for="">Setor</label>
                            <input type="text" class="form-control" id="setor" name="ramaisExSetor" placeholder="Digite o telefone do local">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary ">Enviar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- /.row -->