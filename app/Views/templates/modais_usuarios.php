<!-- Modal novo usuario -->
<div class="modal" tabindex="-1" id="modal-novo-usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('usuarios/criar') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNovoUsuarioLabel">Novo Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="text" class="form-control" name="senha" id="senha">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="is_admin">Admin?</label>
                        <select name="is_admin">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal editar usuario -->
<div class="modal" tabindex="-1" id="modal-editar-usuario" >
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?= base_url('usuarios/editar') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuário</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editar-id">Id</label>
                        <input type="text" class="form-control" name="id" id="editar-id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editar-nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="editar-nome">
                    </div>
                    <div class="form-group">
                        <label for="editar-usuario">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="editar-usuario">
                    </div>
                    <div class="form-group">
                        <label for="editar-senha">Nova senha</label>
                        <input type="text" class="form-control" name="senha">
                    </div>
                    <div class="form-group">
                        <label for="editar-email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="editar-email">
                    </div>
                    <div class="form-group">
                        <label for="editar-is_admin">Admin?</label>
                        <select id="editar-is_admin" name="is_admin">
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>