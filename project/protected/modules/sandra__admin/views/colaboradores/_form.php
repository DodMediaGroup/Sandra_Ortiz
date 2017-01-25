<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'colaboradores-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'role'=>'form',
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
        <?php if($saveNew){ ?>
			<div class="col-sm-12">
	            <div class="alert alert-success">
	                El registro se guardo con exito;
	            </div>
	        </div>
        <?php } ?>
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Colaborador</strong></h2>
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
							<div class="form-group">
								<?php echo $form->labelEx($model,'apellidos'); ?>
		        				<?php echo $form->textField($model,'apellidos',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Apellidos','required'=>true)); ?>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'cargo'); ?>
		        				<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',
		                            array(
		                                'model'=>$model,
		                                'attribute'=>'cargo',
		                                'source'=>$this->createUrl('./autocompleteJson?filter=ContactoPersonas&value=cargo'),
		                                'htmlOptions'=>array('class'=>'form-control', 'maxlength'=>255,'placeholder'=>'Cargo'),
		                                'options'=>array(
		                                    'select'=>"js:function(event, ui) {
		                                        $('#ContactoPersonas_cargo').val(ui.item.label);
		                                    }",
		                                    "minLength"=>3,
		                                ),
		                            ));
		                        ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'correo'); ?>
		        				<?php echo $form->emailField($model,'correo',array('class'=>'form-control','maxlength'=>255,'placeholder'=>'Correo electrónico','required'=>true)); ?>
							</div>
							<div class="form-group">
								<?php echo $form->labelEx($model,'telefono'); ?>
		        				<?php echo $form->textField($model,'telefono',array('class'=>'form-control','maxlength'=>65,'placeholder'=>'Telefono')); ?>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'ciudad'); ?>
		        				<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',
		                            array(
		                                'model'=>$model,
		                                'attribute'=>'ciudad',
		                                'source'=>$this->createUrl('./autocompleteJson?filter=ContactoPersonas&value=ciudad'),
		                                'htmlOptions'=>array('class'=>'form-control', 'maxlength'=>155,'placeholder'=>'Ciudad','required'=>true),
		                                'options'=>array(
		                                    'select'=>"js:function(event, ui) {
		                                        $('#ContactoPersonas_ciudad').val(ui.item.label);
		                                    }",
		                                    "minLength"=>3,
		                                ),
		                            ));
		                        ?>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<?php echo $form->labelEx($model,'sector'); ?>
		        				<?php $this->widget('zii.widgets.jui.CJuiAutoComplete',
		                            array(
		                                'model'=>$model,
		                                'attribute'=>'sector',
		                                'source'=>$this->createUrl('./autocompleteJson?filter=ContactoPersonas&value=sector'),
		                                'htmlOptions'=>array('class'=>'form-control', 'maxlength'=>255,'placeholder'=>'Ciudad'),
		                                'options'=>array(
		                                    'select'=>"js:function(event, ui) {
		                                        $('#ContactoPersonas_sector').val(ui.item.label);
		                                    }",
		                                    "minLength"=>3,
		                                ),
		                            ));
		                        ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="form-group">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'btn btn-success')); ?>
                <a href="<?php echo $this->createUrl('publicaciones/admin'); ?>" class="btn btn-danger">Cancelar</a>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>