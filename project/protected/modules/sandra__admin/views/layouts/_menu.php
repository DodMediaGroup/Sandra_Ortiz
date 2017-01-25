<?php $path = explode("/",Yii::app()->request->pathInfo); ?>
<li>
	<a href='<?php echo $this->createUrl('index/') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'index')?'active':''):'active'; ?>">
		<i class='icon-home-3'></i>
		<span>Dashboard</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('colaboradores/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'colaboradores')?'active':''):''; ?>">
		<i class='icon-users-1'></i>
		<span>Colaboradores</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('publicaciones/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'publicaciones')?'active':''):''; ?>">
		<i class='icon-newspaper-1'></i>
		<span>Publicaciones</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('proyectos/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'proyectos')?'active':''):''; ?>">
		<i class='icon-trophy-1'></i>
		<span>Proyectos</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('proposiciones/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'proposiciones')?'active':''):''; ?>">
		<i class='icon-clipboard-1'></i>
		<span>Proposiciones</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('debates/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'debates')?'active':''):''; ?>">
		<i class='icon-mic-3'></i>
		<span>Debates</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('foros/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'foros')?'active':''):''; ?>">
		<i class='icon-chat-2'></i>
		<span>Foros</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('rendicioncuentas/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'rendicioncuentas')?'active':''):''; ?>">
		<i class='icon-docs'></i>
		<span>Rendicion Cuentas</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('eventos/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'eventos')?'active':''):''; ?>">
		<i class='icon-calendar-3'></i>
		<span>Eventos/Agenda</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('paginas/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'paginas')?'active':''):''; ?>">
		<i class='icon-map'></i>
		<span>Paginas</span>
	</a>
</li>

<li>
	<a href='<?php echo $this->createUrl('equipo/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'equipo')?'active':''):''; ?>">
		<i class='icon-vcard'></i>
		<span>Equipo de trabajo</span>
	</a>
</li>

<li class='has_sub'>
	<a href='#'>
		<i class='icon-picture-2'></i>
		<span>Multimedia</span>
		<span class="pull-right">
			<i class="fa fa-angle-down"></i>
		</span>
	</a>
	<ul>
		<li>
			<a href='<?php echo $this->createUrl('galleries/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'galleries')?'active':''):''; ?>">
				<span>Galerias</span>
			</a>
		</li>
		<li>
			<a href='<?php echo $this->createUrl('imagesbank/admin') ?>' class="<?php echo (count($path) > 1)?((strtolower($path[1]) == 'imagesbank')?'active':''):''; ?>">
				<span>Banco de Imagenes</span>
			</a>
		</li>
	</ul>
</li>