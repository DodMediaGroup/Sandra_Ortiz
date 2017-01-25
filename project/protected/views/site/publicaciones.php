  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>PUBLICACIONES </br><span>PROPIAS</span></h1>
        </div>
        <div class="section__ver">
          <div class="row notice">
            <?php foreach ($publicaciones as $key => $publicacion) {
              $date = new DateTime($publicacion->fecha);
            ?>
              <div class="col-xs-12 col-md-6 content-notice" style="margin-top: 50px;">
                <h3><?php echo $publicacion->titulo; ?></h3><span><?php echo $date->format('d M'); ?>, <?php echo $date->format('Y'); ?></span>
                <p><?php echo substr(strip_tags($publicacion->contenido), 0, 140); ?>...<a href="<?php echo $this->createUrl('/publicacion/'.MyMethods::normalizarUrl($publicacion->id.'_'.$publicacion->titulo)); ?>"> <span>Seguir leyendo</span></a></p>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4"> 
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>