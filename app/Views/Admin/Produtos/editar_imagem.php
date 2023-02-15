<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>
<!-- Aqui enviamos para o template principal os estilos -->
<?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->

  <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-header bg-primary pb-0 pt-4">
                    <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
                </div>
                <div class="card-body">
                    <?php if(session()->has('errors_model')): ?>
                        <ul>
                            <?php foreach (session('errors_model') as $error): ?>
                                <li class="text-danger"><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    
                    <?php echo form_open_multipart("admin/produtos/upload/$produto->id"); ?>
                        
                        <div class="form-group mb-5">
                        <label>Upload de imagem</label>
                        <input type="file" name="foto-produto" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Escolha uma imagem">
                            <span class="input-group-append">
                            <button class="file-upload-browse btn btn-danger" type="button">Escolher</button>
                            </span>
                        </div>
                        </div>
                </div>

                <div class="card-footer bg-white">
                    <button type="submit" class="btn btn-primary text-white mr-2 btn-sm">
                        <i class="mdi mdi-checkbox-marked-circle btn-icon-prepend"></i> Salvar
                    </button>

                    <a href="<?php echo site_url("admin/produtos/show/$produto->id"); ?>" class="btn btn-light btn-sm text-dark">
                        <i class="mdi mdi-arrow-left btn-icon-prepend"></i> Voltar
                    </a>
                </div>
                
                <?php echo form_close(); ?>                    
                
            </div>
        </div>
  </div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>

<!-- Aqui enviamos para o template principal os scripts -->
<script src="<?php echo site_url('admin/js/file-upload.js'); ?>"></script>

<?php echo $this->endSection(); ?>