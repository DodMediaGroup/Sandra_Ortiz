<div class="page-heading">
    <h1>Editar Colaborador - <small><?php echo $model->nombre; ?></small></h1>
</div>

<?php $this->renderPartial('_form', array('model'=>$model,'saveNew'=>$saveNew)); ?>