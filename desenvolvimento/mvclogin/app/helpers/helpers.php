
<?php
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
          value="<?php echo isset($_POST[$name]) ? ($_POST[$name]) : ''; ?>"
          onfocus='this.classList.remove("is-invalid"), document.getElementById("<?php echo $name;?>_err").innerHTML = "";'>
          <span id="<?php echo $name;?>_err" class="text-danger"><?php echo $error;?></span>
    </div>
  <?php                               
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
?>


