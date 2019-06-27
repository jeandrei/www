
<?php
  // Simple page redirect
function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}



// GERA INPUT TEXT OU PASSWORD
function text( $name, $id, $label, $placeholder, $type = 'text', $error) {?>    
    <div class="form-group">
      <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
      <input 
          type="<?php echo $type; ?>" 
          name="<?php echo $name; ?>" 
          id="<?php echo $id; ?>" 
          placeholder="<?php echo $placeholder; ?>"
          class="form-control form-control-lg <?php echo (!empty($error)) ? 'is-invalid' : ''; ?>"           
          value="<?php echo isset($_POST[$name]) ? ($_POST[$name]) : ''; ?>"
          onfocus='this.classList.remove("is-invalid"), document.getElementById("<?php echo $name;?>_err").innerHTML = "";'>
          <span id="<?php echo $name;?>_err" class="text-danger"><?php echo $error;?></span>
    </div>
  <?php                               
  }//fim função text

  // GERA CHEKBOX
  function checked($value, $array) {
    if ( in_array( $value, $array ) ) {
      echo 'checked="checked"';
    }
  }
  
  
  function checkbox2( $name, $id, $label, $options, $checked, $error) {?>
    <div class="form-group"><script>var array_check = [];</script>
      <p><?php echo $label; ?></p>
      <!--na linha abaixo eu pego o array associativo cheked e passo as chaves para a variável cheked_ids-->
      <!--se no checked eu passo 'acrobatics' => 'Acrobatics' no $checked_id eu passo [0] => 'acrobatics'-->
      <!--no foreach ( $options as $value => $title ) $value vai ter acrobatics logo para poder verificar no in_array tem que ter a mesma chave-->
      <!--dai fica assim in_array(acrobatics,acrobatics)-->
      <?php $checked_ids = array(); foreach($checked as $key=>$value){array_push($checked_ids,$key);}?>
      <?php foreach ( $options as $value => $title ) : ?>          
        <label class="checkbox-inline" for="<?php echo $value; ?>">
          <input type="checkbox" name="<?php echo $name; ?>[]" id="<?php echo $id; ?>[<?php echo $value;?>]" value="<?php echo $value; ?>" <?php isset($checked) ? checked($value, $checked_ids) : ''; ?>>           
          <script>array_check.push("[<?php echo $id;?>='<?php echo $value;?>']");</script>
          <span class="checkbox-title"><?php echo $title; ?></span>
        </label>
      <?php endforeach; ?>
      <div class="form-group">
        <span id="<?php echo $name;?>_err" class="text-danger"><?php echo $error;?></span>
      </div>
    </div>
  <?php }

   
  


function checkbox3( $name, $id, $label, $options, $checked, $error) {?>
  <?php $checked_ids = array(); foreach($checked as $key=>$value){array_push($checked_ids,$key);}?>  
    <?php foreach ( $options as $value => $title ) : ?>
    <div class="custom-control custom-checkbox">
      <input class="custom-control-input" name="<?php echo $name; ?>[]" type="checkbox" value="<?php echo $value?>" id="<?php echo $value;?>">
      <label class="custom-control-label" for="<?php echo $value;?>">
        <?php echo $title;?>
      </label>
    </div>      
      <?php endforeach; ?>  
<?php }

function checkbox( $name, $id, $label, $options, $checked, $error) {?>
  <div class="form-group">
    <p><?php echo $label; ?></p>
    <!--na linha abaixo eu pego o array associativo cheked e passo as chaves para a variável cheked_ids-->
    <!--se no checked eu passo 'acrobatics' => 'Acrobatics' no $checked_id eu passo [0] => 'acrobatics'-->
    <!--no foreach ( $options as $value => $title ) $value vai ter acrobatics logo para poder verificar no in_array tem que ter a mesma chave-->
    <!--dai fica assim in_array(acrobatics,acrobatics)-->
    <?php $checked_ids = array(); foreach($checked as $key=>$value){array_push($checked_ids,$key);}?>
    <?php foreach ( $options as $value => $title ) : ?> 
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="<?php echo $name; ?>[]" id=<?php echo $id; ?> value="<?php echo $value; ?>" <?php isset($checked) ? checked($value, $checked_ids) : ''; ?>><?php echo $title; ?>
            </label>
        </div>   
        <?php endforeach; ?>
          <div class="form-group">
            <span id="<?php echo $name;?>_err" class="text-danger"><?php echo $error;?></span>
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
function selectlist($name,$id_field,$label,$text,$options,$selected,$error){ $i=0;?>
  <div class="form-group">
  <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
    <select
        name="<?php echo $name; ?>" 
        id="<?php echo $id_field; ?>" 
        placeholder="<?php echo $placeholder; ?>"
        class="form-control form-control-lg <?php echo (!empty($error)) ? 'is-invalid' : ''; ?>"
        onfocus='this.classList.remove("is-invalid"), document.getElementById("<?php echo $name;?>_err").innerHTML = "";'>          
    >
        <option value="0"><?php echo $text; ?></option>
        <? foreach($options as $id => $option) : ?> 
              <option value="<?php echo $id; ?>"
                <?php echo $id == $selected['id'] ? 'selected':'';?>
              >
              <?php echo $option;?>
              </option>
        <?php endforeach; ?>  
    </select>
    <span id="<?php echo $name;?>_err" class="text-danger"><?php echo $error;?></span>
  </div>
  <?php }







?>

<?/*
exemplo checkbox
  $options = array(
    'acrobatics' => 'Acrobatics',
    'acting' => 'Acting',
    'antiques' => 'Antiques',
    'sports' => 'Sports',
  );

  checkbox( 'interests', 'interests', 'Select your interests', $options );*/?>


