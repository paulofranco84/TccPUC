<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?><?php echo $titulo; ?><?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>
<!-- Aqui enviamos para o template principal os estilos -->
<?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->

  <div class="row">
      <div class="col-lg-5 grid-margin stretch-card">
          <div class="card">
              <div class="card-header bg-primary pb-0 pt-4">
                  <h4 class="card-title text-white"><?php echo esc($titulo); ?></h4>
              </div>
              <div class="card-body">

                <div class="text-center">
                    <?php if ($produto->imagem): ?>
                        <img class="card-img-top w-75" src="<?php echo site_url("admin/produtos/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome); ?>">
                    <?php else: ?>
                        <img class="card-img-top w-75" src="<?php echo site_url('admin/images/produto_sem_imagem.jpg'); ?>" alt="Produto sem imagem">
                    <?php endif; ?>
                </div>
                
                <hr>

                <a href="<?php echo site_url("admin/produtos/editarimagem/$produto->id"); ?>" class="btn btn-outline-primary btn-sm mb-2 mt-3">
                    <i class="mdi mdi-pencil"></i> Editar Imagem
                </a>

                <hr>

                <p class="card-text">
                    <span class="font-weight-bold">Nome:</span>
                    <?php echo esc($produto->nome); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Categoria:</span>
                    <?php echo esc($produto->categoria); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Slug:</span>
                    <?php echo esc($produto->slug); ?>
                </p>

                <p class="card-text">
                    <span class="font-weight-bold">Ativo:</span>
                    <?php echo ($produto->ativo ? 'Sim' : 'Não'); ?>
                </p>
                
                <p class="card-text">
                    <span class="font-weight-bold">Criado:</span>
                    <?php echo $produto->criado_em->humanize(); ?>
                </p>
                
                <?php if ($produto->deletado_em == null): ?>
                    <p class="card-text">
                        <span class="font-weight-bold">Atualizado:</span>
                        <?php echo $produto->atualizado_em->humanize(); ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <span class="font-weight-bold text-danger">Excluído:</span>
                        <?php echo $produto->deletado_em->humanize(); ?>
                    </p>
                <?php endif; ?>
              </div>

              <div class="card-footer bg-white">
                <?php if ($produto->deletado_em == null): ?>
                    <a href="<?php echo site_url("admin/produtos/editar/$produto->id"); ?>" class="btn btn-dark btn-icon-text text-white btn-sm m-1">
                        <i class="mdi mdi-pencil"></i> Editar
                    </a>

                    <a href="<?php echo site_url("admin/produtos/excluir/$produto->id"); ?>" class="btn btn-danger btn-icon-text text-white btn-sm m-1">
                        <i class="mdi mdi-delete"></i> Excluir
                    </a>

                    <a href="<?php echo site_url("admin/produtos/extras/$produto->id"); ?>" class="btn btn-outline-success btn-icon-text btn-sm m-1">
                        <i class="mdi mdi-plus-circle-outline"></i> Extras
                    </a>

                    <a href="<?php echo site_url("admin/produtos/especificacoes/$produto->id"); ?>" class="btn btn-outline-warning btn-icon-text btn-sm m-1">
                        <i class="mdi mdi-pizza"></i> Especificações
                    </a>

                    <a href="<?php echo site_url("admin/produtos"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark m-1">
                        <i class="mdi mdi-arrow-left-bold"></i> Voltar
                    </a>
                <?php else: ?>
                    <a title="Desfazer exclusão" href="<?php echo site_url("admin/produtos/desfazerexclusao/$produto->id"); ?>" class="btn btn-dark btn-sm m-1">
                        <i class="mdi mdi-undo"></i> Desfazer
                    </a>

                    <a href="<?php echo site_url("admin/produtos"); ?>" class="btn btn-light btn-icon-text btn-sm text-dark m-1">
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