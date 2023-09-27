<main style="place-self: center;
            width: 380px;
            background-color: rgba(255, 255, 255, 0.15);
            padding: 20px 50px 40px;
            box-shadow: 0 6px 35px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);">
    <form role="form" action="<?= base_url('login') ?>" method="POST">
        <h3 class="mb-0 ml-2 text-center">Login</h3>
        <hr>
        <div class="form-group form-group-icon">
            <input type="text" class="form-control border mb-4" name="usuario" placeholder="Usuario" required>
        </div>

        <div class="form-group form-group-icon">
            <input type="password" class="form-control border mb-4" name="senha" placeholder="Senha" required>
        </div>

        <?php if (session()->has('mensagem')) : ?>
            <div class='alert alert-<?= getMsgBrasa('cor') ?>'><?= getMsgBrasa('texto') ?></div>
        <?php endif; ?>

        <div class="form-group">
            <button type="submit" class="btn btn-success text-uppercase w-100">Entrar</button>
        </div>

    </form>
</main>