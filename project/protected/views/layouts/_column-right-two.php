      <div class="row content-right">
        <div class="line">/
          <h1>REDES <br/><span>SOCIALES</span></h1>
        </div>
        <div class="content-social">
          <?php $social = GeneralValue::model()->findByPk(3); ?>
          <a href="<?php echo $social->value; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/face.svg"/></a>
          <?php $social = GeneralValue::model()->findByPk(5); ?>
          <a href="<?php echo $social->value; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/twitter.svg"/></a>
          <?php $social = GeneralValue::model()->findByPk(4); ?>
          <a href="<?php echo $social->value; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/youtube.svg"/></a>
        </div>

        <a data-width="350px" href="https://twitter.com/SandraOrtizN" data-widget-id="709968317876985856" class="twitter-timeline"></a><br/><br/>
        
        <div style="margin-top: 30px;" data-href="https://www.facebook.com/sandraortizoficial/" data-width="310px" data-tabs="timeline" data-height="300" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" class="fb-page">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/sandraortizoficial/?fref=ts"><a href="https://www.facebook.com/sandraortizoficial/?fref=ts"></a></blockquote>
          </div>
        </div>

        <div class="col-xs-12 line">/
          <h1>CUÉNTENOS SU<br/><span>DENUNCIA</span></h1>
        </div>
        <div class="col-xs-12">
          <form class="form-right row">
            <div class="col-xs-12">
              <select name="tipo">
                <option>Tema o categoría</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
              <input name="" placeholder="Correo electronico"/>
              <textarea name="" placeholder="Denuncia"></textarea>
            </div>
            <div class="col-xs-5">
              <input name="" placeholder="Nombre"/>
            </div>
            <div class="col-xs-6">
              <input name="" placeholder="Apellido" class="input-left"/>
            </div>
            <button type="submit">
              <div class="btn-form">
                <p>ENVIAR</p>
              </div>
            </button>
          </form>
        </div>
        
        <div class="line">/ 
          <h1>PUBLICACIONES<br/><span>PROPIAS </span></h1>
        </div>
        <?php $publicaciones = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>2), array('order'=>'t.id DESC', 'limit'=>2)); ?>
        <?php foreach ($publicaciones as $key => $publicacion) {
          $date = new DateTime($publicacion->fecha);
        ?>
          <div class="col-xs-12 content-notice">
            <h3><?php echo $publicacion->titulo; ?></h3><span><?php echo $date->format('d M'); ?>, <?php echo $date->format('Y'); ?></span>
            <p><?php echo substr(strip_tags($publicacion->contenido), 0, 140); ?>...<a href="<?php echo $this->createUrl('/publicacion/'.MyMethods::normalizarUrl($publicacion->id.'_'.$publicacion->titulo)); ?>"><span>Seguir leyendo</span></a></p>
          </div>
        <?php } ?>
        <div class="btn-notice"><a href="<?php echo $this->createUrl('/publicaciones_propias'); ?>">
            <p>OTRAS PUBLICACIONES</p></a></div>
      </div>