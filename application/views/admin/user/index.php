<div class="box ">
	<div class="box-header">
	  <h3 class="box-title">
	  	<form action="<?=$this->module->getUrl()?>/search" method="get">
		    <div class="input-group input-group-sm" style="width: 25%;">
		      <input type="text" name="q" class="form-control pull-right" value="<?=(isset($criteria)) ? $criteria : '' ?>" placeholder="Buscar">
		      <div class="input-group-btn">
		        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		      </div>
		    </div>
	    </form>  	
	  </h3>

	  <div class="box-tools">
	    <ul class="pagination pagination-sm no-margin pull-right">
	      <li><a href="<?=($page > 1) ? $this->module->getUrl().'/index/'.($page-1) : '#'?>">&laquo;</a></li>
	      <?php for ($pageCount = 1;  $pageCount <= $pages; $pageCount++): ?>
		      <li <?=($page == $pageCount)? ' class="active" ' : ''?>><a href="<?=($page == $pageCount) ? '#' : $this->module->getUrl().'/index/'.$pageCount?>"><?=$pageCount?></a></li>
	      <?php endfor; ?>
	      <li><a href="<?=($page < $pages) ? $this->module->getUrl().'/index/'.($page+1) : '#'?>">&raquo;</a></li>
	    </ul>
	  </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	   <form action="<?=$this->module->getUrl()?>/delete" id="formDelete" method="POST">
		   <div class="errorMessage">
		    <div class="col-md-6 col-md-offset-3 alert alert-danger alert-dismissible">
		        <button type="button" class="close" onclick="$('.errorMessage').fadeOut();" aria-hidden="true">×</button>
		        <h4><i class="icon fa fa-ban"></i> Erro!</h4>
		        <p id="errorCode"></p>
		        <p id="errorMessage"></p>
		    </div>
	   	  </div>
		  <table id="objects_table" class="table table-bordered table-striped table-hover">
		    <thead>
		    <tr>
		      <th><input type="checkbox" name="checkAll" class="checkAll"></th>
		      <th>Foto</th>
		      <th>Nome</th>
		      <th>Email</th>
		      <th>Status</th>
		      <th>Data de criação</th>
		    </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($objects as $object): ?>
		    <tr>
		      <td><input type="checkbox" name="delete[]" value="<?=$object->getId()?>"></td>
		      <td><img class="user-image img-circle" width="30" height="30" alt="User Image" src="<?=$object->getPictureUrl('small/')?>"></img></td>
		      <td><?=$object->getName()?></td>
		      <td><?=$object->getEmail()?></td>
		      <td class="update-status" data-id="<?=$object->getId()?>"><?=$object->getStatusHtml()?></td>
		      <td><?=$object->getDateCreatedFormated()?></td>
		    </tr>
		    <?php endforeach ?>
		    </tbody>
		    <tfoot>
		    <tr>
		    </tr>
		    </tfoot>
		  </table>
	  </form>
	</div>
	<div class="box-footer">
	</div>
	<div class="overlay" style="display: none;">
      <i class="fa fa-refresh fa-spin"></i>
    </div>

</div>
