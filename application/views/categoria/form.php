<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Editar Categoria</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="<?php echo base_url('categoria'); ?>"> Voltar</a>
		</div>
	</div>
</div>
<form method="post" action="<?php echo base_url('categoria/store/' . $categoria->id); ?>">
	<input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
	<?php
	if ($this->session->flashdata('errors')) {
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('errors');
		echo "</div>";
	}
	?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Nome:</strong>
				<input type="text" name="nome" class="form-control" value="<?php echo $categoria->nome; ?>">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Descrição:</strong>
				<textarea name="descricao" class="form-control"><?php echo $categoria->descricao; ?></textarea>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
			<button type="submit" class="btn btn-primary">Editar</button>
		</div>
	</div>
</form>
