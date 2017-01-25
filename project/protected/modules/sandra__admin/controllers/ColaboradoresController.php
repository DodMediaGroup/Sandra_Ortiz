<?php

class ColaboradoresController extends Controller
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
                    'update',
                    'delete_colaborador'
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

        $results = array();

        if(isset($_POST['Filter'])){
            $results = array();
            $condition = 't.estado = 1';

            if(isset($_POST['Filter']['nombre']))
                $condition .= ' AND (t.nombre LIKE "%'.$_POST['Filter']['nombre'].'%" COLLATE utf8_general_ci  OR t.apellidos LIKE "%'.$_POST['Filter']['nombre'].'%" COLLATE utf8_general_ci)';
            if(isset($_POST['Filter']['cargo']))
                $condition .= ' AND t.cargo LIKE "%'.$_POST['Filter']['cargo'].'%" COLLATE utf8_general_ci';
            if(isset($_POST['Filter']['email']))
                $condition .= ' AND t.correo LIKE "%'.$_POST['Filter']['email'].'%" COLLATE utf8_general_ci';
            if(isset($_POST['Filter']['ciudad']))
                $condition .= ' AND t.ciudad LIKE "%'.$_POST['Filter']['ciudad'].'%" COLLATE utf8_general_ci';
            if(isset($_POST['Filter']['sector']))
                $condition .= ' AND t.sector LIKE "%'.$_POST['Filter']['sector'].'%" COLLATE utf8_general_ci';

            $results = ContactoPersonas::model()->findAll(array('condition'=>$condition));
        }

        $this->render('admin',array(
            'results'=>$results,
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

        $model=new ContactoPersonas;
        $saveNew = false;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ContactoPersonas']))
        {
            $errors = false;
            $model->attributes=$_POST['ContactoPersonas'];
            $model->clearErrors();

            $exist = ContactoPersonas::model()->findByAttributes(array('correo'=>$_POST['ContactoPersonas']['correo']));

            if($exist == null){
                if($model->validate(null, false)){
                    if(!$errors && $model->save()){
                        unset($_POST['ContactoPersonas']);
                        $model=new ContactoPersonas;
                        $saveNew = true;
                    }
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
            'saveNew'=>$saveNew
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
        $saveNew = false;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['ContactoPersonas']))
        {
            $errors = false;
            $model->attributes=$_POST['ContactoPersonas'];
            $model->clearErrors();

            if($model->validate(null, false)){
                if(!$errors && $model->save()){
                    $saveNew = true;
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
            'saveNew'=>$saveNew,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete_colaborador($id)
    {
        $this->loadModel($id)->delete();
        $this->redirect(array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=ContactoPersonas::model()->findByAttributes(array('id'=>$id));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}