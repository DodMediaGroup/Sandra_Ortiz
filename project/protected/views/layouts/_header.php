    <header class="row between-xs">
      <div class="bar-menu col-xs-3"><a href="<?php echo Yii::app()->homeUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo@X2.svg" class="logo"/></a></div>
	    <input type="checkbox" id="btn-menu"/>
	    <label for="btn-menu" class="icon-menu"></label>

      <?php $this->renderPartial('//layouts/_menu'); ?>
    </header>