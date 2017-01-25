<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'rendiciones-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
        'enctype'=>"multipart/form-data",
    )
)); ?>
	<div class="row">
		<?php if($form->errorSummary($model) != ""){ ?>
			<div class="col-sm-12">
	            <div class="alert alert-danger">
	                <?php echo $form->errorSummary($model); ?>
	            </div>
	        </div>
        <?php } ?>
		<div class="col-sm-6">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Rendición de cuentas</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<?php echo $form->labelEx($model,'titulo'); ?>
		        				<?php echo $form->textField($model,'titulo',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Titulo','required'=>true)); ?>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'tipo'); ?>
		        				<?php echo $form->textField($model,'tipo',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Tipo','required'=>true)); ?>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'categoria'); ?>
		        				 <?php echo $form->dropDownList($model,'categoria', MyMethods::getListSelect('RendicionCuentasCategorias', 'id', 'nombre'), array('class'=>'form-control')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Descripcion</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<?php echo $form->textArea($model,'contenido',array('class'=>'js-ckeditor')); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Adjuntar Archivo</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="form-group">
						<div class="group-inpu">
							<input type="file" accept="application/pdf" class="btn btn-default" name="file" title="Search for a file to add">
							<span class="file-input-name"><?php echo $model->archivo; ?></span>
							<p class="help-block"><strong>Nota: </strong> Peso maximo 8Mb</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('rendicioncuentas/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>