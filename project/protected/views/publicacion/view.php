<?php
  $date = new DateTime($model->fecha);
  $currentUrl = Yii::app()->request->hostInfo . Yii::app()->request->url;
?>
  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>COMUNICADOS <br/><span>DE PRENSA</span></h1>
        </div>
      </div>
      <?php if($model->imagen != ""){ ?>
        <div class="section-image-ley"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/publicaciones/<?php echo $model->imagen; ?>"/></div>
      <?php } ?>
      <div class="title-green-date">
        <h3><?php echo $model->titulo; ?></h3>
        <p><?php echo $date->format('M d, Y') ?></p>
      </div>
      <div class="row">
        <div class="text-gray">
          <?php echo $model->contenido; ?>
          </br>
          <?php if($model->fuente != ''){ ?>
            <p><strong>Fuente: </strong><a href="<?php echo $model->fuente; ?>" target="_blank"><?php echo $model->fuente; ?></a></p>
          <?php } ?>
        </div>
        <div class="row section-btn-social">
          <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $currentUrl; ?>" class="social-btn face-btn">
            <div class="col-xs-2"><span></span>
              <p>Facebook</p>
            </div>
          </a>
          <a target="_blank" href="https://twitter.com/intent/tweet?via=SandraOrtizN&text=Conoce%20nuestro%20proyecto&url=<?php echo $currentUrl ?>" class="social-btn twitter-btn">
            <div class="col-xs-2"><span></span>
              <p>Twitter</p>
            </div>
          </a>
          <a target="_blank" href="https://plus.google.com/share?url=<?php echo $currentUrl ?>" class="social-btn google-btn">
            <div class="col-xs-2"><span></span>
              <p>Google+</p>
            </div>
          </a>
          <!--<a href="" class="social-btn mail-btn">
            <div class="col-xs-2"><span></span>
              <p>E-mail</p>
            </div>
          </a>-->
          <a target="_blank" href="whatsapp://send?text=Conoce nuestro proyecto – <?php echo $currentUrl; ?>" class="social-btn whatsapp-btn">
            <div class="col-xs-2"><span></span>
              <p>WhatsApp</p>
            </div>
          </a>
        </div>

        <div class="col-xs-12"><a href="<?php echo $this->createUrl('/'.(($model->categoria == 3)?'comunicados_prensa':(($model->categoria == 2)?'publicaciones_propias':'noticias'))); ?>">
            <p class="volver__red"><< VOLVER </p></a></div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4"> 
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>