<?php
//$javacode = "<script>function validation(){";

  // Simple page redirect  

function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}


function text( $name, $id, $label, $placeholder, $type = 'text', $error) {?>
    
    <div class="form-group">
      <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
      <input 
          type="<?php echo $type; ?>" 
          name="<?php echo $name; ?>" 
          id="<?php echo $id; ?>" 
          placeholder="<?php echo $placeholder; ?>"
          class="form-control form-control-lg <?php echo (!empty($error)) ? 'is-invalid' : ''; ?>"           
          value="<?php echo isset($_POST[$name]) ? ($_POST[$name]) : ''; ?>">    
      <span class="invalid-feedback">
          <?php echo $error;?>
      </span>
    </div>
  <?php // global $javacode; 
                //$javacode.="var $name = document.getElementById('$name').value;";
                //$javacode.="if($name == ''){";
                //$javacode.="alert('.$name vazio');";
                //$javacode.='document.getElementById("email_err").innerHTML = "Por favor informe o email";';                
                //$javacode.="document.getElementById('.$name._err').innerHTML = 'Por favor informe o email';return false;";
                //$javacode.="return false;";
                //$javacode.="}";//fim de if($name)
                              
  }//fim função text


  
  function checkbox( $name, $id, $label, $options = array() ) {?>
    <div class="form-group">
      <p><?php echo $label; ?></p>
      <?php foreach ( $options as $value => $title ) : ?>
        <label class="checkbox-inline" for="<?php echo $id; ?>">
          <input type="checkbox" name="<?php echo $name; ?>[]" value="<?php echo $value; ?>" <?php isset($_SESSION['interests']) ? checked($value, $_SESSION['interests']) : ''; ?>>
          <span class="checkbox-title"><?php echo $title; ?></span>
        </label>
      <?php endforeach; ?>
    </div>
  <?php }
  
  function submit($value = 'submit', $class = 'btn btn-primary') {?>
    <button type="submit" class="<?php echo $class; ?>"><?php echo $value; ?></button>
  <?php }




/*
exemplo checkbox
  $options = array(
    'acrobatics' => 'Acrobatics',
    'acting' => 'Acting',
    'antiques' => 'Antiques',
    'sports' => 'Sports',
  );

  checkbox( 'interests', 'interests', 'Select your interests', $options );
  
exemplo text
        $name,   $id,     $label,  $placeholder,      $type = 'text' 
  text('state', 'state', 'State', 'Enter your state');
  
exemplo submit
  submit('Go To Step 4 &raquo;');
*/    

?>

  <script>function validation(){
  alert('não envia');
  return false;
};
 </script> 