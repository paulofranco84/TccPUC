<?php echo $this->extend('Admin/layout/principal'); ?>
<?php echo $this->section('titulo'); ?> <?php echo $titulo; ?> <?php echo $this->endSection(); ?>
<?php echo $this->section('conteudo'); ?>
<!-- Aqui enviamos para o template principal os conteudos -->

  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $titulo; ?></h4>
                    <?php if(session()->has('errors_model')): ?>
                        <ul>
                            <?php foreach (session('errors_model') as $error): ?>
                                <li class="text-danger"><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php echo form_open("admin/expedientes/index",['class' => 'form-row']); ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Dia</th>
                                <th>Abertura</th>
                                <th>Fechamento</th>
                                <th>Situação</th>
                              </tr>
                            </thead>
                            <tbody>

                              <?php foreach ($expedientes as $dia) : ?>
                                  <tr>
                                      <td class="form-group col-md-3">
                                          <input type="type" name="dia_descricao[]" class="form-control" value="<?php echo esc($dia->dia_descricao) ?>" readonly="">
                                      </td>
                                      <td class="form-group col-md-3">
                                          <input type="time" name="abertura[]" class="form-control" value="<?php echo esc($dia->abertura) ?>" required="">
                                      </td>
                                      <td class="form-group col-md-3">
                                          <input type="time" name="fechamento[]" class="form-control" value="<?php echo esc($dia->fechamento) ?>" required="">
                                      </td>
                                      <td class="form-group col-md-3">
                                          <select class="form-control" name="situacao[]" required="">
                                              <option value="1" <?php echo ($dia->situacao ? 'selected' : ''); ?>>Aberto</option>
                                              <option value="0" <?php echo (!$dia->situacao ? 'selected' : ''); ?>>Fechado</option>
                                          </select>
                                      </td>
                                  </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                              <div class="card-footer bg-white">
                                <button type="submit" class="btn btn-primary text-white mr-2 btn-sm">
                                  <i class="mdi mdi-checkbox-marked-circle btn-icon-prepend"></i> Salvar
                                </button>
                              </div>
                        </div>

                    <?php echo form_close(); ?>

                  </div>
                </div>
      </div>
  </div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<!-- Aqui enviamos para o template principal os scripts -->

<?php echo $this->endSection(); ?>