<?php require APPROOT . '/views/inc/header.php';?>

<script>

$(document).ready(function(){

    // quando carrega o documento
    situacao = $("#situacao").val();
    if(situacao == 2){
        $( "#div_escola_mat" ).removeClass( "invisible");
        $( "#div_escola_mat" ).addClass( "visible");
    } else {
        $( "#div_escola_mat" ).removeClass( "visible");
        $( "#div_escola_mat" ).addClass( "invisible");
    }   

 
    // quando altera a situação
    $("#situacao").change(function(){
        situacao = $("#situacao").val();
            if(situacao == 2){
                $( "#div_escola_mat" ).removeClass( "invisible");
                $( "#div_escola_mat" ).addClass( "visible");
            } else {
                $( "#div_escola_mat" ).removeClass( "visible");
                $( "#div_escola_mat" ).addClass( "invisible");
            }   
    });




});




</script>




<div class="row">
    <div class="col-md-12 mx-auto">
        <?php flash('register_success');?>
        <a href="<?php echo URLROOT; ?>/admins/index" class="btn btn-light mt-3"><i class="fa fa-backward"></i>Voltar</a>
            <div class="card card-body bg-ligth mt-5">
                <h2>Editando protocolo número:<b> <?php echo $data['protocolo'];?></b> | Situação atual:  <?php echo $data['situacao'];?></h2>  
                <p>Data de registro do protocolo: <b><?php echo $data['registro'];?></b></p>
                
                <hr>

                <form action="<?php echo URLROOT; ?>/admins/edit/<?php echo $data['id']; ?>" method="post">                
                    
                    <h3>Nome da criança: <?php echo $data['nomecrianca'];?></h3>
                    
                    <div class="row">
                        <div class="col-md-4">
                            Certidão de Nascimento:  <?php echo $data['certidaonascimento'];?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            Nascimento:  <?php echo $data['nascimento'];?>
                        </div>

                        <div class="col-md-4">
                            Etapa:  <?php echo $data['etapa'];?>
                        </div>

                        <div class="col-md-4">
                            Turno:  <?php echo $data['opcao_turno'];?>
                        </div>                    
                    </div>

                    
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-md-3">
                            Responsável:  <?php echo $data['responsavel'];?>
                        </div> 
                        <div class="col-md-3">
                            CPF Responsável:  <?php echo $data['cpfresponsavel'];?>
                        </div>
                        <div class="col-md-3">
                            Deficiente:  <?php echo $data['deficiencia'];?>
                        </div> 
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            Observação:  <?php echo $data['observacao'];?>
                        </div>
                    </div>

                    


                    <hr>


                    <h3>Endereço</h3>
                    <div class="row">
                        <div class="col-md-4">
                            Logradouro:  <?php echo $data['logradouro'];?>
                        </div>  

                        <div class="col-md-4">
                            Bairro:  <?php echo $data['bairro'];?>
                        </div> 

                        <div class="col-md-4">
                            Número:  <?php echo $data['numero'];?>
                        </div> 
                        <div class="col-md-4">
                            Complemento:  <?php echo $data['complemento'];?>
                        </div>
                    </div>

                    <hr>

                    <h3>Contato</h3>
                    <div class="row">
                        <div class="col-md-4">
                            E-mail:  <?php echo $data['email'];?>
                        </div>  

                        <div class="col-md-4">
                            Telefone:  <?php echo $data['telefone'];?>
                        </div> 

                        <div class="col-md-4">
                            Celular:  <?php echo $data['celular'];?>
                        </div> 
                    </div>


                    <hr>
                    
                    
                    <h3>Opções para matrícula escolhidas pelo Responsável.</h3>
                    <div class="row">
                        <div class="col-md-4">
                            Opção 01:  <?php echo $data['opcao1_id'];?>
                        </div>  

                        <div class="col-md-4">
                            Opção 02:  <?php echo $data['opcao2_id'];?>
                        </div> 

                        <div class="col-md-4">
                            Opção 03:  <?php echo $data['opcao3_id'];?>
                        </div> 
                    </div>


                    <hr>
                        
                    <h3>Editar</h3>
                    <!--linha 01 editar-->
                    <div class="row">
                            
                            <!-- COLUNA 3 SITUAÇÃO-->
                            <div class="form-group col-lg-3">
                                <label for="situacao">
                                    Situação
                                </label>                        

                                <select 
                                    name="situacao" 
                                    id="situacao" 
                                    class="form-control"                                       
                                >                               
                                        <?php 
                                        $situacoes = $this->situacaoModel->getSituacoes();                     
                                        foreach($situacoes as $row) : ?> 
                                            <option value="<?php echo $row->id; ?>"
                                                        <?php 
                                                        echo $data['situacao_id'] == $row->id ? 'selected':'';
                                                        
                                                        ?>
                                            >
                                                <?php echo $row->descricao;?>
                                            </option>
                                        <?php endforeach; ?>  
                                </select>    
                            </div>

                                <!-- COLUNA 3 SITUAÇÃO-->
                            <div id="div_escola_mat" name="div_escola_mat" class="form-group col-lg-6 invisible">
                                <label for="escolamatricula">
                                    Escola em que a criança foi matriculada
                                </label>                        

                                <select 
                                    name="escolamatricula" 
                                    id="escolamatricula" 
                                    class="form-control"                                       
                                >                               
                                        <?php 
                                        $escolas = $this->filaModel->getEscolas();                    
                                        foreach($escolas as $row) : ?> 
                                            <option value="<?php echo $row->id; ?>"
                                                        <?php 
                                                        echo $data['opcao_matricula'] == $row->id ? 'selected':'';
                                                        
                                                        ?>
                                            >
                                                <?php echo $row->nome;?>
                                            </option>
                                        <?php endforeach; ?>  
                                </select>    
                            </div>                                           

                        
                        
                    <!--linha 01 editar-->                   
                    </div>

                        
                        
                        
                    <!--linha 02 editar-->
                    <div class="row">   
                        <div class="form-group col-lg-9">
                            <label for="historico">Histórico</label>
                            <textarea class="form-control rounded-0" name="historico" id="historico" rows="4"></textarea>
                        </div>
                    </div>
                    <!--linha 02 editar-->

                            
                    


                    
                    
                    
                        


                    <!-- LINHA PARA OS BOTÕES -->
                    <div class="row" style="margin-top:30px;">
                        <div class="col-md-12 text-center">                        
                            <input type="submit" value="Gravar" class="btn btn-success">  
                        </div>  
                    <!-- FIM LINHA BOTÕES -->
                    </div>

                </form>
            </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>