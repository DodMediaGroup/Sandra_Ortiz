<?php

class EventosController extends Controller
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
                    'delete_evento'
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

        $eventos = Eventos::model()->findAll(array('condition'=>'t.estado != 2', 'order'=>'t.id DESC'));

        $this->render('admin',array(
            'eventos'=>$eventos,
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

        $model=new Eventos;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Eventos']))
        {
            $errors = false;
            $model->attributes=$_POST['Eventos'];
            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

                if(!(MyMethods::isValidDate($_POST['Eventos']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Eventos']['fecha'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
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

        if(isset($_POST['Eventos']))
        {
            $errors = false;
            $model->attributes=$_POST['Eventos'];
            $model->clearErrors();

            if($model->validate(null, false)){
                date_default_timezone_set('America/Bogota');

                if(!(MyMethods::isValidDate($_POST['Eventos']['fecha'], 'd/m/Y'))){
                    $model->fecha = "";
                    $model->addError('fecha', 'El campo fecha no es una fecha valida!!!');
                    $errors = true;
                }
                else{
                    $fecha = @date_create(str_replace("/","-",trim($_POST['Eventos']['fecha'])), new DateTimeZone('Europe/London'));
                    $model->fecha = date_format($fecha, 'Y/m/d');
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
        $evento = $this->loadModel($id);
        if($evento->estado == 1)
            $evento->estado = 0;
        else if($evento->estado == 0)
            $evento->estado = 1;
        else
            throw new CHttpException(404,'The requested page does not exist.');

        $evento->save();
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_evento($id)
    {
        $evento = $this->loadModel($id);

        $evento->estado = 2;
        $evento->save();

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
        $model=Eventos::model()->findByAttributes(array('id'=>$id), array('condition'=>'t.estado != 2'));
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