<?php echo $this->extend('layout/principal_web'); ?>
<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>
<link rel="stylesheet" href="<?php echo site_url("web/src/assets/css/produto.css"); ?>"/>
<style>
    @media only screen and (max-width: 767px){
        #registrar{
            min-width: 100% !important;
        }
    }
</style>

<?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>

<div class="container section" id="menu" data-aos="fade-up" style="margin-top: 3em">
    <div id="registrar" class="product-content product-wrap clearfix product-deatil center-block" style="max-width: 60%">
        <div class="row">
            <div class="col-md-12">
                <p><?php echo $titulo; ?></p>
                <?php if (session()->has('errors_model')): ?>
                    <ul style="margin-left: -1.6em !important;">
                        <?php foreach (session('errors_model') as $error): ?>
                            <li class="text-danger"><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php echo form_open("registrar/criar"); ?>

                <div class="form-group">
                    <label>Nome completo</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?php echo old('nome'); ?>">
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" class="form-control sp_celphones" id="telefone" name="telefone" value="<?php echo old('telefone'); ?>">
                </div>

                <div class="form-group">
                    <label>E-mail válido</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo old('email'); ?>">
                </div>

                <div class="form-group">
                    <label>CPF válido</label>
                    <input type="text" class="cpf form-control" name="cpf" value="<?php echo old('cpf'); ?>">
                </div>

                <div class="form-group">
                    <label id="lbl_password">Sua senha</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Digite sua senha">
                </div>

                <div class="form-group">
                    <label id="lbl_password_confirmation">Confirme sua senha</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha">
                </div>

                <button type="submit" class="btn btn-block btn-food" style="margin-top: 3em;">Criar minha conta</button>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?php echo $this->section('scripts'); ?>

<script src="<?php echo site_url('admin/vendors/mask/jquery.mask.min.js'); ?>"></script>
<script src="<?php echo site_url('admin/vendors/mask/app.js'); ?>"></script>
<script>
    $(document).ready(function(){
        <?php if (isset($_SESSION['nome'])): ?>
            $('#nome').val('<?php echo $_SESSION['nome']; ?>');
            $('#email').val('<?php echo $_SESSION['email']; ?>');
            $('#password').val('<?php echo $_SESSION['password']; ?>');
            $('#password_confirmation').val('<?php echo $_SESSION['password']; ?>');
            $('#nome').prop('readonly',true);
            $('#email').prop('readonly',true);
            $('#lbl_password').hide();
            $('#password').hide();
            $('#lbl_password_confirmation').hide();
            $('#password_confirmation').hide();
            <?php unset($_SESSION['nome']); ?>
            <?php unset($_SESSION['email']); ?>
            <?php unset($_SESSION['password']); ?>
        <?php endif; ?>
    });
</script>

<?php echo $this->endSection(); ?>