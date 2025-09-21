<?php 
  require_once('functions.php'); 
  edit();
 include(HEADER_TEMPLATE); 
?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
  <!-- area de campos do form -->
  <hr />
  <div class="row">
    <div class="form-group col-md-7">
      <label for="name">Nome / Razão Social</label>
      <input type="text" id="name" class="form-control" name="customer['name']" required maxlength="100"
        value="<?php echo $customer['name']; ?>"> 
    </div>

    <div class="form-group col-md-3">
      <label for="cpf">CNPJ / CPF</label>
      <input type="text" id="cpf" class="form-control" name="customer['cpf_cnpj']" required maxlength="14" 
        value="<?php echo $customer['cpf_cnpj']; ?>">
    </div>

    <div class="form-group col-md-2">
      <label for="dn">Data de Nascimento</label>
      <input type="date" id="dn" class="form-control" name="customer['birthdate']" required 
        value="<?php echo $customer['birthdate']; ?>"> 
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="end">Endereço</label>
      <input type="text" id="end" class="form-control" name="customer['address']" required 
        value="<?php echo $customer['address']; ?>">
    </div>

    <div class="form-group col-md-3">
      <label for="bairro">Bairro</label>
      <input type="text" id="bairro" class="form-control" name="customer['hood']" required 
        value="<?php echo $customer["hood"]; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cep">CEP</label>
      <input type="text" id="cep" class="form-control" name="customer['zip_code']" required maxlength="8" 
        value="<?php echo $customer['zip_code']; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label for="dc">Data de Cadastro</label>
      <input type="date" id="dc" class="form-control" name="customer['created']" disabled 
        value="<?php echo $customer['created']; ?>">
    </div>
  </div>
  
  <div class="row">
    <div class="form-group col-md-5">
      <label for="muni">Município</label>
      <input type="text" id="muni" class="form-control" name="customer['city']" required 
        value="<?php echo $customer['city']; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label for="tel">Telefone</label>
      <input type="text" id="tel" class="form-control" name="customer['phone']" required maxlength="11" 
        value="<?php echo $customer['phone']; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label for="cel">Celular</label>
      <input type="text" id="tel" class="form-control" name="customer['mobile']" required maxlength="11" 
        value="<?php echo $customer['mobile']; ?>">
    </div>
    
    <div class="form-group col-md-1">
      <label for="uf">UF</label>
      <input type="text" id="uf" class="form-control" name="customer['state']" required maxlength="2" 
        value="<?php echo $customer['state']; ?>">
    </div>
    
    <div class="form-group col-md-2">
      <label for="ie">Inscrição Estadual</label>
      <input type="text" id="ie" class="form-control" name="customer['ie']" required maxlength="15" 
        value="<?php echo $customer['ie']; ?>">
    </div>
    
  </div>
  
  <div id="actions" class="row">
    <div class="col-md-12 mt-2">
      <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
      <a href="index.php" class="btn btn-light"><i class="fa-solid fa-arrow-rotate-left"></i> Cancelar</a>
    </div>
  </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>