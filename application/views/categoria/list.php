<div class="row">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Codeigniter 3
					<small>Exemplo de CRUD</small>
				</h2>
			</div>
		</div>
	</div>

	<?php

	if ($this->session->flashdata('msg')) {
		$msg = $this->session->flashdata('msg');
		if ($msg == 'delete') {
			echo '<div class="alert alert-danger">';
			echo 'Dados Excluido com Sucesso!';
		} else {
			echo '<div class="alert alert-success">';
			echo 'Dados Salvo com Sucesso!';
		}

		echo "</div>";
	}
	?>
	<form method="POST" action="<?php echo base_url('categoria/search/'); ?>">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4">
				<div class="form-group">
					<strong>Nome:</strong>
					<input type="text" name="nome" class="form-control">
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4">
				<div class="row ">
					<div class="pull-left" style="margin-top: 20px;">
						<button type="submit" class="btn btn-info">Buscar</button>
						<a class="btn btn-success" href="<?php echo base_url('categoria/create') ?>">Novo</a>
					</div>
				</div>
			</div>
	</form>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 table-responsive">

			<table class="table table-bordered table-hover">
				<thead>
				<tr class="bg-info">
					<th>Nome</th>
					<th>Descrição</th>
					<th width="220px">Ação</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($categoria as $data) { ?>
					<tr>
						<td><?php echo $data->nome; ?></td>
						<td><?php echo $data->descricao; ?></td>
						<td>
							<form method="DELETE" action="<?php echo base_url('categoria/delete/' . $data->id); ?>">
								<a class="btn btn-primary" href="<?php echo base_url('categoria/edit/' . $data->id) ?>">
									Editar</a>
								<button type="submit" class="btn btn-danger"> Deletar</button>
							</form>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
