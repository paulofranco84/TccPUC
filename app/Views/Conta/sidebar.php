<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mySidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
    </div>

    <div class="navbar" id="mySidebar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('conta'); ?>">Meus pedidos</a></li>
        <li><a href="<?php echo site_url('conta/show'); ?>">Meus dados</a></li>
        <li><a href="<?php echo site_url('conta/editarsenha'); ?>">Alterar senha</a></li>
        <li><a href="<?php echo site_url('login/logout'); ?>">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>