<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
 <div class="row align-items-center mb-3">
    <div class="col-md-8">
        <h1>Dados do Aluno</h1>
        
            
        <form>
       
               

<!--NOME-->
        <div class="form-group ">
            <label for="nome_aluno">Nome do Aluno:</label>  
            <input class="form-control form-control-sm" type="text" placeholder="<?php echo $data['nome_aluno']; ?>" readonly>         
        </div>

<!--NASCIMENTO NACIONALIDADE E NATURALIDADE-->
<div class="form-row">
    <div class="form-group col-md-4">
    <label for="nascimento">Nascimento</label>
    <input class="form-control" name="nascimento" type="date" value="">
    </div>
    <div class="form-group col-md-4">
    <label for="nacionalidade">Nacionalidade</label>
      <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="Nacionalidade do aluno">         
    </div>
    <div class="form-group col-md-4">
    <label for="naturalidade">Naturalidade</label>
      <input type="text" class="form-control" id="naturalidade" placeholder="Naturalidade do aluno">
    </div>
  </div>

  <!--TELEFONE EMAIL E SEXO-->
<div class="form-row">
        <div class="form-group col-md-4">
        <label for="telefone">Telefone</label>
          <input type="tel" name="telefone" id="telefone" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">
        </div>
        <div class="form-group col-md-4">
        <label for="email_aluno">Email</label>
          <input type="email" class="form-control" id="email_aluno" placeholder="Email do aluno">        
        </div>
        <div class="form-group col-md-4">  <legend class="col-form-label col-sm-2 pt-0">Sexo</legend>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexom" value="M" checked>
                <label class="form-check-label" for="sexom">
                  Masculino
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" id="sexof" value="option2">
                <label class="form-check-label" for="sexof">
                  Feminino
                </label>
              </div>        
            </div>
        </div>
  </div>



<!--NOME PAI E TELEFONE-->  
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="nome_pai">Nome do pai</label>
      <input type="text" class="form-control" id="nome_pai" placeholder="Nome do pai">
    </div>
    <div class="form-group col-md-4">
      <label for="telefone_pai">Telefone do pai</label>
      <input type="tel" name="telefone_pai" id="telefone_pai" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">    
    </div>
  </div>


  <!--NOME MÃE E TELEFONE-->  
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="nome_mae">Nome da mãe</label>
      <input type="text" class="form-control" id="nome_mae" placeholder="Nome da mãe">
    </div>
    <div class="form-group col-md-4">
      <label for="telefone_mae">Telefone da mãe</label>
      <input type="tel" name="telefone_mae" id="telefone_mae" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">  
    </div>
  </div>


  <!--NOME RESPONSAVEL E TELEFONE-->  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome_responsavel">Nome do responsavel</label>
      <input type="text" class="form-control" id="nome_responsavel" placeholder="Nome do responsavel">
    </div>
    <div class="form-group col-md-6">
      <label for="telefone_responsavel">Telefone do reponsavel</label>
      <input type="tel" name="telefone_responsavel" id="telefone_responsavel" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">    
    </div>
  </div>


 <!--NATURALIDADE E NACIONALIDADE-->  
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="naturalidade">Naturalidade</label>
      <input type="text" class="form-control" id="naturalidade" placeholder="Naturalidade do aluno">
    </div>
    <div class="form-group col-md-6">
      <label for="nacionalidade">Nacionalidade</label>
      <input type="text" name="nacionalidade" id="nacionalidade" class="form-control" placeholder="Nacionalidade do aluno">    
    </div>
  </div>


  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Sign in</button>
</form>




    


    </div>
</div>

    
<?php require APPROOT . '/views/inc/footer.php'; ?>