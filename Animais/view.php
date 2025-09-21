<?php 
	require_once('functions.php'); 
	view($_GET['id']);
    
	include(HEADER_TEMPLATE); 
?>

<h2>Animal <?php echo $animal['id']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>">
		<?php echo $_SESSION['message']; ?>
	</div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Nome:</dt>
	<dd><?php echo $animal['nome']; ?></dd>

	<dt>Tutor:</dt>
	<dd><?php echo $animal['tutor']; ?></dd>

	<dt>Tipo:</dt>
	<dd><?php echo $animal['tipo']; ?></dd>

	<dt>Data de Nascimento:</dt>
	<dd>
		<?php 
			if (!empty($animal['data_nasc'])) {
				echo formataData($animal['data_nasc'], "d/m/Y");
			}
		?>
	</dd>

	<dt>Foto:</dt>
<dd>
    <?php if (!empty($animal['foto'])): ?>
        <img src="../uploads/<?php echo $animal['foto']; ?>" alt="Foto do Animal" class="img-thumbnail" style="max-width:200px;">
        <br>
        <small class="text-muted">Caminho: <?php echo $animal['foto']; ?></small>
    <?php else: ?>
        <span class="text-muted">Sem foto cadastrada</span>
    <?php endif; ?>
</dd>
</dl>

<dl class="dl-horizontal">
	<dt>Data de Cadastro:</dt>
	<dd><?php echo formataData($animal['created'], "d/m/Y H:i:s"); ?></dd>

	<dt>Data da Última Atualização:</dt>
	<dd><?php echo formataData($animal['modified'], "d/m/Y H:i:s"); ?></dd>
</dl>

<div id="actions" class="row mt-2">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $animal['id']; ?>" class="btn btn-secondary">
	  	<i class="fa-solid fa-pen-to-square"></i> Editar
	  </a>
	  <a href="index.php" class="btn btn-light">
	  	<i class="fa-solid fa-arrow-rotate-left"></i> Voltar
	  </a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>