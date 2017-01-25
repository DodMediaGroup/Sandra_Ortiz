  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>FOROS</h1>
        </div>
        <div class="row">
          <?php echo $pagina->contenido; ?>
        </div>
        <div class="row">
          <?php foreach ($foros as $key => $foro) { ?>
            <div class="col-xs-12 col-md-6 img-pry"><a href="<?php echo $this->createUrl('/foro/'.MyMethods::normalizarUrl($foro->id.'_'.$foro->nombre)); ?>">
                <div style="background: url(images/<?php echo ($foro->imagen != '')?('foros/'.$foro->imagen):'admin/gray.jpg'; ?>) no-repeat center;"  class="cont-serv-img">
                  <div class="red-hover"></div>
                  <div class="fondo-gris-image-proyect"></div>
                  <div class="btn-lg">
                    <p>Conoce +</p>
                  </div>
                </div></a></div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4"> 
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>