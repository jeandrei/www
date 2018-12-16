<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message');?>
 <div class="row align-items-center mb-3">
    <div class="col-md-12">
        <h1>Dados do Aluno</h1>
        
            
        <form>
       
               

<!--NOME-->
        <div class="form-group ">
            <label for="nome_aluno">Nome do Aluno:</label>  
            <input class="form-control form-control-sm" type="text" placeholder="<?php echo $data['nome_aluno']; ?>" readonly>         
        </div>

<!--NASCIMENTO NACIONALIDADE E NATURALIDADE TELEFONE-->
<div class="form-row">
    <div class="form-group col-md-2">
        <label for="nascimento">Nascimento</label>
        <input 
          class="form-control"
          type="date"  
          name="nascimento"
          id="nascimento"         
          value="">
    </div>
    <div class="form-group col-md-4">
        <label for="nacionalidade">Nacionalidade</label>
        <input 
          class="form-control" 
          type="text" 
          name="nacionalidade" 
          id="nacionalidade"          
          placeholder="Nacionalidade do aluno">         
    </div>
    <div class="form-group col-md-4">
        <label for="naturalidade">Naturalidade</label>
        <input 
          class="form-control" 
          type="text"
          name="naturalidade" 
          id="naturalidade"                 
          placeholder="Naturalidade do aluno">
    </div>    
  </div>


  <!--TELEFONE EMAIL E SEXO-->
<div class="form-row">
    <div class="form-group col-md-2">
        <label for="telefone">Telefone</label>
        <input 
          class="form-control" 
          type="tel" 
          name="telefone" 
          id="telefone"          
          maxlength="15"          
          placeholder="(99) 99999-9999"
          onkeypress="mascara( this, mtel );">
    </div>
    <div class="form-group col-md-6">
        <label for="email_aluno">Email</label>
        <input 
          class="form-control" 
          type="email"            
          name="email_aluno" 
          id="email_aluno" 
          placeholder="Email do aluno">        
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
        <input 
          class="form-control"
          type="text"           
          name="nome_pai" 
          id="nome_pai" 
          placeholder="Nome do pai">
    </div>
    <div class="form-group col-md-2">
        <label for="telefone_pai">Telefone do pai</label>
        <input 
          class="form-control" 
          type="tel" 
          name="telefone_pai" 
          id="telefone_pai"          
          maxlength="15"           
          placeholder="(99) 99999-9999"
          onkeypress="mascara( this, mtel );" >    
    </div>
</div>


  <!--NOME MÃE E TELEFONE-->  
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="nome_mae">Nome da mãe</label>
      <input type="text" class="form-control" name="nome_mae" id="nome_mae" placeholder="Nome da mãe">
    </div>
    <div class="form-group col-md-2">
      <label for="telefone_mae">Telefone da mãe</label>
      <input type="tel" name="telefone_mae" id="telefone_mae" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">  
    </div>
  </div>


  <!--NOME RESPONSAVEL E TELEFONE-->  
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="nome_responsavel">Nome do responsavel</label>
      <input type="text" class="form-control" name="nome_responsavel" id="nome_responsavel" placeholder="Nome do responsavel">
    </div>
    <div class="form-group col-md-2">
      <label for="telefone_responsavel">Telefone do reponsavel</label>
      <input type="tel" name="telefone_responsavel" id="telefone_responsavel" onkeypress="mascara( this, mtel );" maxlength="15" class="form-control" placeholder="(99) 99999-9999">    
    </div>
  </div>


 <!--RG E TITULO-->  
 <div class="form-row">
    <div class="form-group col-md-2">
      <label for="rg">RG</label>
      <input type="text" class="form-control" name="rg" id="rg" placeholder="RG do aluno">
    </div>
    <div class="form-group col-md-1">
      <label for="ufrg">UF</label>
      <input type="text" class="form-control" name="ufrg" id="ufrg"  placeholder="UF RG">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Órgão Emissor</label>
      <input type="text" class="form-control" name="rg_oremis" id="rg_oremis" placeholder="Órgão emissor do RG">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Título de eleitor</label>
      <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Número do título de eleitor">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Zona</label>
      <input type="text" class="form-control" name="zona" id="zona" placeholder="Zona eleitoral">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Seção</label>
      <input type="text" class="form-control" name="secao" id="secao" placeholder="Seção eleitoral">    
    </div>
  </div>



 <!--DADOS DA CERTIDÃO-->  
 <div class="form-row">
    <div class="form-group col-md-2">
      <label for="rg">Certidão de nascimento</label>
      <input type="text" class="form-control" name="num_cert" id="num_cert" placeholder="Número da certidão">
    </div>
    <div class="form-group col-md-1">
      <label for="ufrg">UF</label>
      <input type="text" name="uf_cert" id="uf_cert" class="form-control" placeholder="UF">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Cartório Certidão</label>
      <input type="text" name="cart_cert" id="cart_cert" class="form-control" placeholder="Cartório certidão">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Modelo</label>
      <input type="text" name="modelo" id="modelo" class="form-control" placeholder="Modelo">    
    </div>    
    <div class="form-group col-md-2">
      <label for="ufrg">Folha</label>
      <input type="text" name="folha" id="folha" class="form-control" placeholder="Folha">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Data emissão</label>
      <input type="text" name="data_em" id="data_em" class="form-control" placeholder="Data emissão">    
    </div>
    <div class="form-group col-md-2">
      <label for="ufrg">Município da certidão</label>
      <input type="text" name="mun_cert" id="mun_cert" class="form-control" placeholder="Município certidão">    
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