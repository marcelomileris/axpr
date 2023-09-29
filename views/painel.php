<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand">Usuários - AXPR</a>
    <form class="form-inline">
        <button class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#frmUser"><i class="fa fa-plus"></i> Novo usuário</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-outline-danger" type="button" id="btnLogout" name="btnlogout><i class=" fa fa-close"></i> Sair</button>
    </form>
</nav>
<br />
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-sm table-bordered" id="tableUser">
                    <thead>
                        <tr>
                            <th scope="col" class='text-center'>#</th>
                            <th scope="col">Criado</th>
                            <th scope="col">Nome</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Senha</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Número</th>
                            <th scope="col">Cep</th>
                            <th scope="col" class='text-center'>Ativo</th>
                            <th scope="col" class='text-center'>Admin</th>
                            <th scope="col" class='text-center'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="frmUser" tabindex="-1" role="dialog" aria-labelledby="frmUser" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-user" action="" method="post" onsubmit="return false;">
                    <input type="hidden" id="txtID" name="txtID" value="" />
                    <div class="form-group">
                        <label for="txtName">Nome</label>
                        <input type="text" class="form-control text-capitalize" id="txtName" name="txtName" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email</label>
                        <input type="text" class="form-control text-lowercase" id="txtEmail" name="txtEmail" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="txePass">Senha</label>
                        <input type="text" class="form-control text-lowercase" id="txtPass" name="txtPass" placeholder="">
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


<script src="<?php echo BASE_URL; ?>assets/js/painel.js"></script>