
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
  
  

  
  function checkbox( $name, $id, $label, $options, $checked) {?>
    <div class="form-group">
      <p><?php echo $label; ?></p>
      <?php foreach ( $options as $value => $title ) : ?>      
        <label class="checkbox-inline" for="<?php echo $id; ?>">
          <input type="checkbox" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php isset($checked) ? checked($title, $checked) : ''; ?>>    
          <span class="checkbox-title"><?php echo $title; ?></span>
        </label>
      <?php endforeach; ?>
    </div>
  <?php }


  
  function submit($value = 'submit', $class = 'btn btn-success btn-block') {?>
    <button type="submit" class="<?php echo $class; ?>"><?php echo $value; ?></button>
  <?php }

  function linkbutton($link, $text, $class = 'btn btn-light btn-block') {?>
    <a href="<?php echo $link; ?>" class="btn btn-light btn-block"><?php echo $text; ?></a>  
  <?php }
  
  
  //GERA SELECT 
  function selectlist($name,$id,$label,$text,$array,$selected,$error){ $i=0;?>
  <div class="form-group">
  <label for="<?php echo $id; ?>"><?php echo $label; ?></label>
    <select
        name="<?php echo $name; ?>" 
        id="<?php echo $id; ?>" 
        placeholder="<?php echo $placeholder; ?>"
        class="form-control form-control-lg <?php echo (!empty($error)) ? 'is-invalid' : ''; ?>"
        onfocus='this.classList.remove("is-invalid"), document.getElementById("<?php echo $name;?>_err").innerHTML = "";'>          
    >
        <option value="0"><?php echo $text; ?></option>
        <? foreach($array as $option) : ?> 
              <option value="<?php echo $option[0]; ?>"
                <?php echo $option[0] == $selected[0] ? 'selected':'';?>
              >
              <?php echo $option[1];?>
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


