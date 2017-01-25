  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>PROYECTOS  <br/><span>DE LEY</span></h1>
        </div>
        <div class="row">
          <?php echo $pagina->contenido; ?>
        </div>
        
        <div class="line">/
          <h1>PROYECTOS<br/><span>PROPIOS</span></h1>
        </div>
        <div class="row">
          <?php foreach ($proyectosPropios as $key => $proyecto) { ?>
            <div class="col-xs-12 col-md-6 img-pry"><a href="<?php echo $this->createUrl('/proyecto/'.MyMethods::normalizarUrl($proyecto->id.'_'.$proyecto->nombre)); ?>">
                <div style="background: url(images/<?php echo ($proyecto->imagen != '')?('proyectos/'.$proyecto->imagen):'admin/gray.jpg'; ?>) no-repeat center;" class="cont-serv-img">
                  <div class="red-hover"></div>
                  <div class="fondo-gris-image-proyect"></div>
                  <div class="btn-lg">
                    <p>Conoce +</p>
                  </div>
                </div></a></div>
          <?php } ?>
        </div>

        <div class="line">/
          <h1>PROYECTOS<br/><span>APOYADOS</span></h1>
        </div>
        <div class="row section__ver">
          <?php foreach ($proyectosApoyados as $key => $proyecto) { ?>
            <div style="margin-top: 30px;" class="col-xs-12 col-sm-10">
              <div class="content-calendar row middle-xs">
                <p><?php echo $proyecto->nombre; ?><!--<br/><span>Yopal - Colombia</span>--></p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-2 headerver"><a>
                <div class="btn-calendar row middle-xs">
                  <p class="col-xs-12">VER +</p>
                </div></a></div>
            <div class="contentvermas col-xs-11">
              <?php echo $proyecto->contenido; ?>

              <?php if($proyecto->archivo != ''){ ?>
                <div style="text-align: -webkit-center; margin-top: 50px;" class="col-xs-12"><a href="<?php echo Yii::app()->request->baseUrl; ?>/files/<?php echo $proyecto->archivo; ?>" class="media"></a></div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4"> 
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>