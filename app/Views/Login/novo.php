<?php echo $this->extend('Admin/layout/principal_autenticacao'); ?>
<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection() ?>
<?php echo $this->section('estilos'); ?>
<!-- Aqui enviamos para o template principal os estilos -->
<?php echo $this->endSection() ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->

<div class="container-fluid page-body-wrapper full-page-wrapper">
  <div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
      <div class="col-lg-5 mx-auto">
        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

          <?php if (session()->has('sucesso')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Perfeito!</strong> <?php echo session('sucesso'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <?php if (session()->has('info')) : ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Informação!</strong> <?php echo session('info'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <?php if (session()->has('atencao')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Atenção!</strong> <?php echo session('atencao'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <!-- Captura os erros de CRSF - Ação não permitida -->
          <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erro!</strong> <?php echo session('error'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>

          <div class="brand-logo text-center">
            <img src="<?php echo site_url('admin/'); ?>images/fatiapizza.png" alt="logo">
          </div>
          <h4>Olá, seja bem vindo(a)!</h4>
          <h6 class="font-weight-light mb-3">Por favor, realize o login.</h6>

          <?php echo form_open('login/criar'); ?>
          <div class="form-group">
            <input type="email" name="email" value="<?php echo old('email'); ?>" class="form-control form-control-lg" id="email" placeholder="Digite o seu e-mail">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Digite a sua senha">
          </div>
            <input type="hidden" name="is_google" id="is_google" value=0>
            <input type="hidden" name="nome_google" id="nome_google" value=''>
            <input type="hidden" name="email_google" id="email_google" value=''>
            <input type="hidden" name="password_google" id="password_google" value=''>
          <div class="mt-3">
            <button id="btn_entrar" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Entrar</button> 
          </div>
          <div class="my-2 d-flex justify-content-between align-items-center">
            <div class="form-check">
            </div>
            <a href="<?php echo site_url('password/esqueci'); ?>" class="auth-link text-black">Esqueceu a senha?</a>
          </div>
          <div class="mb-2">
            <div id="buttonDiv"></div> 
          </div>
          <div class="text-center mt-3 font-weight-light">
            Não tem uma conta? <a href="<?php echo site_url('registrar'); ?>" class="text-primary">Crie uma</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection() ?>
<?php echo $this->section('scripts'); ?>
<!-- Aqui enviamos para o template principal os scripts -->
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script src="https://unpkg.com/jwt-decode/build/jwt-decode.js" async defer></script>
<script>
    function handleCredentialResponse(response) {
      const data = jwt_decode(response.credential)
      if(data.email_verified){
          $("#email_google").val(data.email);
          $("#password_google").val(data.sub);
          $("#nome_google").val(data.name);
          $("#is_google").val(1);
          $("#btn_entrar").click();
      }else{
          alert('Conta do google não verificada');
      }
    }
    window.onload = function () {
      google.accounts.id.initialize({
        client_id: "832730482226-1vraijlp5ha0ar77it3c3egt8rpqg8p4.apps.googleusercontent.com",
        //client_id: "223400819010-em8o87svv2d3ptblop35gbm3r6vevdvm.apps.googleusercontent.com",
        callback: handleCredentialResponse
      });
      google.accounts.id.renderButton(
        document.getElementById("buttonDiv"),
        { type:"standard",
          shape:"rectangular",
          theme:"outline",
          text:"continue_with.",
          size:"large",
          logo_alignment:"left" }
      );
      //google.accounts.id.prompt();
    }
</script>
<?php echo $this->endSection() ?>