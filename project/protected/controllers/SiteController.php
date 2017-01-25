<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$eventos = Eventos::model()->findAllByAttributes(array('estado'=>1), array('condition'=>'t.fecha >= now()', 'order'=>'t.fecha ASC'));
		$proyectos = Proyectos::model()->findAllByAttributes(array('estado'=>1, 'es_emblematico'=>1));
		$rendicion = RendicionCuentas::model()->findByAttributes(array('estado'=>1), array('order'=>'t.id DESC'));
		$noticias = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>1), array('order'=>'t.id DESC', 'limit'=>2));

		$this->render('index', array(
			'eventos'=>$eventos,
			'proyectos'=>$proyectos,
			'rendicion'=>$rendicion,
			'noticias'=>$noticias
		));
	}

	public function actionPerfil(){
		$this->render('perfil');
	}

	public function actionEquipo(){
		$equipo = Equipo::model()->findAllByAttributes(array('estado'=>1));
		$this->render('equipo', array(
			'equipo'=>$equipo
		));
	}

	public function actionAgenda(){
		$eventos = Eventos::model()->findAllByAttributes(array('estado'=>1), array('condition'=>'t.fecha >= now()', 'order'=>'t.fecha ASC'));
		$this->render('agenda', array(
			'eventos'=>$eventos
		));
	}


	public function actionProyectos_ley(){
		$pagina = Paginas::model()->findByPk(1);
		$proyectosPropios = Proyectos::model()->findAllByAttributes(array('estado'=>1,'categoria'=>1));
		$proyectosApoyados = Proyectos::model()->findAllByAttributes(array('estado'=>1,'categoria'=>2));
		$this->render('proyectos', array(
			'pagina'=>$pagina,
			'proyectosPropios'=>$proyectosPropios,
			'proyectosApoyados'=>$proyectosApoyados
		));
	}
	public function actionProposiciones(){
		$pagina = Paginas::model()->findByPk(2);
		$proposiciones = Proposiciones::model()->findAllByAttributes(array('estado'=>1));
		$this->render('proposiciones', array(
			'pagina'=>$pagina,
			'proposiciones'=>$proposiciones
		));
	}
	public function actionDebates_control_politico(){
		$pagina = Paginas::model()->findByPk(3);
		$debates = Debates::model()->findAllByAttributes(array('estado'=>1));
		$this->render('debates_control', array(
			'pagina'=>$pagina,
			'debates'=>$debates
		));
	}
	public function actionForos(){
		$pagina = Paginas::model()->findByPk(4);
		$foros = Foros::model()->findAllByAttributes(array('estado'=>1));
		$this->render('foros', array(
			'pagina'=>$pagina,
			'foros'=>$foros
		));
	}

	public function actionRendicion_cuentas(){
		$pagina = Paginas::model()->findByPk(5);
		$categorias = RendicionCuentasCategorias::model()->findAllByAttributes(array('estado'=>1));
		$this->render('rendicion_cuentas', array(
			'pagina'=>$pagina,
			'categorias'=>$categorias
		));
	}

	public function actionComunicados_prensa(){
		$publicaciones = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>3), array('order'=>'t.id DESC'));
		$this->render('comunicados', array(
			'publicaciones'=>$publicaciones
		));
	}

	public function actionNoticias(){
		$noticias = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>1), array('order'=>'t.id DESC'));
		$this->render('noticias', array(
			'noticias'=>$noticias
		));
	}

	public function actionPublicaciones_propias(){
		$publicaciones = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>2), array('order'=>'t.id DESC'));
		$this->render('publicaciones', array(
			'publicaciones'=>$publicaciones
		));
	}

	public function actionVideos(){
		$videos = Publicaciones::model()->findAllByAttributes(array('estado'=>1, 'categoria'=>4), array('order'=>'t.id DESC'));
		$this->render('videos', array(
			'videos'=>$videos
		));
	}

	public function actionContacto(){
		$this->render('contacto', array());
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}