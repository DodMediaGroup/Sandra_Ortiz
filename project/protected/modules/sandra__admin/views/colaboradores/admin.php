<div class="page-heading">
    <h1>Base de datos Colaboradores</h1>
</div>

<div class="row">
	<form action="<?php echo $this->createUrl('colaboradores/admin') ?>" method="POST">
		<div class="col-sm-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Filtrar resultados</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<div class="data-table-toolbar">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<div class="toolbar-btn-action">
								<a class="btn btn-success" href="<?php echo $this->createUrl('colaboradores/create'); ?>"><i class="fa fa-plus-circle"></i> Add new</a>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="widget-content padding">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="filter__nombre">Nombre:</label>
		        				<input class="form-control" type="text" name="Filter[nombre]" id="filter__nombre" value="<?php echo (isset($_POST['Filter']['nombre'])?$_POST['Filter']['nombre']:''); ?>">
							</div>
							<div class="form-group">
								<label for="filter__cargo">Cargo:</label>
		        				<input class="form-control" type="text" name="Filter[cargo]" id="filter__cargo" value="<?php echo (isset($_POST['Filter']['cargo'])?$_POST['Filter']['cargo']:''); ?>">
							</div>
							<div class="form-group">
								<label for="filter__email">Correo electrónico:</label>
		        				<input class="form-control" type="text" name="Filter[email]" id="filter__email" value="<?php echo (isset($_POST['Filter']['email'])?$_POST['Filter']['email']:''); ?>">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="filter__ciudad">Ciudad:</label>
								<input class="form-control" type="text" name="Filter[ciudad]" id="filter__ciudad" value="<?php echo (isset($_POST['Filter']['ciudad'])?$_POST['Filter']['ciudad']:''); ?>">
							</div>
							<div class="form-group">
								<label for="filter__sector">Sector:</label>
		        				<input class="form-control" type="text" name="Filter[sector]" id="filter__sector" value="<?php echo (isset($_POST['Filter']['sector'])?$_POST['Filter']['sector']:''); ?>">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<?php echo CHtml::submitButton('Generar resultados', array('class'=>'btn btn-success')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<?php if(isset($_POST['Filter'])){ ?>
	<div class="row">
	    <div class="col-md-12">
			<div class="widget">
				<div class="widget-header transparent">
					<h2><strong>Resultados</strong></h2>
					<div class="additional-btn">
						<a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
					</div>
				</div>
				<br>
				<div class="widget-content">
					<div class="table-responsive">
						<table class="table table-striped table-bordered js-data-table" cellspacing="0" width="100%">
					        <thead>
					            <tr align="center">
									<th>#</th>
									<th>Acciones</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Cargo</th>
									<th>Ciudad</th>
									<th>Sector</th>
									<th>Telefono</th>
								</tr>
					        </thead>
					 
					        <tfoot>
					            <tr>
					                <th>#</th>
									<th>Acciones</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>Cargo</th>
									<th>Ciudad</th>
									<th>Sector</th>
									<th>Telefono</th>
								</tr>
					        </tfoot>
					 
					        <tbody>
					            <?php
					            	foreach ($results as $key => $result) { ?>
										<tr>
											<td style="text-align:center;"><?php echo $key+1; ?></td>
											<td style="width:120px;">
												<div class="btn-group btn-group-xs">
													<a href="<?php echo $this->createUrl('colaboradores/update/'.$result->id); ?>" data-toggle="tooltip" title="Editar" class="btn btn-default"><i class="fa fa-edit"></i></a>
													<a data-msj='¿Esta seguro de querer eliminar a "<?php echo $result->nombre; ?>"? Despues no podra recuperar su informacion.' href="<?php echo $this->createUrl('colaboradores/delete_colaborador')."/".$result->id; ?>" data-toggle="tooltip" title="Eliminar" class="js-confirm btn btn-default"><i class="fa fa-power-off"></i></a>
												</div>
											</td>
											<td><?php echo $result->nombre.' '.$result->apellidos; ?></td>
											<td><?php echo $result->correo; ?></td>
											<td><?php echo $result->cargo; ?></td>
											<td><?php echo $result->ciudad; ?></td>
											<td><?php echo $result->sector; ?></td>
											<td><?php echo $result->telefono; ?></td>
										</tr>
									<?php }
								?>
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>