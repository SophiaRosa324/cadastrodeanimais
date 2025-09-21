<?php
    require_once('functions.php');
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

<header class="mt-5 pt-2 animal-header">
    <div class="row">
        <div class="col-sm-6">
            <h2><i class="fa-solid fa-paw"></i> Animais</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-secondary" href="add.php"><i class="fa-solid fa-dog"></i> Novo Animal</a>
            <a class="btn btn-light" href="index.php"><i class="fa-solid fa-arrows-rotate"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-animal alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['message']); unset($_SESSION['type']); ?>
<?php endif; ?>

<hr>

<table class="table table-hover animal-table">
<thead>
    <tr>
        <th>ID</th>
        <th>Foto</th>
        <th>Nome</th>
        <th>Tutor</th>
        <th>Tipo</th>
        <th>Data Nasc.</th>
        <th>Atualizado em</th>
        <th>Opções</th>
    </tr>
</thead>
<tbody>
<?php if ($animals) : ?>
<?php foreach ($animals as $animal) : ?>
    <tr>
        <td><?php echo $animal['id']; ?></td>
        <td>
            <?php if (!empty($animal['foto'])): ?>
                <img src="../uploads/<?php echo $animal['foto']; ?>" alt="Foto" class="table-thumbnail">
            <?php else: ?>
                <div class="image-placeholder" style="width: 60px; height: 60px;">
                    <i class="fa-solid fa-paw"></i>
                </div>
            <?php endif; ?>
        </td>
        <td><?php echo $animal['nome']; ?></td>
        <td><?php echo $animal['tutor']; ?></td>
        <td><?php echo $animal['tipo']; ?></td>
        <td><?php echo formataData($animal['data_nasc'], "d/m/Y"); ?></td>
        <td><?php echo formataData($animal['modified'], "d/m/Y H:i:s"); ?></td>
        <td class="actions text-right">
            <a href="view.php?id=<?php echo $animal['id']; ?>" class="btn btn-sm btn-dark"><i class="fa-solid fa-eye"></i> Visualizar</a>
            <a href="edit.php?id=<?php echo $animal['id']; ?>" class="btn btn-sm btn-animal"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
            <a href="#" class="btn btn-sm btn-animal-light" data-bs-toggle="modal" data-bs-target="#delete-modal" data-animal="<?php echo $animal['id']; ?>">
                <i class="fa-solid fa-eraser"></i> Excluir
            </a>
        </td>
    </tr>
<?php endforeach; ?>
<?php else : ?>
    <tr>
        <td colspan="8" class="text-center">Nenhum registro encontrado.</td>
    </tr>
<?php endif; ?>
</tbody>
</table>

<?php include "modal.php"; ?>
<?php include(FOOTER_TEMPLATE); ?>