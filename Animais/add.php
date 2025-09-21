<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
  require_once('functions.php'); 
  add();

  include(HEADER_TEMPLATE); 
?>

<h2 class="mt-5 pt-2">Novo Animal</h2>

<form action="add.php" method="post" enctype="multipart/form-data">
  <!-- área de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="nome">Nome</label>
      <input type="text" id="nome" class="form-control" name="animal[nome]" required maxlength="100">
    </div>

    <div class="form-group col-md-3">
      <label for="tutor">Tutor</label>
      <input type="text" id="tutor" class="form-control" name="animal[tutor]" required maxlength="50">
    </div>

    <div class="form-group col-md-2">
      <label for="dn">Data de Nascimento</label>
      <input type="date" id="dn" class="form-control" name="animal[data_nasc]" required> 
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="tipo">Tipo</label>
      <input type="text" id="tipo" class="form-control" name="animal[tipo]" required maxlength="20">
    </div>

    <div class="form-group col-md-5">
      <label for="foto">Foto</label>
      <input type="file" id="foto" class="form-control" name="foto" accept="image/*">
      <small class="form-text text-muted">Formatos permitidos: JPG, JPEG, PNG, GIF (Máx. 2MB)</small>
    </div>
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-secondary">
        <i class="fa-solid fa-sd-card"></i> Salvar
      </button>
      <a href="index.php" class="btn btn-light">
        <i class="fa-solid fa-arrow-rotate-left"></i> Cancelar
      </a>
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