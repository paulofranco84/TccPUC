<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>
<!-- Aqui enviamos para o template principal os estilos -->
<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>"/>
<?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->

  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $titulo; ?></h4>
                    <div class="ui-widget"> 
                        <input id="query" name="query" placeholder="Pesquise por um produto" class="form-control bg-light mb-5">
                    </div>

                    <div>
                        <a href="<?php echo site_url("admin/produtos/criar"); ?>" class="btn btn-success m-1">
                            <i class="mdi mdi-plus"></i> Cadastrar
                        </a>
                        <button id='btn_csv' type="button" class="btn btn-outline-success float-right m-1"><span class="mdi mdi-file-excel mdi-24px"></span>Exportar CSV</button>
                        <button id='btn_pdf' type="button" class="btn btn-outline-danger float-right m-1"><span class="mdi mdi-file-pdf-box mdi-24px"></span>Exportar PDF</button>
                    </div>

                    <div class="table-responsive">
                      <table id="tabela_produtos" class="table table-hover">
                        <thead>
                          <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Data de criação</th>
                            <th>Especificações</th>
                            <th>Ativo</th>
                            <th>Situação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($produtos as $produto) : ?>
                              <tr>
                                  <td class="py-1">
                                      <?php if($produto->imagem): ?>
                                          <img src="<?php echo site_url("admin/produtos/imagem/$produto->imagem"); ?>" alt="<?php echo esc($produto->nome); ?>"/>
                                      <?php else: ?>
                                          <img src="<?php echo site_url('admin/produtos/imagem/produto-sem-imagem.jpg'); ?>" alt="Produto sem imagem"/>
                                      <?php endif; ?>
                                  </td>
                                  <td><a href="<?php echo site_url("admin/produtos/show/$produto->id"); ?>"><?php echo $produto->nome; ?></a></td>
                                  <td><?php echo $produto->categoria; ?></td>
                                  <td><?php echo $produto->criado_em->humanize(); ?></td>
                                  <td>
                                        <?php foreach($especificacoes as $especificacao): ?>
                                            <?php if($produto->id == $especificacao->produto_id): ?>
                                                <p>
                                                    <?php echo esc($especificacao->nome); ?> : R$&nbsp;<?php echo esc($especificacao->preco); ?>
                                                </p>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                  </td>
                                  <td><?php echo ($produto->ativo && $produto->deletado_em == null ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>')?></td>
                                  <td>
                                      <?php echo ($produto->deletado_em == null ? '<label class="badge badge-primary">Disponível</label>' : '<label class="badge badge-danger">Excluído</label>')?>
                                      <?php if($produto->deletado_em != null): ?>
                                          <a href="<?php echo site_url("admin/produtos/desfazerexclusao/$produto->id"); ?>" class="badge badge-dark ml-2">
                                              <i class="mdi mdi-undo"></i> Desfazer
                                          </a>
                                      <?php endif; ?>
                                  </td>
                              </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                      <div class="mt-3">
                          <?php echo $pager->links() ?>
                      </div>
                    </div>
                  </div>
                </div>
      </div>
  </div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>

<!-- Aqui enviamos para o template principal os scripts -->
<script src="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.js'); ?>"></script>
<script>
    $("#btn_csv").click(function(){
        $("#tabela_produtos").tableHTMLExport({
            type:'csv',
            filename:'Produtos.csv',
        });
    });

    $("#btn_pdf").click(function(){
        let pdf = new jsPDF('p','pt',[2480, 3508]);
        pdf.html(document.getElementById('tabela_produtos'), {
            callback: function (pdf) {
                pdf.save('Produtos.pdf');
            }
        });
    });

    $(()=>{
      $("#query").autocomplete({
        source: (request, response)=>{
          $.ajax({
            url: "<?php echo site_url('admin/produtos/procurar'); ?>",
            dataType: "json",
            data: {
              term:request.term
            },
            success: (data)=>{
              if(data.length<1){
                var data = [
                  {
                    label: 'Produto não encontrado',
                    value: -1
                  }
                ];
              }
              response(data);
            },
          });
        },
        minLength: 1,
        select: (event, ui)=>{
            if(ui.item.value == -1){
                $(this).val("");
                return false;
            } else {
                window.location.href = '<?php echo site_url('admin/produtos/show/'); ?>' + ui.item.id;
            }
        }
      }); 
    });
</script>

<?php echo $this->endSection(); ?>