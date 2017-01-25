		<div class="frame-header"></div>
  	<div class="img-frame-header"></div>

		<div class="content-frame"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sandra.png"/>
	    <div class="row middle-xs">
	      <div class="col-xs-12 start-xs row">
	      <div class="col-xs-9">
	        <h1 style="margin-left: -60px;position: relative;z-index: 6;">REPRESENTANTE A LA<br/>CAMARA POR BOYACÁ</h1>
	      </div>
	      <div class="col-xs-3">
	        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/partido.png" style="position: absolute;z-index: 5;right: 190px;top: 30px;height: 100px;" alt="">
	      </div>
	      </div>
	    </div>
	  </div>
    <div class="content row">
	    <div class="col-xs-12 col-lg-8">
	      <div class="slide-index">
	        <div id="owl-demo" class="owl-carousel owl-theme">
	          <div class="item"> 
	            <div class="content__slide">
	              <div class="background-slide"></div><img src="images/slide/img-slide-01.svg" class="img"/><a href="#">
	                <div class="btn">
	                  <p>Conoce más <span>aquí</span></p>
	                </div></a>
	            </div><img src="images/slide/image-01.jpg"/>
	          </div>
	          <div class="item">
	            <div class="content__slide">
	              <div class="background-slide"></div><img src="images/slide/img-slide-01.svg" class="img"/><a href="#">
	                <div class="btn">
	                  <p>Conoce más <span>aquí</span></p>
	                </div></a>
	            </div><img src="images/slide/image-01.jpg"/>
	          </div>
	          <div class="item">
	            <div class="content__slide">
	              <div class="background-slide"></div><img src="images/slide/img-slide-01.svg" class="img"/><a href="#">
	                <div class="btn">
	                  <p>Conoce más <span>aquí</span></p>
	                </div></a>
	            </div><img src="images/slide/image-01.jpg"/>
	          </div>
	        </div>
	      </div>
	      <div class="section-article">
	        <div class="line">/
	          <h1>RENDICIÓN<br/><span>DE CUENTAS</span></h1>
	        </div>
	        <article class="row">
	          <div class="col-xs-12 col-md-6 row middle-xs parrafo__leer">
	            <div class="col-xs-12">
	            	<?php $rendicion->contenido = substr(strip_tags($rendicion->contenido), 0, 180); ?>
	              <p><?php echo $rendicion->contenido; ?>...</p>
	            </div>
	          </div>
	          <div class="col-xs-12 col-md-6 row middle-xs pdf-content">
	            <div class="col-xs-12 info-pdf">
	              <h1><?php echo MyMethods::myStrtoupper($rendicion->titulo); ?></h1>
	            </div>
							<?php if($rendicion->archivo != ''){ ?>
	            	<a target="_blank" href="<?php echo Yii::app()->request->baseUrl; ?>/files/<?php echo $rendicion->archivo; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/nube.svg"/></a>
	            <?php } ?>
	          </div>
	        </article>

	        <div class="line">/
	          <h1>PROYECTOS<br/><span>EMBLEMÁTICOS</span></h1>
	        </div>
	        <div class="row">
	        	<?php foreach ($proyectos as $key => $proyecto) { ?>
		        	<div class="col-xs-12 col-md-6 img-pry"><a href="<?php echo $this->createUrl('/proyecto/'.MyMethods::normalizarUrl($proyecto->id.'_'.$proyecto->nombre)); ?>">
		              <div style="background: url(images/<?php echo ($proyecto->imagen != '')?('proyectos/'.$proyecto->imagen):'admin/gray.jpg'; ?>) no-repeat center;" class="cont-serv-img">
		                <div class="red-hover"></div>
		                <div class="fondo-gris-image-proyect"></div>
		                <div class="btn-lg">
		                  <p>Conoce +</p>
		                </div>
		              </div></a>
		          </div>
	        	<?php } ?>
	        </div>

	        <div class="line">/
	          <h1>AGENDA<br/><span>POLÍTICA</span></h1>
	        </div>
	        <?php foreach ($eventos as $key => $evento) {
	        	$date = new DateTime($evento->fecha);
	        ?>
	        	<div class="row calendar">
		          <div class="col-xs-1">
		            <div class="circle-number">
		              <h2><?php echo $date->format('d'); ?><br/><span><?php echo MyMethods::myStrtoupper($date->format('M')); ?></span><br/><strong><?php echo $date->format('Y'); ?></strong></h2>
		            </div>
		          </div>
		          <div style="margin-top: 15px;" class="col-xs-12 col-sm-9 row middle-xs">
		            <div class="content-calendar col-xs-12">
		              <p><?php echo $evento->nombre ?><br/><span><?php echo $evento->lugar; ?></span></p>
		            </div>
		          </div>
		          <div class="col-xs-12 col-sm-2 headerver">
		            <a>
		              <div style="margin-top: -5px;" class="btn-calendar row middle-xs">
		                <p class="col-xs-12">VER +</p>
		              </div>
		            </a>
		          </div>
		          <div class="contentvermas col-xs-11">
		            <?php echo $evento->descripcion; ?>
		          </div>
		        </div>
	        <?php } ?>

	        <div class="suscrib section-denuncia-form">
	          <div class="content-suscrib row center-xs middle-xs">
	            <div class="col-xs-8">
	              <div class="line"> <span>/
	                  <h1>SUSCRÍBETE Y RECIBE      NUESTROS COMUNICADOS</h1>
	                  <h5>Ingresa tus datos <strong class="js-active-detalle">aquí</strong></h5></span></div>
	            </div>
	          </div>
	          <div class="js-accordeon content-form-suscrib">
	            <form class="row form-suscrib">
	              <div class="col-xs-7">
	                <input name="" placeholder="Nombre"/>
	              </div>
	              <div style="padding-left: 10px;" class="col-xs-5">
	                <select name="tipo">
	                  <option>Cuidad</option>
	                  <option>1</option>
	                  <option>2</option>
	                  <option>3</option>
	                  <option>4</option>
	                </select>
	              </div>
	              <div class="col-xs-12">
	                <input name="" placeholder="Correo electronico"/>
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
	          <h1>ÚLTIMAS <br/><span>NOTICIAS</span></h1>
	        </div>
	        <div class="row notice">
	        	<?php foreach ($noticias as $key => $noticia) {
	        		$date = new DateTime($noticia->fecha);
	        	?>
	        		<div class="col-xs-12 col-md-6 content-notice"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo ($noticia->imagen != '')?('publicaciones/'.$noticia->imagen):'admin/gray.jpg'; ?>"/>
		            <h3><?php echo $noticia->titulo; ?></h3><span><?php echo $date->format('d M'); ?>, <?php echo $date->format('Y'); ?></span>
		            <p><?php echo substr(strip_tags($noticia->contenido), 0, 140); ?>...<a href="<?php echo $this->createUrl('/publicacion/'.MyMethods::normalizarUrl($noticia->id.'_'.$noticia->titulo)); ?>"> <span>Seguir leyendo</span></a></p>
		          </div>
	        	<?php } ?>

	          <div class="btn-notice"><a href="<?php echo $this->createUrl('/noticias'); ?>">
	              <p>OTRAS NOTICIAS</p></a></div>
	        </div>

	      </div>
	    </div>
	    <div class="col-xs-12 col-lg-4">
	      <?php $this->renderPartial('//layouts/_column-right'); ?>
	    </div>
	  </div>