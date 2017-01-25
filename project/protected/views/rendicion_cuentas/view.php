  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>RENDICIÓN  <br/><span>DE CUENTAS</span></h1>
        </div>
        <div class="row section__ver">
          <?php foreach ($items as $key => $item) { ?>
            <div style="margin-top: 30px;" class="col-xs-12 col-sm-10 row middle-xs">
              <div class="content-calendar col-xs-12">
                <p><?php echo $item->titulo; ?><br/><span><?php echo $item->tipo; ?></span></p>
              </div>
            </div>
            <div class="col-xs-12 col-sm-2 headerver"><a>
                <div class="btn-calendar row middle-xs">
                  <p class="col-xs-12">VER +</p>
                </div></a></div>
            <div class="contentvermas col-xs-11">
              <?php echo $item->contenido; ?>

              <?php if($item->archivo != ''){ ?>
                <div style="text-align: -webkit-center; margin-top: 50px;" class="col-xs-12"><a href="<?php echo Yii::app()->request->baseUrl; ?>/files/<?php echo $item->archivo; ?>" class="media"></a></div>
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