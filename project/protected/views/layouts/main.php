<!DOCTYPE html >
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"/>
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.css"/>

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "e5202f03-9657-4a12-84d3-d5d24a893541", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

    <script>(function (d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=203728599967701";
      fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
    </script>
  </head>
<body>
  <div id="fb-root"> </div>
	
  <?php $this->renderPartial('//layouts/_header'); ?>

  <?php echo $content; ?>
	
  <?php $this->renderPartial('//layouts/_footer'); ?>

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery-1.11.1.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery.media.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/wow/wow.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/owl-slide/owl.carousel.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
  
</body>
</html>
