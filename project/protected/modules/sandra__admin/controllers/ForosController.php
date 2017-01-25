<?php

class ForosController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='/layouts/main';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array(
                    'admin',
                    'create',
                    'view',
                    'update',
                    'estado',
                    'delete_foro'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $scriptsAdd = array(
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/css/dataTables.bootstrap'
            ),
            array(
                'type'=>'css',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/css/dataTables.tableTools'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/jquery.dataTables.min'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/js/dataTables.bootstrap'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min'
            )
        );
        $this->addScripts($scriptsAdd);
        $this->writeScripts();

        $foros = Foros::model()->findAll(array('condition'=>'t.estado != 2', 'order'=>'t.id DESC'));

        $this->render('admin',array(
            'foros'=>$foros,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=new Foros;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Foros']))
        {
            $errors = false;
            $model->attributes=$_POST['Foros'];
            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

                if(!(MyMethods::isValidDate($_POST['Foros']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Foros']['fecha'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
                }

                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 150, 'foros/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'foros/', $model->imagen, 150, 150);
                    }
                }
                else{
                    $model->addError('imagen', 'Debe agregar una imagen para la persona.');
                    $errors = true;
                }

                if($_FILES['file']['size'] > ((1024*1024)*8)){
                    $model->addError('archivo', 'El archivo es demasiado pesado!!!');
                    $errors = true;
                }
                else if(($_FILES['file']['size'] > 0)){
                    $model->archivo = MyMethods::uploadFile($_FILES['file'],'files/');
                }

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->writeScripts();

        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $scriptsAdd = array(
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/ckeditor'
            ),
            array(
                'type'=>'js',
                'file'=>'assets/admin/libs/ckeditor/adapters/jquery'
            )
        );
        $this->addScripts($scriptsAdd, 'admin');
        $this->writeScripts();

        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Foros']))
        {
            $errors = false;
            $model->attributes=$_POST['Foros'];
            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

                if(!(MyMethods::isValidDate($_POST['Foros']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Foros']['fecha'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
                }

                if(($_FILES['image']['size'] > 0)){
                    $server = $_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl.'/images/';
                    $currentImage = $model->imagen;
                    
                    $uploadLogo = MyMethods::uploadImage($_FILES['image'], 150, 'foros/');

                    if(!$uploadLogo['status']){
                        $model->addError('imagen', $uploadLogo['message']);
                        $errors = true;
                    }
                    else{
                        $model->imagen = $uploadLogo['imageName'];
                        MyMethods::resizeImage($server.'foros/', $model->imagen, 150, 150);

                        if($currentImage != ""){
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/foros/".$currentImage);
                            @unlink($_SERVER['DOCUMENT_ROOT'].Yii::app()->request->baseUrl."/images/foros/150x150/".$currentImage);
                        }
                    }
                }

                if($_FILES['file']['size'] > ((1024*1024)*8)){
                    $model->addError('archivo', 'El archivo es demasiado pesado!!!');
                    $errors = true;
                }
                else if(($_FILES['file']['size'] > 0)){
                    $model->archivo = MyMethods::uploadFile($_FILES['file'],'files/');
                }

                if(!$errors && $model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionEstado($id){
        $foro = $this->loadModel($id);
        if($foro->estado == 1)
            $foro->estado = 0;
        else if($foro->estado == 0)
            $foro->estado = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $foro->save();
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_foro($id)
    {
        $foro = $this->loadModel($id);

        $foro->estado = 2;
        $foro->save();

        $this->redirect(array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Eventos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Foros::model()->findByAttributes(array('id'=>$id), array('condition'=>'t.estado != 2'));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Eventos $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='Eventos-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}