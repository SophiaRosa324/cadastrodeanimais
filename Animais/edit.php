<?php 
  require_once('functions.php'); 
  edit();
 include(HEADER_TEMPLATE); 
?>

<h2>Atualizar Animal</h2>

<form action="edit.php?id=<?php echo $animal['id']; ?>" method="post" enctype="multipart/form-data">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome</label>
      <input type="text" id="name" class="form-control" name="animal[nome]" required maxlength="100"
        value="<?php echo $animal['nome']; ?>"> 
    </div>

    <div class="form-group col-md-3">
      <label for="tutor">Tutor</label>
      <input type="text" id="tutor" class="form-control" name="animal[tutor]" required maxlength="50" 
        value="<?php echo $animal['tutor']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="dn">Data de Nascimento</label>
      <input type="date" id="dn" class="form-control" name="animal[data_nasc]" required 
        value="<?php echo $animal['data_nasc']; ?>"> 
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="tipo">Tipo</label>
      <input type="text" id="tipo" class="form-control" name="animal[tipo]" required 
        value="<?php echo $animal['tipo']; ?>">
    </div>

    <div class="form-group col-md-5">
      <label for="foto">Foto</label>
      
      <?php if (!empty($animal['foto'])): ?>
      <div class="mb-3">
        <img src="../uploads/<?php echo $animal['foto']; ?>" alt="Foto do Animal" class="img-thumbnail" style="max-width: 150px; height: auto;">
        <div class="form-check mt-2">
          <input class="form-check-input" type="checkbox" name="excluir_foto" id="excluir_foto" value="1">
          <label class="form-check-label text-danger" for="excluir_foto">
            Excluir foto atual
          </label>
        </div>
      </div>
      <?php endif; ?>
      
      <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
      <small class="form-text text-muted">Deixe em branco para manter a foto atual. Formatos permitidos: JPG, JPEG, PNG, GIF (Máx. 2MB)</small>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-rotate-left"></i> Cancelar</a>
    </div>
  </div>
</form>

<script>
// Preview da imagem antes do upload
document.getElementById('foto').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Remove preview anterior se existir
            var oldPreview = document.querySelector('.image-preview');
            if (oldPreview) {
                oldPreview.remove();
            }
            
            // Cria novo preview
            var preview = document.createElement('div');
            preview.className = 'image-preview mt-2';
            preview.innerHTML = '<p>Preview:</p><img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 120px;">';
            document.querySelector('.form-group.col-md-5:last-child').appendChild(preview);
        }
        reader.readAsDataURL(this.files[0]);
    }
});
</script>

<?php include(FOOTER_TEMPLATE); ?>