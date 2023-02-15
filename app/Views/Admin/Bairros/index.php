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
                        <input id="query" name="query" placeholder="Pesquise por um bairro de Americana" class="form-control bg-light mb-5">
                    </div>

                    <div>
                        <a href="<?php echo site_url("Admin/Bairros/criar"); ?>" class="btn btn-success m-1">
                            <i class="mdi mdi-plus"></i> Cadastrar
                        </a>
                        <button id='btn_csv' type="button" class="btn btn-outline-success float-right m-1"><span class="mdi mdi-file-excel mdi-24px"></span>Exportar CSV</button>
                        <button id='btn_pdf' type="button" class="btn btn-outline-danger float-right m-1"><span class="mdi mdi-file-pdf-box mdi-24px"></span>Exportar PDF</button>
                    </div>

                    <div class="table-responsive">
                      <table id="tabela_bairros" class="table table-hover">
                        <thead>
                          <tr>
                            <th>Nome</th>
                            <th>Valor de Entrega</th>
                            <th>Data de Criação</th>
                            <th>Ativo</th>
                            <th>Situação</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($bairros as $bairro) : ?>
                              <tr>
                                  <td><a href="<?php echo site_url("Admin/Bairros/show/$bairro->id"); ?>"><?php echo $bairro->nome; ?></a></td>
                                  <td>R$&nbsp<?php echo esc(number_format($bairro->valor_entrega,2)); ?></td>
                                  <td><?php echo $bairro->criado_em->humanize(); ?></td>
                                  <td><?php echo ($bairro->ativo && $bairro->deletado_em == null ? '<label class="badge badge-primary">Sim</label>' : '<label class="badge badge-danger">Não</label>')?></td>
                                  <td>
                                      <?php echo ($bairro->deletado_em == null ? '<label class="badge badge-primary">Disponível</label>' : '<label class="badge badge-danger">Excluído</label>')?>
                                      <?php if($bairro->deletado_em != null): ?>
                                          <a href="<?php echo site_url("Admin/Bairros/desfazerexclusao/$bairro->id"); ?>" class="badge badge-dark ml-2">
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
        $("#tabela_bairros").tableHTMLExport({
            type:'csv',
            filename:'Bairros.csv',
        });
    });

    $("#btn_pdf").click(function(){
        let pdf = new jsPDF('p','pt',[2480, 3508]);
        pdf.html(document.getElementById('tabela_bairros'), {
            callback: function (pdf) {
                pdf.save('Bairros.pdf');
            }
        });
    });

    $(()=>{
      $("#query").autocomplete({
        source: (request, response)=>{
          $.ajax({
            url: "<?php echo site_url('Admin/Bairros/procurar'); ?>",
            dataType: "json",
            data: {
              term:request.term
            },
            success: (data)=>{
              if(data.length<1){
                var data = [
                  {
                    label: 'bairro não encontrado',
                    value: -1
                  }
                ];
              }
              response(data); //aqui temos valor no data
            },
          }); //fim do ajax
        },
        minLength: 1,
        select: (event, ui)=>{
            if(ui.item.value == -1){
                $(this).val("");
                return false;
            } else {
                window.location.href = '<?php echo site_url('Admin/Bairros/show/'); ?>' + ui.item.id;
            }
        }
      }); //fim autocomplete
    });
</script>

<?php echo $this->endSection(); ?>