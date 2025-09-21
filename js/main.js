// Aguarda o carregamento completo do DOM
document.addEventListener('DOMContentLoaded', function () {
  const deleteModal = document.getElementById('delete-modal');

  if (deleteModal) {
    deleteModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget; // Botão que abriu o modal
      const id = button.getAttribute('data-customer'); // Pega o ID do cliente

      // Seleciona elementos dentro do modal
      const modalTitle = deleteModal.querySelector('.modal-title');
      const modalBody = deleteModal.querySelector('.modal-body');
      const confirmButton = deleteModal.querySelector('#confirm');

      // Atualiza conteúdo do modal
      modalTitle.textContent = 'Excluir Cliente: ' + id;
      modalBody.textContent = 'Deseja realmente excluir o cliente ' + id + '?';
      confirmButton.setAttribute('href', 'delete.php?id=' + id);
    });
  }
});

// Quando o modal de delete for exibido
document.addEventListener("DOMContentLoaded", function () {
    var deleteModal = document.getElementById('delete-modal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Botão que abriu o modal
        var animalId = button.getAttribute('data-animal-id'); // pega id
        var animalNome = button.getAttribute('data-animal-nome'); // pega nome

        // Atualiza o link do botão "Sim"
        var confirmBtn = deleteModal.querySelector('#confirm');
        confirmBtn.setAttribute('href', 'delete.php?id=' + animalId);

        // Atualiza o texto do modal com o nome do animal
        var nomeSpan = deleteModal.querySelector('#animal-nome');
        nomeSpan.textContent = animalNome;
    });
});


// Preview da imagem com tamanho reduzido
document.getElementById('foto').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            // Remove preview anterior se existir
            var oldPreview = this.parentElement.querySelector('.image-preview');
            if (oldPreview) {
                oldPreview.remove();
            }
            
            // Cria novo preview menor
            var preview = document.createElement('div');
            preview.className = 'image-preview';
            preview.innerHTML = '<p>Preview:</p><img src="' + e.target.result + '" class="img-thumbnail"><small class="d-block mt-1 text-muted">' + this.files[0].name + '</small>';
            this.parentElement.appendChild(preview);
        }.bind(this);
        reader.readAsDataURL(this.files[0]);
    }
});




