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
        <div class="row">
          <?php echo $pagina->contenido; ?>
        </div>
        <div class="row"> 
					<?php foreach ($categorias as $key => $categoria) {
						if(count($categoria->rendicionCuentases) > 0){ ?>
							<div class="col-xs-12 col-md-6 img-pry"><a href="<?php echo $this->createUrl('/rendicion_cuentas/'.$categoria->link); ?>">
		          	<div style="background: url(images/rendicion_cuentas/<?php echo $categoria->image; ?>) no-repeat center;" class="cont-serv-img">
		              <div class="red-hover row middle-xs center-xs">
		                <div class="content-hover center-xs">
		                  <p><?php echo $categoria->nombre; ?></p>
		                </div>
		              </div>
		              <div class="fondo-gris-image-proyect"></div>
		              <div class="btn-lg">
		                <p>Conoce +</p>
		              </div>
		            </div>
		          </a></div>
						<?php }
					} ?>
        </div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4">
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>