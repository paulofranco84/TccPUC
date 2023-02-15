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
                  <p class="card-text">
                      <span class="font-weight-bold">Nome:</span>
                      <?php echo esc($bairro->nome); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Slug:</span>
                      <?php echo esc($bairro->slug); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Valor Entrega:</span>
                      R$&nbsp<?php echo esc(number_format($bairro->valor_entrega,2)); ?>
                  </p>

                  <p class="card-text">
                      <span class="font-weight-bold">Ativo:</span>
                      <?php echo ($bairro->ativo ? 'Sim' : 'Não'); ?>
                  </p>
                  
                  <p class="card-text">
                      <span class="font-weight-bold">Criado:</span>
                      <?php echo $bairro->criado_em->humanize(); ?>
                  </p>
                  
                  <?php if ($bairro->deletado_em == null): ?>
                        <p class="card-text">
                            <span class="font-weight-bold">Atualizado:</span>
                            <?php echo $bairro->atualizado_em->humanize(); ?>
                        </p>
                  <?php else: ?>
                        <p class="card-text">
                            <span class="font-weight-bold text-danger">Excluído:</span>
                            <?php echo $bairro->deletado_em->humanize(); ?>
                        </p>
                  <?php endif; ?>
              </div>

              <div class="card-footer bg-white">
                <?php if ($bairro->deletado_em == null): ?>
                    <a href="<?php echo site_url("Admin/Bairros/editar/$bairro->id"); ?>" class="btn btn-dark btn-icon-text text-white btn-sm mr-2">
                        <i class="mdi mdi-pencil"></i> Editar
                    </a>

                    <a href="<?php echo site_url("Admin/Bairros/excluir/$bairro->id"); ?>" class="btn btn-danger btn-icon-text text-white btn-sm mr-2">
                        <i class="mdi mdi-delete"></i> Excluir
                    </a>

                    <a href="<?php echo site_url("Admin/Bairros"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark mr-2">
                        <i class="mdi mdi-arrow-left-bold"></i> Voltar
                    </a>
                <?php else: ?>
                    <a title="Desfazer exclusão" href="<?php echo site_url("Admin/Bairros/desfazerexclusao/$bairro->id"); ?>" class="btn btn-dark btn-sm mr-2">
                        <i class="mdi mdi-undo"></i> Desfazer
                    </a>

                    <a href="<?php echo site_url("Admin/Bairros"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark mr-2">
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