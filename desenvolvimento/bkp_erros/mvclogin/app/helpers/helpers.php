<?php
  // Simple page redirect
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}



// GERA INPUT TEXT OU PASSWORD
function text($attributes) {?>   
  <div class="<?php echo isset($attributes['div_class']) ? $attributes['div_class'] : 'form-group';?>">
      
      <label for="<?php echo $attributes['id']; ?>"><?php echo $attributes['label']; ?></label>
      
      <input 
          type="<?php echo $attributes['type']; ?>" 
          name="<?php echo $attributes['name']; ?>" 
          id="<?php echo $attributes['id']; ?>" 
          placeholder="<?php echo $attributes['placeholder']; ?>"
          class="<?php echo isset($attributes['input_class']) ? $attributes['input_class'] : 'form-control form-control-lg';?>"           
          value="<?php echo isset($_POST[$attributes['name']]) ? ($_POST[$attributes['name']]) : ''; ?>"          
      >
      
      <label for="<?php echo $attributes['name'];?>" class="error"><?php echo $attributes['error'];?></label>
    
  </div>
<?php                               
}//fim função text



function checked($value, $array) {
  if ( in_array( $value, $array ) ) {
    echo 'checked="checked"';
  }
}




//CHECKBOX CUSTOMIZADO
function customcheck($attributes){?>
  <?php $checked_ids = array(); foreach($attributes['checked'] as $key=>$value){array_push($checked_ids,$key);}?>
   <div class="form-group">

      <p><?php echo $attributes['label']; ?></p>
   
       <?php 
       //pego os valores marcados antes de submeter o formulário e coloco na variável checked_ids
        if(!empty($_POST[$attributes['name']])){
          $i=0;
          foreach($_POST[$attributes['name']] as $key){
            array_push($checked_ids,($_POST[$attributes['name']][$i]));
            $i++;
          }
        }
       ?>

       
       <?php foreach ( $attributes['options'] as $id => $value ) : ?> 
           <div class="custom-control custom-checkbox  <?php if($attributes['inline'] == true){echo 'custom-control-inline';}?>">                                                                              <!--Aqui uso a função checked se o id estiver dentro do array checked_ids escrevo checked-->                         
             <input type="checkbox" class="custom-control-input" name="<?php echo $attributes['name'];?>[]" id="<?php echo $id?>" value="<?php echo $id?>" <?php isset($attributes['checked']) ? checked($id, $checked_ids) : ''; ?>>
             <label class="custom-control-label" for="<?php echo $id;?>"><?php echo $value;?></label>            
           </div> 
       <?php endforeach; ?>
       
       <label for="<?php echo $attributes['name'];?>[]" class="error"><?php echo $attributes['error'];?></label>  
   
   </div>
 <?php
 }



// CHEKBOX
function checkbox($attributes) {?>
  <div class="form-group">
    
    <p><?php echo $attributes['label']; ?></p>
    <!--na linha abaixo eu pego o array associativo $attributes['checked'] e passo as chaves para a variável cheked_ids-->
    <!--se no $attributes['checked'] eu passo 'acrobatics' => 'Acrobatics' no $checked_id eu passo [0] => 'acrobatics'-->
    <!--no foreach ( $attributes['options'] as $value => $title ) $value vai ter acrobatics logo para poder verificar no in_array tem que ter a mesma chave-->
    <!--dai fica assim in_array(acrobatics,acrobatics)-->
    <?php $checked_ids = array(); foreach($attributes['checked'] as $key=>$value){array_push($checked_ids,$key);}?>

    <?php 
       
        if(!empty($_POST[$attributes['name']])){
          $i=0;
          foreach($_POST[$attributes['name']] as $key){
            array_push($checked_ids,($_POST[$attributes['name']][$i]));
            $i++;
          }
        }
       ?>
        
        <?php foreach ( $attributes['options'] as $value => $title ) : ?> 
            <div class="form-check <?php if($attributes['inline'] == true){echo 'form-check-inline';}?>">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="<?php echo $attributes['name']; ?>[]" id=<?php echo $attributes['id']; ?> value="<?php echo $value; ?>" <?php isset($attributes['checked']) ? checked($value, $checked_ids) : ''; ?>><?php echo $title; ?>
                </label>
            </div>   
        <?php endforeach; ?>

        <div class="form-group">
            <label for="<?php echo $attributes['name'];?>[]" class="error"><?php echo $attributes['error'];?></label> 
        </div>    
  </div>
<?php }





// GERA INPUT TEXT OU PASSWORD
function customradio($attributes) {?>
<div class="form-group">

  <p><?php echo $attributes['label']; ?></p>

   <?php foreach ( $attributes['options'] as $id => $value ) : ?>
      <div class="custom-control custom-radio <?php if($attributes['inline'] == true){echo 'custom-control-inline';}?>">
          <input type="radio" id="<?php echo $id;?>" name="<?php echo $attributes['name'];?>[]" class="custom-control-input" value="<?php echo $id?>" <?php if ((isset($_POST[$attributes['name']])) && (($_POST[$attributes['name']][0]) == $id)) { echo 'checked';} ?>>
          <label class="custom-control-label" for="<?php echo $id;?>"><?php echo $value;?></label>
      </div>    
   <?php endforeach; ?>

   <div class="form-group">
      <label for="<?php echo $attributes['name'];?>[]" class="error"><?php echo $attributes['error'];?></label> 
   </div>  

</div> 
<?php                               
}//fim função text









//GERA RADIO
function radio($attributes) {// if (isset($_POST[$attributes['id']])){$id = $_POST[$attributes['id']];}?>
  <div class="form-group">
    <p><?php echo $attributes['label']; ?></p>      
    
        <?php foreach ( $attributes['options'] as $value => $title ) : ?> 
            <div class="form-check <?php if($attributes['inline'] == true){echo 'form-check-inline';}?>">
              <input class="form-check-input" type="radio" name="<?php echo $attributes['name']; ?>" id="<?php echo $value; ?>" value="<?php echo $value; ?>" <?php if ((isset($_POST[$attributes['name']])) && ($_POST[$attributes['name']] == $value)) { echo 'checked';} ?>>
              <label class="form-check-label" for="<?php echo $value; ?>">
                <?php echo $title;?>
              </label>
            </div>
        <?php endforeach; ?>

        <div class="form-group">
            <label for="<?php echo $attributes['name'];?>" class="error"><?php echo $attributes['error'];?></label> 
        </div>  

  </div>
<?php }





  function submit($value = 'submit', $class = 'btn btn-success btn-block') {?>
    <button type="submit" class="<?php echo $class; ?>"><?php echo $value; ?></button>
  <?php }






  function linkbutton($link, $text, $class = 'btn btn-light btn-block') {?>
    <a href="<?php echo $link; ?>" class="btn btn-light btn-block"><?php echo $text; ?></a>  
  <?php } 





  //GERA SELECT 
function selectlist($attributes){ $i=0;(isset($_POST[$attributes['name']])) ? $selected = $_POST[$attributes['name']] : $selected = Null ;?>
  <div class="form-group">
  <label for="<?php echo $attributes['id']; ?>"><?php echo $attributes['label']; ?></label>
      <select
          name="<?php echo $attributes['name']; ?>" 
          id="<?php echo $attributes['id']; ?>" 
          placeholder="<?php echo $attributes['placeholder']; ?>"
          class="form-control form-control-lg <?php echo (!empty($attributes['error'])) ? 'is-invalid' : ''; ?>"                
      >
          <option value=""><?php echo $attributes['placeholder']; ?></option>
          <? foreach($attributes['options'] as $id => $option) : ?> 
                <option value="<?php echo $id; ?>"
                  <?php echo $id == $selected ? 'selected':'';?>
                >
                <?php echo $option;?>
                </option>
          <?php endforeach; ?>  
      </select>

      <label for="<?php echo $attributes['name'];?>" class="error"><?php echo $attributes['error'];?></label>
      
  </div>
  <?php }




//TEXTAREA
function textarea($attributes){?>
  <div class="form-group">
      <label for="<?php echo $attributes['name'];?>"><?php echo $attributes['label'];?></label>
      <textarea 
        class="form-control" 
        name="<?php echo $attributes['name'];?>"
        id="<?php echo $attributes['id'];?>" 
        rows="<?php echo $attributes['rows'];?>" 
      ><?php echo (isset($_POST[$attributes['id']])) ? trim($_POST[$attributes['id']]) : ''; ?></textarea>
        
      <div class="form-group">
          <label for="<?php echo $attributes['name'];?>" class="error"><?php echo $attributes['error'];?></label>
      </div>  
  </div>
<?php }



//Botão arquivo
function ffile($attributes){?>

  <div class="form-group">
      <div class="custom-file" id="<?php echo $attributes['id']; ?>" lang="">
        <input type="file" class="custom-file-input" id="<?php echo $attributes['id'];?>">
        <label class="custom-file-label" for="<?php echo $attributes['id'];?>"><?php echo $attributes['text'];?></label>
      </div>
        
      <div class="form-group">
          <label for="<?php echo $attributes['id'];?>" class="error"><?php echo $attributes['error'];?></label>
      </div>  
  </div>
<?php }


//tabela
function table($attributes){
                    $camposmostrar = array();//declaro a variável como array os campos que quero mostrar na tabela 
                    $array = json_decode(json_encode($attributes['values']), True);//transformo o resultado da consulda que vem do banco de objeto para array 
                    $columns = $attributes['columns'];// passo as colunas da tabela informada nos atributos
?>

  <div class="container">
    <div class="form-group">
        
    <table class="table table-striped">
  
        <thead>
          <tr>
            <? foreach($attributes['columns'] as $titulo => $campobd) : ?> 
              <!--Aqui ele vai correr todos os campos informados no atributo columns-->
              <!--Cada siclo eu adiciono o campo na variável campomostrar depois eu verifico no inarray se está aqui eu mostro se não não-->
              <th scope="col"><?php $camposmostrar[] .= $campobd; echo $titulo; ?></th>          
            <?php endforeach; ?>  
          </tr>
        </thead>   
        
        <tbody>        
            <? foreach($array as $key => $column) : ?>
            <tr>
              <!--Aqui passo a linha do array se tenho 3 linhas de dados por exemplo aqui pego linha por linha-->
              <!--e passo essa linha para outro array $array[1];-->
              <?php   $arr = $array[$key];
                      //aqui passo as chaves ou seja os campos nome, endereco, id etc.
                      $keys = array_keys($arr);
                      //aqui armazeno o tamanho do array o número de campos
                      $size = sizeof($arr); 
              ?>
                    <!--Aqui imprimo o valor dentro da tabela-->
                     <?php  for($x = 0; $x < $size; $x++ ) { ?>
                        <!--Se o campo estiver dentro do array campomostrar eu mostro na tabela-->
                        <?php if(in_array(($keys[$x]),$camposmostrar)) {?>
                              <td style="word-break:break-all;">  <?php echo $arr[$keys[$x]] ; ?></td>
                        <?php }?>
                    <?php } 
              ?>
              
            </tr> 
            <?php endforeach; ?> 
        </tbody>    
  
  
                  
    
    </table>
  
  
    </div>
  <?php }


//tabela
function tablepag($attributes){
  $camposmostrar = array();//declaro a variável como array os campos que quero mostrar na tabela 
  $array = json_decode(json_encode($attributes['values']), True);//transformo o resultado da consulda que vem do banco de objeto para array 
  $columns = $attributes['columns'];// passo as colunas da tabela informada nos atributos
?>

<div class="container">
<div class="form-group">

<table class="table table-striped">

<thead>
<tr>
<? foreach($attributes['columns'] as $titulo => $campobd) : ?> 
<!--Aqui ele vai correr todos os campos informados no atributo columns-->
<!--Cada siclo eu adiciono o campo na variável campomostrar depois eu verifico no inarray se está aqui eu mostro se não não-->
<th scope="col"><?php $camposmostrar[] .= $campobd; echo $titulo; ?></th>          
<?php endforeach; ?>  
</tr>
</thead>   

<tbody>        
<? foreach($array as $key => $column) : ?>
<tr>
<!--Aqui passo a linha do array se tenho 3 linhas de dados por exemplo aqui pego linha por linha-->
<!--e passo essa linha para outro array $array[1];-->
<?php   $arr = $array[$key];
    //aqui passo as chaves ou seja os campos nome, endereco, id etc.
    $keys = array_keys($arr);
    //aqui armazeno o tamanho do array o número de campos
    $size = sizeof($arr); 
?>
  <!--Aqui imprimo o valor dentro da tabela-->
   <?php  for($x = 0; $x < $size; $x++ ) { ?>
      <!--Se o campo estiver dentro do array campomostrar eu mostro na tabela-->
      <?php if(in_array(($keys[$x]),$camposmostrar)) {?>
            <td style="word-break:break-all;">  <?php echo $arr[$keys[$x]] ; ?></td>
      <?php }?>
  <?php } 
?>

</tr> 
<?php endforeach; ?> 
</tbody>    




</table>

<!--PAGINAÇÃO-->
<ul class="pagination list-inline justify-content-center">

<?php $pagLink = ""; $page="";
//count($count) retorna o número de registros trazido na consulta
if(isset($x)){
      $total_records = $x -1;                 
      $total_pages = ceil($total_records / 5);          
      for ($i=1; $i<=$total_pages; $i++) {
                  // SE O CONTADOR FOR IGUAL AO NÚMERO DA PAGINA PASSADA PELO GET ATRIBUI O VALOR ACTIVE A VARIÁVEL ACTIVE
                  // E COLOCA NA CLASSE class=page-item
                  if((isset($_GET['page'])) && $i == $_GET['page']){$active = 'active';}else{ $active = "";}  
                  $pagLink .= "<li class='page-item $active'><a class='page-link' href='index.php?page=".$i."'>".$i."</a></li>";  
      };  
      echo $pagLink . "</div>"; 
} 
?>  

</ul>


</div>
<?php }



