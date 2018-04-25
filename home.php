<?php 

    $banner = get_field('banner','option');

    $servico = get_field('servico','option');    

    $unidades = get_field('unidade','option');   

    $leiloes = get_field('leilão','option');   

    $links_de_formularios = get_field('links_de_formularios','option');    

?>

<?php if($banner): ?>

<section id="webdoor">

    <div class="banner owl-carousel owl-theme">

        <?php foreach( $banner as $row ) : ?>

        <div style="background-image:url(<?php echo $row[imagem_de_fundo_para_o_banner]; ?>)">

            <div class="container">

                <div class="pull-right col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <?php if($row[texto_do_banner]) : ?>

                    <h1><?php echo $row[texto_do_banner]; ?></h1>

                    <?php endif; ?>

                    <?php if($row[ativar_url_no_banner]=="1") : ?>

                    <a href="<?php echo $row[url_do_banner]; ?>" class="btn btn1" title="Saiba Mais">Saiba Mais</a>

                    <?php endif; ?>

                </div>

            </div>

        </div>

        <?php endforeach; ?>

    </div>                

</section>

<?php endif; ?>

<?php if($servico): ?>

<section id="servicos"> 

    <div class="container">

        <h2>Serviços</h2>

        <?php if(get_field('subtitulo_da_sessão_serviços','option')): ?>

        <p><?php echo get_field('subtitulo_da_sessão_serviços','option'); ?></p>

        <?php endif; ?>

        <ul>

            <?php foreach( $servico as $row ) : ?>

            <li>

                <?php if($row[thumbnail_dos_serviços]) : ?>

                <span style="background-image:url(<?php echo $row[thumbnail_dos_serviços]; ?>)"></span>

                <?php endif; ?>

                <?php if($row[titulo_do_serviço]) : ?>

                <h3><?php echo $row[titulo_do_serviço]; ?></h3>

                <?php endif; ?>

                <?php if($row[descrição_do_serviço]) : ?>

                <p><?php echo $row[descrição_do_serviço]; ?></p>

                <?php endif; ?>

            </li>

            <?php endforeach; ?>

        </ul>

    </div>

</section>

<?php endif; ?>

<section id="quem-somos"> 

    <div class="container">

        <h2>Quem Somos</h2>

        <?php if(get_field('subtitulo_da_sessão_quem_somos','option')): ?>

        <p><?php echo get_field('subtitulo_da_sessão_quem_somos','option'); ?></p>

        <?php endif; ?>

        <div class="quem-somos clearfix">

            <?php if(get_field('imagem_da_sessão_quem_somos','option')) : ?>

            <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12" style="background-image:url(<?php echo get_field('imagem_da_sessão_quem_somos','option'); ?>);"><!----></div>

            <?php if(get_field('texto_de_quem_somos','option')) : ?>

                <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">

                    <p><?php echo get_field('texto_de_quem_somos','option'); ?></p>

                    <?php if(get_field('habilitar_url_da_sessão_quem_somos','option')=="1") : ?>

                    <a href="<?php echo get_field('url_do_botão_da_sessão_quem_somos','option'); ?>" class="btn btn1" title="Saiba Mais">Saiba Mais</a>

                    <?php endif; ?>

                </div>

            <?php endif; ?>

            <?php elseif(get_field('texto_de_quem_somos','option')) : ?>

                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                    <p><?php echo get_field('texto_de_quem_somos','option'); ?></p>

                    <?php if(get_field('habilitar_url_da_sessão_quem_somos','option')=="1") : ?>

                    <a href="<?php echo get_field('url_do_botão_da_sessão_quem_somos','option'); ?>" class="btn btn1" title="Saiba Mais">Saiba Mais</a>

                    <?php endif; ?>

                </div>

            <?php else : ?>

            <style type="text/css">

                #quem-somos{margin-bottom:0 !important;}

            </style>

            <?php endif; ?>

        </div>

    </div>

</section>

<?php if($unidades):$counter = 0; ?>

<section id="unidades"> 

    <div class="container">

        <h2>Nossas Unidades</h2>

        <?php if(get_field('subtitulo_da_sessão_nossas_unidades','option')): ?>

        <p><?php echo get_field('subtitulo_da_sessão_nossas_unidades','option'); ?></p>

        <?php endif; ?>
        <div class="unidades owl-carousel owl-theme">

            <?php foreach( $unidades as $row ) : if ($counter % 2 == 0) : echo $counter > 0 ? "</div>" : ""; echo "<div>";  endif; ?>

            <div class="item clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-image:url(<?php if($row[thumbnail_da_unidade]) : echo $row[thumbnail_da_unidade]; else : echo "http://www.fisk.com.br/file/franchisee/47semimagem.jpg"; endif; ?>);"><!----></div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                    <h4><?php echo $row[tìtulo_da_unidade]; ?></h4>

                    <p><?php echo $row[endereço_da_unidade]; ?></p>

                    <p>

                        <i>

                            <svg class="svg-icon" viewBox="0 0 20 20">

                                <path fill="none" d="M14.9,6.707c-0.804-2.497-3.649-4.351-7.035-4.351c-4.008,0-7.27,2.594-7.27,5.782

                                    c0,2.163,1.516,4.133,3.903,5.122v3.091c0,0.251,0.144,0.478,0.372,0.586c0.087,0.042,0.182,0.062,0.276,0.062

                                    c0.148,0,0.295-0.051,0.412-0.15l3.678-3.038c0.14-0.022,0.275-0.057,0.413-0.084c0.655,0.666,1.544,1.185,2.607,1.46

                                    c0.198,0.051,0.401,0.094,0.608,0.125l2.641,2.182c0.118,0.099,0.264,0.15,0.413,0.15c0.094,0,0.188-0.02,0.276-0.062

                                    c0.228-0.108,0.372-0.335,0.372-0.586v-2.135c1.74-0.761,2.84-2.231,2.84-3.846C19.405,8.862,17.456,7.073,14.9,6.707z

                                    M8.885,12.552c-0.019,0.003-0.032,0.018-0.051,0.022c-0.101,0.022-0.2,0.056-0.281,0.123l-2.76,2.28v-2.161

                                    c0-0.275-0.175-0.521-0.434-0.612C3.253,11.467,1.89,9.871,1.89,8.138c0-2.474,2.68-4.487,5.975-4.487

                                    c2.604,0,4.801,1.265,5.617,3.014c0.187,0.401,0.302,0.823,0.33,1.268c0.005,0.069,0.028,0.134,0.028,0.205

                                    c0,1.819-1.481,3.438-3.706,4.129c-0.115,0.037-0.224,0.08-0.343,0.111C9.497,12.455,9.196,12.513,8.885,12.552z M15.703,13.809

                                    c-0.259,0.091-0.434,0.336-0.434,0.612v1.199l-1.723-1.422c-0.095-0.079-0.211-0.129-0.333-0.144

                                    c-0.219-0.028-0.431-0.068-0.636-0.121c-0.545-0.14-1.023-0.364-1.433-0.64c2.423-0.969,3.99-2.942,3.99-5.155

                                    c0-0.024-0.004-0.047-0.005-0.071c1.718,0.385,2.98,1.553,2.98,2.948C18.11,12.202,17.165,13.299,15.703,13.809z"></path>

                                <path fill="none" d="M4.68,7.591h6.167c0.358,0,0.648-0.29,0.648-0.648s-0.29-0.648-0.648-0.648H4.68

                                    c-0.358,0-0.648,0.29-0.648,0.648S4.323,7.591,4.68,7.591z"></path>

                                <path fill="none" d="M8.709,8.636H4.68c-0.358,0-0.648,0.29-0.648,0.648c0,0.358,0.29,0.648,0.648,0.648h4.028

                                    c0.358,0,0.648-0.29,0.648-0.648C9.356,8.926,9.067,8.636,8.709,8.636z"></path>

                            </svg>

                        </i> <?php echo $row[telefone_da_unidade]; ?>

                    </p>

                    <p>

                        <i>

                            <svg class="svg-icon" viewBox="0 0 20 20">

                            <path fill="none" d="M11.088,2.542c0.063-0.146,0.103-0.306,0.103-0.476c0-0.657-0.534-1.19-1.19-1.19c-0.657,0-1.19,0.533-1.19,1.19c0,0.17,0.038,0.33,0.102,0.476c-4.085,0.535-7.243,4.021-7.243,8.252c0,4.601,3.73,8.332,8.332,8.332c4.601,0,8.331-3.73,8.331-8.332C18.331,6.562,15.173,3.076,11.088,2.542z M10,1.669c0.219,0,0.396,0.177,0.396,0.396S10.219,2.462,10,2.462c-0.22,0-0.397-0.177-0.397-0.396S9.78,1.669,10,1.669z M10,18.332c-4.163,0-7.538-3.375-7.538-7.539c0-4.163,3.375-7.538,7.538-7.538c4.162,0,7.538,3.375,7.538,7.538C17.538,14.957,14.162,18.332,10,18.332z M10.386,9.26c0.002-0.018,0.011-0.034,0.011-0.053V5.24c0-0.219-0.177-0.396-0.396-0.396c-0.22,0-0.397,0.177-0.397,0.396v3.967c0,0.019,0.008,0.035,0.011,0.053c-0.689,0.173-1.201,0.792-1.201,1.534c0,0.324,0.098,0.625,0.264,0.875c-0.079,0.014-0.155,0.043-0.216,0.104l-2.244,2.244c-0.155,0.154-0.155,0.406,0,0.561s0.406,0.154,0.561,0l2.244-2.242c0.061-0.062,0.091-0.139,0.104-0.217c0.251,0.166,0.551,0.264,0.875,0.264c0.876,0,1.587-0.711,1.587-1.587C11.587,10.052,11.075,9.433,10.386,9.26z M10,11.586c-0.438,0-0.793-0.354-0.793-0.792c0-0.438,0.355-0.792,0.793-0.792c0.438,0,0.793,0.355,0.793,0.792C10.793,11.232,10.438,11.586,10,11.586z"></path>

                        </svg>

                        </i> <?php echo $row[horario_de_atendimento]; ?>

                    </p>

                </div>
            </div>

            <?php $counter++; endforeach; ?>

        </div>

    </div>

</section>

<?php else : ?>

<style>
    #quem-somos{
        margin-bottom:60px !important;
    }
    .pg-home #webdoor ~ section:nth-of-type(4n+4) h2{
        color:#00baff;
    }
</style>

<?php endif; ?>

<?php if($leiloes): ?>

<section id="leiloes"> 

    <div class="container">

        <h2>Leilões</h2>

        <?php if(get_field('subtitulo_da_sessão_leilões','option')): ?>

        <p><?php echo get_field('subtitulo_da_sessão_leilões','option'); ?></p>

        <?php endif; ?>

        <div class="leiloes clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">

                <p class="text-left"><?php echo get_field('texto_da_sessão_leilões','option'); ?></p>

                <ul class="clearfix">

                    <?php foreach( $leiloes as $row ) : ?>

                    <li class="col-lg-12 col-md-6 col-sm-6 col-xs-12">

                        <div>

                            <ul class="text-left">

                                <li class="text-center"><?php echo "<a href='".$row[url_do_leiloeiro]."' title='".$row[codigo_do_leilao]."' target='_blank'>".$row[codigo_do_leilao]."</a>"; ?></li>

                                <!--url_do_leiloeiro-->

                                <li><?php echo "<a href='".$row[url_do_leiloeiro]."' title='".$row[codigo_do_leilao]."' target='_blank'><img height='80' src='".$row[logotipo_do_leiloeiro]."' /></a>"; ?></li>

                                <li><small>Data:</small><br/><?php echo $row[data_do_leilao]; ?></li>

                                <li><small>Horário:</small><br/><?php echo $row[horario_do_leilao]; ?></li>

                                <li>

                                    <small>Leilão</small><br/>

                                    <?php  

                                        foreach( $row[o_leilao] as $k=>$leilao ) :

                                        if($k) echo ' e ';

                                        echo $leilao;

                                        endforeach; 

                                    ?>

                                </li>

                                <li class="text-right"><?php echo "<a class='btn btn1' href='".$row[diario_oficial]."'>Diário Oficial</a>"; ?></li>                            

                            </ul>                            

                        </div>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php if(get_field('ativar_botão_para_outra_pagina','option')=="1"): ?>

                <a href="<?php echo get_field('url_do_botão_da_sessão','option'); ?>" class="btn btn1" title="<?php echo get_field('label_do_botão_da_url','option'); ?>"><?php echo get_field('label_do_botão_da_url','option'); ?></a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</section>

<?php endif; ?>

<section id="fale-conosco" style="background-image:url(<?php echo get_field('background_da_sessão_fale_conosco','option'); ?>);"> 

    <div class="container">

        <h2>Fale Conosco</h2>

        <?php if(get_field('subtitulo_da_sessão_fale_conosco','option')): ?>

        <p><?php echo get_field('subtitulo_da_sessão_fale_conosco','option'); ?></p>

        <?php endif; ?>

        <?php if(get_field('background_da_sessão_fale_conosco','option')) : ?>

            <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12">

                <?php if(get_field('texto_da_sessão_fale_conosco','option')): ?>

                <p><?php echo get_field('texto_da_sessão_fale_conosco','option'); ?></p>

                <?php endif; ?>

                <?php if($links_de_formularios): ?>

                <ul class="accordion">

                    <?php foreach( $links_de_formularios as $row ) : ?>

                    <li>

                        <a target="_blank" href="<?php echo $row[url_do_link]; ?>" title="<?php echo $row[tìtulo_do_link]; ?>">

                            <i class="hidden-xs">

                                <img height="67" src="<?php echo $row[ícone_do_link]; ?>" />

                            </i>

                            <span><?php echo $row[tìtulo_do_link]; ?></span> 

                            <i>

                                <svg class="svg-icon" viewBox="0 0 20 20">

                                    <path fill="none" d="M14.989,9.491L6.071,0.537C5.78,0.246,5.308,0.244,5.017,0.535c-0.294,0.29-0.294,0.763-0.003,1.054l8.394,8.428L5.014,18.41c-0.291,0.291-0.291,0.763,0,1.054c0.146,0.146,0.335,0.218,0.527,0.218c0.19,0,0.382-0.073,0.527-0.218l8.918-8.919C15.277,10.254,15.277,9.784,14.989,9.491z"></path>

                                </svg>                                        

                            </i>

                        </a>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php endif; ?>

            </div>

        <?php else : ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <?php if(get_field('texto_da_sessão_fale_conosco','option')): ?>

                <p><?php echo get_field('texto_da_sessão_fale_conosco','option'); ?></p>

                <?php endif; ?>

                <?php if($links_de_formularios): ?>

                <ul class="accordion">

                    <?php foreach( $links_de_formularios as $row ) : ?>

                    <li>

                        <a target="_blank" href="<?php echo $row[url_do_link]; ?>" title="<?php echo $row[tìtulo_do_link]; ?>">

                            <i class="hidden-xs">

                                <img height="67" src="<?php echo $row[ícone_do_link]; ?>" />

                            </i>

                            <span><?php echo $row[tìtulo_do_link]; ?></span> 

                            <i>

                                <svg class="svg-icon" viewBox="0 0 20 20">

                                    <path fill="none" d="M14.989,9.491L6.071,0.537C5.78,0.246,5.308,0.244,5.017,0.535c-0.294,0.29-0.294,0.763-0.003,1.054l8.394,8.428L5.014,18.41c-0.291,0.291-0.291,0.763,0,1.054c0.146,0.146,0.335,0.218,0.527,0.218c0.19,0,0.382-0.073,0.527-0.218l8.918-8.919C15.277,10.254,15.277,9.784,14.989,9.491z"></path>

                                </svg>                                        

                            </i>

                        </a>

                    </li>

                    <?php endforeach; ?>

                </ul>

                <?php endif; ?>

            </div>

        <?php endif; ?>

    </div>

</section>