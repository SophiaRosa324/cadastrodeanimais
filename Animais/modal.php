<div class="modal fade animal-modal" id="delete-modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel"><i class="fa-solid fa-triangle-exclamation"></i> Atenção!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body text-center">
        <p class="fs-5">Você realmente deseja excluir este <strong>animal</strong>?</p>
        <p class="text-muted">Esta ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <a id="confirm-delete" class="btn btn-animal btn-lg px-4">
          <i class="fa-solid fa-trash-can"></i> Excluir
        </a>
        <button type="button" class="btn btn-animal-light btn-lg px-4" data-bs-dismiss="modal">
          <i class="fa-solid fa-xmark"></i> Cancelar
        </button>
      </div>
    </div>
  </div>
</div>

<script>
// JavaScript para capturar o ID do animal e configurar o link de exclusão
document.addEventListener('DOMContentLoaded', function() {
    var deleteModal = document.getElementById('delete-modal');
    
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var animalId = button.getAttribute('data-animal');
        
        console.log("ID do animal:", animalId);
        
        var confirmDeleteBtn = document.getElementById('confirm-delete');
        confirmDeleteBtn.href = 'delete.php?id=' + animalId;
    });
});
</script>