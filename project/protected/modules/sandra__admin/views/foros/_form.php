<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'foros-form',
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
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Foros</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'nombre'); ?>
		        				<?php echo $form->textField($model,'nombre',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Nombre','required'=>true)); ?>
							</div>
							<div class="form-group date js-my-datepicker">
								<?php $fecha = (!$model->fecha == "")?(date_format(date_create($model->fecha), 'd/m/Y')):(date('d/m/Y')); ?>
								<?php echo $form->labelEx($model,'fecha'); ?>
		        				<?php echo $form->textField($model,'fecha',array('class'=>'form-control','placeholder'=>'Fecha','required'=>true,'readonly'=>true,'data-date-format'=>"DD/MM/YYYY",'value'=>$fecha)); ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<div class="imag-before-upload" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/admin/gray.jpg); max-width: 180px;">
									<?php if(!$model->isNewRecord && $model->imagen != ""){ ?>
										<div class="img" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/foros/<?php echo $model->imagen; ?>)"></div>
									<?php } ?>
								</div>
								<input type="file" accept="image/*" class="btn btn-default js-show-before" name="image" data-before=".imag-before-upload" title="<?php echo ($model->isNewRecord)?'Agregar Imagen':'Cambiar Imagen' ?>">
								<p class="help-block"><strong>Nota: </strong> Dimensiones recomendadas de 350x350. Peso maximo 150Kb.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header">
					<h2><strong>Contenido</strong></h2>
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
                <a href="<?php echo $this->createUrl('debates/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>