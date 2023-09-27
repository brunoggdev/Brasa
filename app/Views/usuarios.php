<main>
    <button type="button" class="btn btn-primary m-2" id="abrir-modal-novo-usuario">
        Novo Usuario
    </button>
    
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Admin</th>
                    </tr>
                </thead>
                <tbody id="usuarios-body">
                <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td><?=$usuario['id']?></td>
                            <td><?=$usuario['nome']?></td>
                            <td><?=$usuario['usuario']?></td>
                            <td><?=$usuario['email']?></td>
                            <td><?=$usuario['is_admin'] ? 'Sim' : 'Não'?></td>
                            <td><button class="btn editar-usuario">editar 📝</button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</main>