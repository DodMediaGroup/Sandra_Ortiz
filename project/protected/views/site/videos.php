	<div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div style="margin-top: -30px;" class="content row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>VIDEOS</h1>
        </div>
      </div>
      <div style="margin-top: 50px;" class="row">
      	<div id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModal" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <div>
                  <iframe width="100%" height="350"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>

      	<?php foreach ($videos as $key => $video) {
      		$idVideo = MyMethods::id_youtube($video->fuente);
      	?>
      		<div class="col-xs-12 col-sm-6 center-xs">
	          <div class="video-container">
	          	<a href="#" data-toggle="modal" data-target="#videoModal" data-theVideo="http://www.youtube.com/embed/<?php echo $idVideo; ?>" class="btn btn-default">
	          		<img src="http://img.youtube.com/vi/<?php echo $idVideo; ?>/1.jpg" class="img-video-contact"/>
	          	</a>
	          </div>
	        </div>
      	<?php } ?>
      </div>
      </br>
      <div class="col-xs-12 content-ver-pdf-red">
      	<?php $youtube = GeneralValue::model()->findByPk(4); ?>
        <div class="ver-pdf-red">
          <p>Ir a canal <span>YOUTUBE</span></p><a href="<?php echo $youtube->value; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/video.svg"/></a>
        </div>
      </div>
    </div>
    <div style="margin-top: 90px;" class="col-xs-12 col-lg-4">
      <?php $this->renderPartial('//layouts/_column-right'); ?>
    </div>
  </div>