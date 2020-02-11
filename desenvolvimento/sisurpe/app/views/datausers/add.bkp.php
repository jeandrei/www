<?php require APPROOT . '/views/inc/header.php';
?>

<div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom03">City</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="City">
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
<?php flash('post_message');?>
 <div class="row align-items-center mb-3">
    <div class="col-md-12">
        <h1>Dados do Aluno</h1>        
           
        <form action="<?php echo URLROOT; ?>/datausers/add" method="post" enctype="multipart/form-data">        

        <!--NOME-->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome_aluno">Nome do Aluno:</label>  
                <input 
                class="form-control" 
                type="text" 
                name="nome_aluno"
                id="nome_aluno"
                value="<?php echo $data['nome_aluno']; ?>"                       
                placeholder="Nome do aluno">
                <div class="invalid-feedback">
                    <?php echo $data['nome_aluno_err']; ?>
                </div>                   
            </div>
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
                  id="nascimento"
                  name="nascimento"
                  value="<?php echo $data['nascimento']; ?>"> 
            </div>
            <div class="form-group col-md-4">
                <label for="nacionalidade">Nacionalidade</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="nacionalidade" 
                  id="nacionalidade"
                  value="<?php echo $data['nacionalidade']; ?>"          
                  placeholder="Nacionalidade do aluno">         
            </div>
            <div class="form-group col-md-4">
                <label for="naturalidade">Naturalidade</label>
                <input 
                  class="form-control" 
                  type="text"
                  name="naturalidade" 
                  id="naturalidade" 
                  value="<?php echo $data['naturalidade']; ?>"                 
                  placeholder="Naturalidade do aluno">
            </div>    
          </div>


          <!--TELEFONE EMAIL E SEXO-->
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="telefone">Telefone</label>
                <input 
                  class="form-control telefone" 
                  type="tel" 
                  name="telefone_aluno" 
                  id="telefone_aluno"          
                  maxlength="15"  
                  value="<?php echo $data['telefone_aluno']; ?>"         
                  placeholder="(99) 99999-9999"
                  >
            </div>
            <div class="form-group col-md-6">
                <label for="email_aluno">Email</label>
                <input 
                  class="form-control" 
                  type="email"            
                  name="email_aluno" 
                  id="email_aluno"
                  value="<?php echo $data['email_aluno']; ?>"  
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
                  value="<?php echo $data['nome_pai']; ?>" 
                  placeholder="Nome do pai">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone_pai">Telefone do pai</label>
                <input 
                  class="form-control telefone" 
                  type="tel" 
                  name="telefone_pai" 
                  id="telefone_pai"          
                  maxlength="15"           
                  value="<?php echo $data['telefone_pai']; ?>" 
                  placeholder="(99) 99999-9999" >    
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
                  value="<?php echo $data['nome_mae']; ?>" 
                  placeholder="Nome da mãe">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone_mae">Telefone da mãe</label>
                <input 
                  class="form-control telefone" 
                  type="tel" 
                  name="telefone_mae" 
                  id="telefone_mae"          
                  maxlength="15" 
                  value="<?php echo $data['telefone_mae']; ?>" 
                  placeholder="(99) 99999-9999">  
            </div>
        </div>


        <!--NOME RESPONSAVEL E TELEFONE-->  
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome_responsavel">Nome do responsavel</label>
                <input 
                  class="form-control" 
                  type="text"           
                  name="telefone_resp" 
                  id="telefone_resp" 
                  value="<?php echo $data['telefone_resp']; ?>" 
                  placeholder="Nome do responsavel">
            </div>
            <div class="form-group col-md-2">
                <label for="telefone_responsavel">Telefone do reponsavel</label>
                <input 
                  class="form-control telefone" 
                  type="tel" 
                  name="telefone_resp" 
                  id="telefone_resp"           
                  maxlength="15"           
                  value="<?php echo $data['telefone_resp']; ?>" 
                  placeholder="(99) 99999-9999">    
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
                  value="<?php echo $data['rg']; ?>" 
                  placeholder="RG do aluno">
            </div>
            <div class="form-group col-md-1">
                <label for="ufrg">UF</label>
                <select
                  class="form-control"
                  name="uf_rg"
                  id="uf_rg"          
                  placeholder="UF RG">
                  <option value="">UF</option>
                  <?php
                    echo(imprimeuf($data['uf_rg']));
                  ?>
                </select>              
            </div>
            <div class="form-group col-md-2">
                <label for="ufrg">Órgão Emissor</label>
                <input
                  class="form-control" 
                  type="text"            
                  name="orgao_emissor" 
                  id="orgao_emissor"
                  value="<?php echo $data['orgao_emissor']; ?>" 
                  placeholder="Órgão emissor do RG">    
            </div>
            <div class="form-group col-md-2">
                <label for="ufrg">Título de eleitor</label>
                <input 
                  class="form-control"
                  type="text"            
                  name="titulo_eleitor" 
                  id="titulo_eleitor" 
                  value="<?php echo $data['titulo_eleitor']; ?>" 
                  placeholder="Título de eleitor">    
            </div>
            <div class="form-group col-md-2">
                <label for="ufrg">Zona</label>
                <input 
                  class="form-control"
                  type="text"           
                  name="zona" id="zona"
                  id="zona" 
                  value="<?php echo $data['zona']; ?>" 
                  placeholder="Zona eleitoral">    
            </div>
            <div class="form-group col-md-2">
                <label for="ufrg">Seção</label>
                <input 
                  class="form-control"
                  type="text"            
                  name="secao" 
                  id="secao" 
                  value="<?php echo $data['secao']; ?>" 
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
                  name="certidao" 
                  id="certidao" 
                  value="<?php echo $data['certidao']; ?>" 
                  placeholder="Número da certidão">
            </div>
            <div class="form-group col-md-1">
              <label for="uf_cert">UF</label>
              <select
                class="form-control"        
                name="uf_cert"
                id="uf_cert">
                <option value="">UF</option>
                  <?php
                    echo(imprimeuf($data['uf_cert']));
                  ?>
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
                  value="<?php echo $data['folha']; ?>"            
                  placeholder="Folha">    
            </div>
            <div class="form-group col-md-2">
                <label for="ufrg">Livro</label>
                <input 
                  class="form-control"
                  type="text" 
                  name="livro" 
                  id="livro"  
                  value="<?php echo $data['livro']; ?>"          
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
                  name="municipio_cert" 
                  id="municipio_cert"   
                  value="<?php echo $data['municipio_cert']; ?>"        
                  placeholder="Município certidão">    
            </div>
        <div class="form-group col-md-2">
                <label for="ufrg">Cartório Certidão</label>
                <input 
                  class="form-control"
                  type="text" 
                  name="cartorio_cert" 
                  id="cartorio_cert" 
                  value="<?php echo $data['cartorio_cert']; ?>"            
                  placeholder="Cartório certidão">    
            </div>   
            <div class="form-group col-md-2">
                <label for="ufrg">Data emissão</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="data_emissao_cert" 
                  id="data_emissao_cert" 
                  value="<?php echo $data['data_emissao_cert']; ?>"           
                  placeholder="Data emissão"          
                  >    
            </div>
            <div class="form-group col-md-2">
                <label for="cpf">CPF</label>
                <input 
                  class="form-control cpf" 
                  type="text" 
                  name="cpf" 
                  id="cpf"  
                  value="<?php echo $data['cpf']; ?>"          
                  placeholder="CPF do aluno">
            </div>
            
        </div>
        </fieldset>


        <legend>Dados adicionais</legend>
        <fieldset>
        <!--TIPO SANGUINEO USO DE MEDICAÇÃO MEDICAMENTOS ALERGIA DEFICIENCIAS RESTRIÇÃO ALIMENTOS-->  
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tipo_sanguineo">Tipo sanguíneo</label>
                <input 
                  class="form-control" 
                  type="text"           
                  name="tipo_sanguineo" 
                  id="tipo_sanguineo" 
                  value="<?php echo $data['tipo_sanguineo']; ?>" 
                  placeholder="Tipo sanguíneo">
            </div>
            <div class="form-group col-md-3">
              <label for="uso_med">Faz uso de medicamento</label>
              <select
                class="form-control"        
                name="uso_med"
                id="uso_med">
                  <option selected>Selecione</option>
                  <option>Sim</option>
                  <option>Não</option>
              </select>
            </div>
            <div class="form-group col-md-12">
                <label for="medicamentos">Medicamentos</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="medicamentos" 
                  id="medicamentos"           
                  maxlength="255"
                  value="<?php echo $data['medicamentos']; ?>"            
                  placeholder="Medicamentos">    
            </div>
            <div class="form-group col-md-12">
                <label for="alergias">Alergias</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="alergias" 
                  id="alergias"           
                  maxlength="255" 
                  value="<?php echo $data['alergias']; ?>"           
                  placeholder="Alergias">    
            </div>
            <div class="form-group col-md-12">
                <label for="deficiencias">Deficiências</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="deficiencias" 
                  id="deficiencias"           
                  maxlength="255"
                  value="<?php echo $data['deficiencias']; ?>"            
                  placeholder="Deficiências">    
            </div>
            <div class="form-group col-md-12">
                <label for="restricoes_alimentos">Restrições a alimentos</label>
                <input 
                  class="form-control" 
                  type="text" 
                  name="restric_alimentos" 
                  id="restric_alimentos"           
                  maxlength="255"
                  value="<?php echo $data['restric_alimentos']; ?>"         
                  placeholder="Restrições a alimentos">    
            </div>
        </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div><!--col-md-12-->
</div><!--div class="row align-items-center mb-3-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

