<?php if (isset($this->module) && !empty($this->module)): ?>
<section class="content-header">
  <h1>
    <?=$this->module->getName();?>
    <small>Versão <?=$this->module->getVersion()?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=$baseAdminUrl?>"><i class="fa fa-home"></i> Home</a></li>
    <?php if (!isset($this->action)): ?>
      <li class="active"><?=$this->module->getName()?></li>
    <?php endif ?>
  </ol>
</section>   
<?php endif ?>
<?php if (isset($this->contentHeader) && !empty($this->contentHeader)): ?>
 
<section class="content-header">
  <h1>
    <?=$this->contentHeader;?>
    <?php if (isset($this->contentHeaderSmall) && !empty($this->contentHeaderSmall)): ?>
      <small><?=$this->contentHeaderSmall?></small>
    <?php endif ?>
  </h1>
</section>  

<?php endif ?>