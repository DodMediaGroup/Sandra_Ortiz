      <nav class="menu col-xs-12 col-sm-9">
        <ul>
          <li class="col-xs">
            <div class="menu-item row middle-xs"><span>/</span>
              <p>BIOGRAFÍA</p>
            </div>
            <ul>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/perfil'); ?>">
                  <p>/ <span>PERFIL</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/equipo'); ?>">
                  <p>/  <span>EQUIPO</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/agenda'); ?>">
                  <p>/  <span>AGENDA</span></p></a></li>
            </ul>
          </li>
          <li class="col-xs">
            <div class="menu-item row middle-xs"><span>/</span>
              <p>NUESTRA GESTIÓN</p>
            </div>
            <ul>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/proyectos_ley'); ?>">
                  <p>/  <span>PROYECTOS DE LEY</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/proposiciones'); ?>">
                  <p>/  <span>PROPOSICIONES</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/debates_control_politico'); ?>">
                  <p>/  <span>DEBATES DE CONTROL POLÍTICO</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/foros'); ?>">
                  <p>/  <span>FOROS</span></p></a></li>
              <!--<li class="sub-menu"><a href="audiencia.html">
                  <p>/  <span>AUDIENCIAS PUBLICAS</span></p></a></li>-->
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/rendicion_cuentas'); ?>">
                  <p>/  <span>RENDICIÓN DE CUENTAS</span></p></a></li>
            </ul>
          </li>
          <li class="col-xs">
            <div class="menu-item row middle-xs"><span>/</span>
              <p>PROYECTOS EMBLEMÁTICOS</p>
            </div>
            <ul>
              <?php $emblematicos = Proyectos::model()->findAllByAttributes(array('estado'=>1, 'es_emblematico'=>1)); ?>
              <?php foreach ($emblematicos as $key => $proyecto) { ?>
                <li class="sub-menu"><a href="<?php echo $this->createUrl('/proyecto/'.MyMethods::normalizarUrl($proyecto->id.'_'.$proyecto->nombre)); ?>">
                  <p>/  <span><?php echo MyMethods::myStrtoupper($proyecto->nombre); ?></span></p></a></li>
              <?php } ?>
            </ul>
          </li>
          <li class="col-xs">
            <div class="menu-item"><a href="<?php echo $this->createUrl('/rendicion_cuentas'); ?>" class="row middle-xs"><span>/</span>
                <p>RENDICIÓN DE CUENTAS</p></a></div>
          </li>
          <li class="col-xs">
            <div class="menu-item row middle-xs"><span>/</span>
              <p>PRENSA</p>
            </div>
            <ul>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/comunicados_prensa'); ?>">
                  <p>/  <span>COMUNICADOS DE PRENSA</span></p></a></li>
              <li class="sub-menu"><a href="<?php echo $this->createUrl('/videos'); ?>">
                  <p>/  <span>VIDEOS</span></p></a></li>
            </ul>
          </li>
          <li class="col-xs">
            <div class="menu-item"><a href="<?php echo $this->createUrl('/contacto'); ?>" class="row middle-xs"><span>/</span>
                <p>CONTACTO</p></a></div>
          </li>
        </ul>
      </nav>