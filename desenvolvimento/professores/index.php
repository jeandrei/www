
<!--jquery-->
<script src="js/jquery-3.1.1.js"></script>

<script type="text/javascript">

        //CARREGA AS TURMAS
        $(document).ready(function(){
            $('#escola_id').change(function(){                
                $('#turma_id').load('turmas.php?escola_id='+$('#escola_id').val() );

            });
        });

        //CARREGA OS PROFESSORES
        $(document).ready(function(){
            $('#turma_id').change(function(){                
                $('#professor_id').load('professores.php?turma_id='+$('#turma_id').val() );
            });
        });

    </script>


<?php

//inclui o banco de dados
include_once 'db.inc.php';
//inclui a biblioteca de funções
include_once 'helpers.php';


//SELECIONA TODAS AS ESCOLAS
try
  {
    $sql = 'SELECT * FROM escola';
    $s = $pdo->prepare($sql);    
    $s->execute();
  }
  catch (PDOException $e)
  {
    $error = 'Erro ao tentar listar as escolas.';
    include 'error.html.php';
    exit();
  }

  $escolas = $s->fetchAll();
 

?>



        <!-- COLUNA 1 ESTADOS DO BANCO DE DADOS -->
        <div class="col-lg-4">
            <label for="escola_id">
                Selecione a Escola
            </label>                             
            
            <select 
                name="escola_id" 
                id="escola_id" 
                class="form-control"                                        
            >
                    <option value="NULL">Selecione a Escola</option>
                    <?php                                      
                    foreach($escolas as $escola) : ?> 
                        <option value="<?php echo $escola['id']; ?>"
                                    <?php if(isset($_POST['escola_id'])){
                                    echo $_POST['escola_id'] == $escola['id'] ? 'selected':'';
                                    }
                                    ?>
                        >
                            <?php echo $escola['nome'];?>
                        </option>
                    <?php endforeach; ?>  
            </select>
        </div>


        <!--SELECT DA TURMA-->                           
        <select name="turma_id" id="turma_id">
            <option value="0">Escolha uma escola</option>
        </select>

        <!--SELECT DA TURMA-->                           
        <select name="professor_id" id="professor_id">
            <option value="0">Escolha uma turma</option>
        </select>
