<?php if (isset($this->controller) && !empty($this->controller)): ?>
<section class="content-header">
  <h1>
    <?=$this->controller->getTitle();?>
    <small>Versão <?=$this->controller->getVersion()?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?=$baseAdminUrl?>"><i class="fa fa-home"></i> Home</a></li>
    <?php if (!isset($this->action)): ?>
      <li class="active"><?=$this->controller->getTitle()?></li>
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