				<div class="row content-right">
	        <div class="section-denuncia-form row"> 
	          <div class="col-xs-6 denuncia-form">
	            <div class="img-voz"></div>
	            <div class="color__img__voz"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/megafono.svg"/></div>
	          </div>
	          <div class="col-xs-6 denuncia-form row middle-xs">
	            <div class="text-denuncie col-xs-12">
	              <p>SU VOZ EN EL CONGRESO</p><span>Denuncie <strong class="js-active-detalle">aquí</strong></span>
	            </div>
	          </div>
	          <div class="col-xs-12 content-form-right js-accordeon"> 
	            <form action="#" method="POST" class="form-right row">
	              <div class="col-xs-12">
	                <select name="theme">
	                  <option>Tema o categoría</option>
	                  <option value="Denuncia">DENUNCIA</option>
	                  <option value="Mensaje">MENSAJE</option>
	                </select>
	                <input name="email" placeholder="Correo electronico"/>
	                <textarea name="subject" placeholder="Denuncia"></textarea>
	              </div>
	              <div class="col-xs-5">
	                <input name="name" placeholder="Nombre"/>
	              </div>
	              <div class="col-xs-6">
	                <input name="last-name" placeholder="Apellido" class="input-left"/>
	              </div>
	              <button type="submit">
	                <div class="btn-form">
	                  <p>ENVIAR</p>
	                </div>
	              </button>
	            </form>
	          </div>
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
	      </div>