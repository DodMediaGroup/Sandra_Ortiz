  <div class="frame-header-team"></div>
  <div class="img-frame-team"></div>
  <div class="content-frame-team"><span class="numeral">#</span>
    <h1>NUESTRA GESTIÓN<br>ES UNA REALIDAD</h1>
  </div>
  <div class="content-team row">
    <div class="col-xs-12 col-lg-8">
      <div class="section-article">
        <div class="line">/
          <h1>AGENDA<br/><span>POLÍTICA</span></h1>
        </div>
        <div class="row" style="display:none;"> 
          <div class="col-xs-12 col-sm-4 enun-order">
            <p>ORDERNAR POR:</p>
          </div>
          <div class="col-sm-2 col-md-2 col-xs-12 select-agenda">
            <select>
              <option>FECHA</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2 col-xs-12 select-agenda">
            <select>
              <option>CUIDAD</option>
            </select>
          </div>
          <div class="col-sm-2 col-md-2 col-xs-12 select-agenda">
            <select>
              <option>EVENTO</option>
            </select>
          </div>
        </div>
      </div>

      <?php foreach ($eventos as $key => $evento) {
        $date = new DateTime($evento->fecha);
      ?>
        <div class="row calendar">
          <div class="col-xs-1">
            <div class="circle-number">
              <h2><?php echo $date->format('d'); ?><br/><span><?php echo MyMethods::myStrtoupper($date->format('M')); ?></span><br/><strong><?php echo $date->format('Y'); ?></strong></h2>
            </div>
          </div>
          <div style="margin-top: 15px;" class="col-xs-12 col-sm-9 row middle-xs">
            <div class="content-calendar col-xs-12">
              <p><?php echo $evento->nombre ?><br/><span><?php echo $evento->lugar; ?></span></p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-2 headerver">
            <a>
              <div style="margin-top: -5px;" class="btn-calendar row middle-xs">
                <p class="col-xs-12">VER +</p>
              </div>
            </a>
          </div>
          <div class="contentvermas col-xs-11">
            <?php echo $evento->descripcion; ?>
          </div>
        </div>
      <?php } ?>

    </div>
    <div style="margin-top: 30px;" class="col-xs-12 col-lg-4">
      <?php $this->renderPartial('//layouts/_column-right-two'); ?>
    </div>
  </div>