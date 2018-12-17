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
        
<legend>Dados pessoais do Aluno</legend>
<fieldset>
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
</fieldset>


<legend>Dados de contato</legend>
<fieldset>
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
        <input
          class="form-control"  
          type="text"           
          name="nome_mae" 
          id="nome_mae" 
          placeholder="Nome da mãe">
    </div>
    <div class="form-group col-md-2">
        <label for="telefone_mae">Telefone da mãe</label>
        <input 
          class="form-control" 
          type="tel" 
          name="telefone_mae" 
          id="telefone_mae"          
          maxlength="15" 
          placeholder="(99) 99999-9999"
          onkeypress="mascara( this, mtel );" >  
    </div>
</div>


<!--NOME RESPONSAVEL E TELEFONE-->  
<div class="form-row">
    <div class="form-group col-md-8">
        <label for="nome_responsavel">Nome do responsavel</label>
        <input 
          class="form-control" 
          type="text"           
          name="nome_responsavel" 
          id="nome_responsavel" 
          placeholder="Nome do responsavel">
    </div>
    <div class="form-group col-md-2">
        <label for="telefone_responsavel">Telefone do reponsavel</label>
        <input 
          class="form-control" 
          type="tel" 
          name="telefone_responsavel" 
          id="telefone_responsavel"           
          maxlength="15"           
          placeholder="(99) 99999-9999"
          onkeypress="mascara( this, mtel );" >    
    </div>
</div>
</fieldset>

<legend>Documentos</legend>
<fieldset>
<!--RG E TITULO-->  
<div class="form-row">
    <div class="form-group col-md-2">
        <label for="rg">RG</label>
        <input 
          class="form-control"
          type="text"           
          name="rg" 
          id="rg" 
          placeholder="RG do aluno">
    </div>
    <div class="form-group col-md-1">
        <label for="ufrg">UF</label>
        <input 
          class="form-control"
          type="text"            
          name="ufrg" 
          id="ufrg"  
          placeholder="UF RG">    
    </div>
    <div class="form-group col-md-2">
        <label for="ufrg">Órgão Emissor</label>
        <input
          class="form-control" 
          type="text"            
          name="rg_oremis" 
          id="rg_oremis"
          placeholder="Órgão emissor do RG">    
    </div>
    <div class="form-group col-md-2">
        <label for="ufrg">Título de eleitor</label>
        <input 
          class="form-control"
          type="text"            
          name="titulo" 
          id="titulo" 
          placeholder="Número do título de eleitor">    
    </div>
    <div class="form-group col-md-2">
        <label for="ufrg">Zona</label>
        <input 
          class="form-control"
          type="text"           
          name="zona" id="zona"
          id="zona" 
          placeholder="Zona eleitoral">    
    </div>
    <div class="form-group col-md-2">
        <label for="ufrg">Seção</label>
        <input 
          class="form-control"
          type="text"            
          name="secao" 
          id="secao" 
          placeholder="Seção eleitoral">    
    </div>
</div>



<!--DADOS DA CERTIDÃO-->  
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="rg">Certidão de nascimento</label>
        <input 
          class="form-control"
          type="text"           
          name="num_cert" 
          id="num_cert" 
          placeholder="Número da certidão">
    </div>
    <div class="form-group col-md-1">
      <label for="uf_cert">UF</label>
      <select
        class="form-control"        
        name="uf_cert"
        id="uf_cert">
            <option>AC</option>
            <option>AL</option>
            <option>AM</option>
            <option>AP</option>
            <option>BA</option>
            <option>CE</option>
            <option>DF</option>
            <option>ES</option>
            <option>GO</option>
            <option>MA</option>
            <option>MG</option>
            <option>MS</option>
            <option>MT</option>
            <option>PA</option>
            <option>PB</option>
            <option>PE</option>
            <option>PI</option>
            <option>PR</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RO</option>
            <option>RR</option>
            <option>RS</option>
            <option selected>SC
            <option>SE</option>
            <option>SP</option>
            <option>TO</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="modelo">Modelo</label>
      <select
        class="form-control"        
        name="modelo"
        id="modelo">
          <option selected>Novo</option>
          <option>Antigo</option>
      </select>
    </div>
    <div class="form-group col-md-1">
        <label for="ufrg">Folha</label>
        <input 
          class="form-control"
          type="text" 
          name="folha" 
          id="folha"           
          placeholder="Folha">    
    </div>
    <div class="form-group col-md-2">
        <label for="ufrg">Livro</label>
        <input 
          class="form-control"
          type="text" 
          name="livro" 
          id="livro"           
          placeholder="Livro">    
    </div>        
</div>

<!--CONTINUAÇÃO CERTIDÃO-->  
<div class="form-row"> 
<div class="form-group col-md-2">
        <label for="ufrg">Município da certidão</label>
        <input 
          class="form-control" 
          type="text" 
          name="mun_cert" 
          id="mun_cert"          
          placeholder="Município certidão">    
    </div>
<div class="form-group col-md-2">
        <label for="ufrg">Cartório Certidão</label>
        <input 
          class="form-control"
          type="text" 
          name="cart_cert" 
          id="cart_cert"            
          placeholder="Cartório certidão">    
    </div>   
    <div class="form-group col-md-2">
        <label for="ufrg">Data emissão</label>
        <input 
          class="form-control" 
          type="text" 
          name="data_em" 
          id="data_em"           
          placeholder="Data emissão"          
          >    
    </div>
    <div class="form-group col-md-2">
        <label for="cpf">CPF</label>
        <input 
          class="form-control" 
          type="text" 
          name="cpf" 
          id="cpf"           
          placeholder="CPF do aluno"
          onkeypress="mascaraMutuario(this,cpfCnpj);">
    </div>
    
</div>
</fieldset>








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