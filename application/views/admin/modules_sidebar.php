<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=$this->user->getPictureUrl()?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$this->user->getName();?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="<?=$adminBaseUrl?>search_all" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Bem vindo (NOME EMPRESA).</li>
      <?php foreach ($this->modules as $module): ?>
      <li class="<?=($this->module->isModule($module)) ? 'active ' : ''?> treeview">
        <a href="<?=$module->getUrl()?>">
          <i class="fa fa-<?=$module->getFontAwesomeClass()?>"></i> <span><?=$module->getName()?></span>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>