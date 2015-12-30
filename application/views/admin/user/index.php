<div class="box">
	<div class="box-header">
	  <h3 class="box-title">
	  	<form action="<?=$this->module->getUrl()?>/search" method="get">
		    <div class="input-group input-group-sm" style="width: 25%;">
		      <input type="text" name="q" class="form-control pull-right" placeholder="Buscar">
		      <div class="input-group-btn">
		        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
		      </div>
		    </div>
	    </form>  	
	  </h3>

	  <div class="box-tools">
	    <ul class="pagination pagination-sm no-margin pull-right">
	      <li><a href="<?=($page > 1) ? $this->module->getUrl().'index/'.($page-1) : '#'?>">&laquo;</a></li>
	      <?php for ($pageCount = 1;  $pageCount <= $pages; $pageCount++): ?>
		      <li <?=($page == $pageCount)? ' class="active" ' : ''?>><a href="<?=($page == $pageCount) ? '#' : $this->module->getUrl().'index/'.$pageCount?>"><?=$pageCount?></a></li>
	      <?php endfor; ?>
	      <li><a href="<?=($pageCount <= $page) ? $this->module->getUrl().'index/'.($page+1) : '#'?>">&raquo;</a></li>
	    </ul>
	  </div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="objects_table" class="table table-bordered table-striped table-hover">
	    <thead>
	    <tr>
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
	      <td><img class="user-image img-circle" width="30" height="30" alt="User Image" src="<?=$object->getPictureUrl('small/')?>"></img></td>
	      <td><?=$object->getName()?></td>
	      <td><?=$object->getEmail()?></td>
	      <td><?=$object->getStatusHtml()?></td>
	      <td><?=$object->getDateCreatedFormated()?></td>
	    </tr>
	    <?php endforeach ?>
	    </tbody>
	    <tfoot>
	    <tr>
	    </tr>
	    </tfoot>
	  </table>
	</div>
	<div class="box-footer">
	</div>
</div>
