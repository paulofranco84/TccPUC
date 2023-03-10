<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>
<!-- Aqui enviamos para o template principal os estilos -->
<?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->
  <div class="row">
      <div class="col-lg-4 grid-margin stretch-card">
          <div class="card">
              <div class="card-header bg-primary pb-0 pt-4">
                  <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
              </div>
              <div class="card-body">
                <div class="text-center">
                    <?php if ($entregador->imagem): ?>
                        <img class="card-img-top w-75" src="<?php echo site_url("admin/entregadores/imagem/$entregador->imagem"); ?>" alt="<?php echo esc($entregador->nome); ?>">
                    <?php else: ?>
                        <img class="card-img-top w-75" src="<?php echo site_url('admin/images/entregador-sem-imagem.jpg'); ?>" alt="entregador sem imagem">
                    <?php endif; ?>
                </div>

                <hr>

                <a href="<?php echo site_url("admin/entregadores/editarimagem/$entregador->id"); ?>" class="btn btn-outline-primary btn-sm mb-2 mt-3">
                    <i class="mdi mdi-pencil"></i> Editar Imagem
                </a>

                <hr>

                <p class="card-text">
                    <span class="font-weight-bold">Nome:</span>
                    <?php echo esc($entregador->nome); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Telefone:</span>
                    <?php echo esc($entregador->telefone); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Veículo:</span>
                    <?php echo esc($entregador->veiculo); ?> | <?php echo esc($entregador->placa); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Ativo:</span>
                    <?php echo ($entregador->ativo ? 'Sim' : 'Não'); ?>
                </p>
                
                <p class="card-text">
                    <span class="font-weight-bold">Criado:</span>
                    <?php echo $entregador->criado_em->humanize(); ?>
                </p>
                
                <?php if ($entregador->deletado_em == null): ?>
                    <p class="card-text">
                        <span class="font-weight-bold">Atualizado:</span>
                        <?php echo $entregador->atualizado_em->humanize(); ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <span class="font-weight-bold text-danger">Excluído:</span>
                        <?php echo $entregador->deletado_em->humanize(); ?>
                    </p>
                <?php endif; ?>

              </div>

              <div class="card-footer bg-white">
                <?php if ($entregador->deletado_em == null): ?>
                    <a href="<?php echo site_url("admin/entregadores/editar/$entregador->id"); ?>" class="btn btn-dark btn-icon-text text-white btn-sm mr-2">
                        <i class="mdi mdi-pencil"></i> Editar
                    </a>

                    <a href="<?php echo site_url("admin/entregadores/excluir/$entregador->id"); ?>" class="btn btn-danger btn-icon-text text-white btn-sm mr-2">
                        <i class="mdi mdi-delete"></i> Excluir
                    </a>

                    <a href="<?php echo site_url("admin/entregadores"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark mr-2">
                        <i class="mdi mdi-arrow-left-bold"></i> Voltar
                    </a>
                <?php else: ?>
                    <a title="Desfazer exclusão" href="<?php echo site_url("admin/entregadores/desfazerexclusao/$entregador->id"); ?>" class="btn btn-dark btn-sm mr-2">
                        <i class="mdi mdi-undo"></i> Desfazer
                    </a>

                    <a href="<?php echo site_url("admin/entregadores"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark mr-2">
                        <i class="mdi mdi-arrow-left-bold"></i> Voltar
                    </a>
                <?php endif; ?>
              </div>
          </div>
      </div>
  </div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- Aqui enviamos para o template principal os scripts -->

<?php echo $this->endSection(); ?>