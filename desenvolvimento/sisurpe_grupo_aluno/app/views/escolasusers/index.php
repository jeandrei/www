
<?php require APPROOT . '/views/inc/header.php'; ?>


<?php flash('mensagem');?>


 <div class="row align-items-center mb-3">
    <div class="col-md-12">
        <h1>Escolas de acesso do usuário</h1>

        <!--BOTÃO VOLTAR-->
        <div class="row" style="margin-bottom: 10px;">
            <div class="col-lg-2">
                <a href="<?php echo URLROOT; ?>/adminusers" id="voltar" class="btn btn-default btn-block" style="background-color:#FFFAF0">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar
                </a>
                
            </div>
        </div>    
              
           
        <form action="<?php echo URLROOT; ?>/escolausers/gravar/<?php echo $data['user_id'];?>" method="post" enctype="multipart/form-data">       
           
            <!-- LINHA -->
            <div class="row" style="margin-bottom:20px;"> 
                
                <div class="col-lg-4">
                    <label for="linha">
                        Selecione a Escola
                    </label>
                        <select 
                            name="escola_id" 
                            id="escola_id" 
                            class="form-control"                                        
                        >
                                <option value="NULL">Selecione a Escola</option>
                                <?php 
                                $escolas =  $this->escolaUsersModel->getEscolas();                  
                                foreach($escolas as $escola) : ?> 
                                    <option value="<?php echo $escola->id; ?>"
                                                <?php 
                                                if(isset($_POST['escolas'])){
                                                echo $_POST['escolas'] == $escola->id ? 'selected':'';
                                                } else {
                                                echo $data['escolas'] == $escola->id ? 'selected':'';
                                                }
                                                ?>
                                    >
                                        <?php echo $escola->nome;?>
                                    </option>
                                <?php endforeach; ?>  
                        </select>
                        <span id="fila_err" class="text-danger"><?php echo $data['escola_err']; ?></span> 
                </div>

                <div class="col-lg-4" style="margin-top:30px;">
                    <div class="form-group mx-sm-3 mb-2">
                        <!-- BOTÃO GRAVAR o id gravarestado tem que ser o mesmo lá em cima no jquery -->                            
                        <input type="submit" class="btn btn-primary mb-2" value="Adicionar Escola">   
                    </div>                                                
                </div>
                
            <!--LINHA -->
            </div> 
            
        </form>
                                                 
        <?php $escolasUser = $this->escolaUsersModel->GetEscolasUserById($data['user_id']);
        
               
        if(empty($escolasUser)){die("Sem Escolas para este usuário! Selecione a Escola e clique em Adicionar Escola");}
        
        ?>

        <?php foreach ($escolasUser as $registro): ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-body mb-2">
                        
                        <!--text-right para alinhar os botões no lado direito-->
                        <div class="text-right" style="margin-bottom:1rem;">
                            <a 
                                href="<?php echo URLROOT; ?>/escolausers/delete/<?php echo $registro->id;?>" 
                                class="fa fa-remove btn btn-danger btn-lg"
                                onclick="if(question('Tem certeza que deseja remover o registro?') == true)
                                        {
                                            document.forms[0].submit();
                                        }
                                        else
                                        {										
                                            return false;
                                        }"                       
                            >                        
                                Remover
                            </a> 
                        </div>                       
                        
                        <h4 class="card-title"><?php echo "Escola: " . $registro->nome; ?></h4>   
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div><!--col-md-12-->
</div><!--div class="row align-items-center mb-3-->    
<?php require APPROOT . '/views/inc/footer.php'; ?>

