<main>
    <div class="row">
        <div class="col-md-7 text-center">
            <h5 class="m-5">Esta página é restrita e você só deve estar vendo ela depois de realizar o login.</h5>
            <div class="float-end text-end">

                <?php if (usuario('is_admin')) : ?>
                    <a href="<?= base_url('usuarios') ?>" class="btn btn-info mb-2">Administrar usuarios</a>
                <?php endif; ?>

                <form method="post" action="<?= base_url('logout') ?>">
                    <button type="submit" class="btn btn-danger">
                        <i class='bx bx-log-out nav_icon'></i>
                        logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>