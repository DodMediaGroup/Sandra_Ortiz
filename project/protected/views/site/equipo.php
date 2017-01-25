  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br/><span>ES UNA REALIDAD</span></h1>
  </div>
  <div class="content-team row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article"> 
        <div class="line">/
          <h1>EQUIPO<br/><span>PROFESIONAL</span></h1>
        </div>
        <?php foreach ($equipo as $key => $item) { ?>
          <div class="row section-team center-xs">
            <div style="background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/equipo/<?php echo $item->imagen; ?>) no-repeat center; margin-left: -20px;" class="col-xs-12 col-sm-5"></div>
            <div class="col-xs-12 col-sm-7 content-team-desc">
              <div class="line-team">/
                <h1><?php echo MyMethods::myStrtoupper($item->nombre); ?><br/><span><?php echo $item->cargo; ?></span></h1>
              </div>
              <p><?php echo $item->descripcion; ?></p>
              <h3><?php echo $item->correo; ?></h3>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4"> 
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>