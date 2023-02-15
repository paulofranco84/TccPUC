<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Food Delivery | <?php echo $this->renderSection('titulo'); ?></title>
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo site_url('admin/'); ?>css/style.css">
  <link rel="shortcut icon" href="<?php echo site_url('admin/'); ?>images/favicon.png" />

  <!-- Esta section renderizará os estilos específicos da view que estender esse layout -->
  <?php echo $this->renderSection('estilos'); ?>
</head>

<body>
  <div class="container-scroller">
    <!-- Esta section renderizará os conteudos específicos da view que estender esse layout -->
    <?php echo $this->renderSection('conteudo'); ?>
  </div>
  <script src="<?php echo site_url('admin/'); ?>vendors/base/vendor.bundle.base.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/off-canvas.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/hoverable-collapse.js"></script>
  <script src="<?php echo site_url('admin/'); ?>js/template.js"></script>

  <!-- Esta section renderizará os scripts específicos da view que estender esse layout -->
  <?php echo $this->renderSection('scripts'); ?>
</body>
</html>