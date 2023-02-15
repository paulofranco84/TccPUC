<html lang="pt-br">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Food Delivery | <?php echo $this->renderSection('titulo') ?></title>
        <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="all" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" media="all" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/fonts.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/slick.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/slick-theme.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/aos.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/scrolling-nav.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-datepicker.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/bootstrap-datetimepicker.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/touch-sideswipe.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/jquery.fancybox.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/main.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo site_url('web/'); ?>src/assets/css/responsive.css" type="text/css" rel="stylesheet" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/apple-touch-icon.png" />
        <link rel="icon" type="image/png" sizes="256x256"  href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-256x256.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo site_url('web/'); ?>src/assets/img/favicon/android-chrome-192x192.png">    
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-32x32.png" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon-16x16.png" />
        <link rel="icon" type="image/png" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/favicon.ico" />
        <link rel="mask-icon" href="<?php echo site_url('web/'); ?>src/assets/img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#990100" />
        <meta name="theme-color" content="#ffffff" />    
        <style>
            .navbar-nav > li > a{
                line-height: 30px;
            }

            .btn-food{
                background-color: #990100; 
                color: white !important; 
                font-family: 'Montserrat-Bold';
            }

            .fonte-food{
                color: #990100 !important; 
                font-family: 'Montserrat-Bold';
            }

            .panel-food{
                background: #990100 !important; 
                color: white !important; 
                font-family: 'Montserrat-Bold';
            }
        </style>
        <!-- Essa section renderizará os estilos específicos da view que estender esse layout -->
        <?php echo $this->renderSection('estilos') ?>
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">  
        <div class="loading-overlay">
            <div class="spinner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="body-wrapper">
            <header id="header">
                <div id="main-carousel" class="carousel slide" data-ride="carousel">
                    <div class="container pos_rel" style="min-height: 1vh !important">
                        <ol class="carousel-indicators">
                            <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#main-carousel" data-slide-to="1"></li>
                        </ol>
                        <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="carousel-caption">
                                    <div class="fadeUp item_img">
                                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/pizza.png" alt="Pizza" /> 
                                        <div class="item_badge">
                                            <span class="badge_btext">20%</span>
                                            <span class="badge_stext">Desconto</span>
                                        </div>
                                    </div>
                                    <div class="fadeUp fade-slow item_details">
                                        <h4 class="item_name">Vamos de pizza?</h4>
                                        <p class="item_info">Venha conhecer nossos produtos e surpreenda-se.</p>
                                        <div class="item_link_box">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="carousel-caption">
                                    <div class="fadeUp item_img">
                                        <img src="<?php echo site_url('web/'); ?>src/assets/img/photos/pizza.webp" alt="sample" />
                                        <div class="item_badge">
                                            <span class="badge_btext">20%</span>
                                            <span class="badge_stext">Desconto</span>
                                        </div>
                                    </div>
                                    <div class="fadeUp fade-slow item_details">
                                        <h4 class="item_name">Peça online!</h4>
                                        <p class="item_info">E receba quentinha na sua casa.</p>
                                        <div class="item_link_box">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="navigation">
                    <div class="navbar-container" data-spy="affix" data-offset-top="400">
                        <div class="container">
                            <div class="navbar_top hidden-xs">
                                <div class="top_addr">
                                    <?php $expedienteHoje = expedienteHoje(); ?>
                                    <?php if ($expedienteHoje->situacao == false): ?>
                                        <span><i class="fa fa-lock" aria-hidden="true"></i> Hoje estamos fechados</span>
                                    <?php else: ?>
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i>Hoje estamos abertos das <?php echo substr(esc($expedienteHoje->abertura),0,5); ?> até as <?php echo substr(esc($expedienteHoje->fechamento),0,5); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <nav class="navbar">
                                <div id="navbar_content">
                                    <div class="navbar-header">
                                        <a class="navbar-brand" href="<?php echo site_url('/'); ?>">
                                        </a>
                                        <a href="#cd-nav" class="cd-nav-trigger right_menu_icon">
                                            <span><i class="fa fa-bars" aria-hidden="true"></i></span>
                                        </a>
                                    </div>

                                    <div class="collapse navbar-collapse" id="navbar">
                                        <div class="navbar-right">
                                            <ul class="nav navbar-nav">
                                                <li><a class="page-scroll" href="<?php echo site_url('/'); ?>">Home</a></li>
                                                <li><a class="page-scroll" href="<?php echo site_url('bairros'); ?>">Bairros atendidos</a></li>
                                                <?php if (session()->has('carrinho') && count(session()->get('carrinho')) > 0): ?>
                                                    <li>
                                                        <a class="page-scroll" href="<?php echo site_url('carrinho'); ?>">
                                                            <i class="fa fa-shopping-cart fa fa-2x"></i>
                                                            <span style="font-size: 25px !important">
                                                                <?php echo count(session()->get('carrinho')); ?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>

                                                <?php if (usuario_logado()): ?>
                                                    <li><a class="page-scroll" href="<?php echo site_url('conta'); ?>">Minha conta</a></li>
                                                    <li><a class="page-scroll" href="<?php echo site_url('login/logout'); ?>">Sair</a></li>
                                                <?php else: ?>
                                                    <li><a class="page-scroll" href="<?php echo site_url('login'); ?>">Entrar</a></li>
                                                    <li><a class="page-scroll" href="<?php echo site_url('registrar'); ?>">Registrar-se</a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                </div>
            </header>

            <div class="container" style="margin-top: 2em;">
                <?php if (session()->has('sucesso')): ?>
                    <div class="alert alert-success" role="alert"><?php echo session('sucesso'); ?></div>
                <?php endif; ?>

                <?php if (session()->has('info')): ?>
                    <div class="alert alert-info" role="alert"><?php echo session('info'); ?></div>
                <?php endif; ?>

                <?php if (session()->has('atencao')): ?>
                    <div class="alert alert-danger" role="alert"><?php echo session('atencao'); ?></div>
                <?php endif; ?>

                <?php if (session()->has('fraude')): ?>
                    <div class="alert alert-warning" role="alert"><?php echo session('fraude'); ?></div>
                <?php endif; ?>

                <?php if (session()->has('expediente')): ?>
                    <div class="alert alert-warning" role="alert"><?php echo session('expediente'); ?></div>
                <?php endif; ?>

                <!-- Captura os erros de CSRF - Ação não permitida -->
                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger" role="alert"><?php echo session('error'); ?></div>
                <?php endif; ?>
            </div>

            <?php $this->renderSection('conteudo'); ?>

            <footer id="footer">
                <div class="section" id="contact">
                    <div id="googleMap" style="max-height: 200px"></div> 
                    <div class="footer_pos">
                        <div class="container">
                            <div class="footer_content">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <h4 class="footer_ttl footer_ttl_padd">Sobre nós</h4>
                                        <p class="footer_txt">Nossos produtos utilizam ingredientes selecionados, feitos com muito carinho para te proporcionar uma experiência incrível. </p>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                        <?php $expedientes = expedientes(); ?>
                                        <h4 class="footer_ttl footer_ttl_padd">Nosso expediente</h4>
                                        <div class="footer_border">
                                            <?php foreach ($expedientes as $dia): ?>
                                                <div class="week_row clearfix">
                                                    <div class="week_day"><?php echo esc($dia->dia_descricao); ?></div>
                                                    <?php if ($dia->situacao == false): ?>
                                                        <div class="week_time text-right">Fechado</div>
                                                    <?php else: ?>
                                                        <div class="week_time text-right">Aberto</div>
                                                        <div class="week_time">
                                                            <span class="week_time_start"><?php echo esc($dia->abertura); ?></span>
                                                            <span class="week_time_node">-</span>
                                                            <span class="week_time_end"><?php echo esc($dia->fechamento); ?></span>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <nav class="cd-nav-container right_menu" id="cd-nav">
            <div class="header__open_menu">
                <a href="<?php echo site_url('/'); ?>" class="rmenu_logo" title="Food delivery"></a>
            </div>

            <ul class="rmenu_list">
                <li><a class="page-scroll" href="<?php echo site_url('/'); ?>">Home</a></li>
                <li><a class="page-scroll" href="<?php echo site_url('bairros'); ?>">Bairros atendidos</a></li>

                <?php if (session()->has('carrinho') && count(session()->get('carrinho')) > 0): ?>
                    <li>
                        <a class="page-scroll" href="<?php echo site_url('carrinho'); ?>">
                            <i class="fa fa-shopping-cart fa fa-2x"></i>
                            <p style="font-size: 25px !important">
                                <?php echo count(session()->get('carrinho')); ?>
                            </p>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (usuario_logado()): ?>
                    <li><a class="page-scroll" href="<?php echo site_url('conta'); ?>">Minha conta</a></li>
                    <li><a class="page-scroll" href="<?php echo site_url('login/logout'); ?>">Sair</a></li>
                <?php else: ?>
                    <li><a class="page-scroll" href="<?php echo site_url('login'); ?>">Entrar</a></li>
                    <li><a class="page-scroll" href="<?php echo site_url('registrar'); ?>">Registrar-se</a></li>
                <?php endif; ?>
            </ul>
            <div class="right_menu_addr top_addr">
                <?php $expedienteHoje = expedienteHoje(); ?>
                <?php if ($expedienteHoje->situacao == false): ?>
                    <span><i class="fa fa-lock" aria-hidden="true"></i> Hoje estamos fechados</span>
                <?php else: ?>
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc($expedienteHoje->abertura); ?> - <?php echo esc($expedienteHoje->fechamento); ?></span>
                <?php endif; ?>
            </div>
        </nav>

        <div class="cd-overlay"></div>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.mousewheel.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.easing.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/scrolling-nav.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/aos.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/slick.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.touchSwipe.min.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/moment.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap-datepicker.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/bootstrap-datetimepicker.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/jquery.fancybox.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/loadMoreResults.js"></script>
        <script src="<?php echo site_url('web/'); ?>src/assets/js/main.js"></script>

        <!-- Essa section renderizará os scripts específicos da view que estender esse layout -->
        <?php echo $this->renderSection('scripts') ?>
    </body>
</html> 