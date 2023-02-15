<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>
<?php echo $this->section('estilos'); ?>

<!-- Aqui enviamos para o template principal os estilos -->
<link rel="stylesheet" href="<?php echo site_url('admin/vendors/auto-complete/jquery-ui.css'); ?>"/>
<?php echo $this->endSection(); ?>

<?php echo $this->section('conteudo'); ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo $titulo; ?></h4>
                <div class="ui-widget">
                    <input id="query" name="query" placeholder="Pesquise por um código de pedido" class="form-control bg-light mb-5">
                </div>

                <?php if (empty($pedidos)): ?>
                    <p>Não há dados para exibir</p>
                <?php else: ?>

                    <div>
                        <button id='btn_csv' type="button" class="btn btn-outline-success float-right m-1"><span class="mdi mdi-file-excel mdi-24px"></span>Exportar CSV</button>
                        <button id='btn_pdf' type="button" class="btn btn-outline-danger float-right m-1"><span class="mdi mdi-file-pdf-box mdi-24px"></span>Exportar PDF</button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover" id="tabela_pedidos">
                            <thead>
                                <tr>
                                    <th>Código do pedido</th>
                                    <th>Data do pedido</th>
                                    <th>Cliente</th>
                                    <th>Valor</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pedidos as $pedido): ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo site_url("admin/pedidos/show/$pedido->codigo"); ?>"><?php echo $pedido->codigo; ?></a>
                                        </td>
                                        <td><?php echo $pedido->criado_em->humanize(); ?></td>
                                        <td><?php echo $pedido->cliente; ?></td>
                                        <td>R$&nbsp;<?php echo esc(number_format($pedido->valor_pedido, 2)); ?></td>
                                        <td><?php $pedido->exibeSituacaoDoPedido(); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <div class="mt-3">
                            <?php echo $pager->links() ?>
                        </div>
                    </div>

                <?php endif; ?>

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
        $("#tabela_pedidos").tableHTMLExport({
            type:'csv',
            filename:'Pedidos.csv',
        });
    });

    $("#btn_pdf").click(function(){
        let pdf = new jsPDF('p','pt',[2480, 3508]);
        pdf.html(document.getElementById('tabela_pedidos'), {
            callback: function (pdf) {
                pdf.save('Pedidos.pdf');
            }
        });
    });

    $(function () {
        $("#query").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: "<?php echo site_url('admin/pedidos/procurar'); ?>",
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function (data) {

                        if (data.length < 1) {
                            var data = [
                                {
                                    label: 'Pedido não encontrado',
                                    value: -1
                                }
                            ];
                        }
                        response(data);
                    },
                });
            },
            minLenght: 1,
            select: function (event, ui) {
                if (ui.item.value == -1) {
                    $(this).val("");
                    return false;
                } else {
                    window.location.href = '<?php echo site_url('admin/pedidos/show/'); ?>' + ui.item.value;
                }
            }
        });
    });
</script>

<?php echo $this->endSection(); ?>