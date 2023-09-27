<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('usuarios')?>">Usuarios</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Sub menu exemplo
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Ação exemplo</a>
          <a class="dropdown-item" href="#">Outra ação</a>
          <a class="dropdown-item" href="#">Mais uma ação</a>
        </div>
      </li>

      <li class="nav-item">
        <form action="<?=base_url('logout')?>" method="post">
            <button type="submit" class="btn  btn btn-danger">Logout</button>
        </form>
      </li>

    </ul>
  </div>
</nav>