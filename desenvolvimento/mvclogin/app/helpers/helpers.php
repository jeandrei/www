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
          class="<?php echo isset($attributes['input_class']) ? $attributes['input_class'] : 'form-control form-control-lg';  echo (!empty($error)) ? 'is-invalid' : ''; ?>"           
          value="<?php echo isset($_POST[$attributes['name']]) ? ($_POST[$attributes['name']]) : ''; ?>"
          onfocus="this.classList.remove('is-invalid'), document.getElementById('<?php echo $attributes['name'];?>_err').innerHTML = '';"
      >
      <span id="<?php echo $attributes['name'];?>_err" class="text-danger"><?php echo $attributes['error'];?></span>
    
  </div>
<?php                               
}//fim função text



//CHECKBOX CUSTOMIZADO
function customcheck($attributes){?>
 <?php $checked_ids = array(); foreach($attributes['checked'] as $key=>$value){array_push($checked_ids,$key);}?>
  <div class="form-group">
      <?php foreach ( $attributes['options'] as $id => $value ) : ?> 
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" name="<?php echo $attributes['name'];?>[]" id="<?php echo $id?>" <?php isset($attributes['checked']) ? checked($id, $checked_ids) : ''; ?>>
            <label class="custom-control-label" for="<?php echo $id;?>"><?php echo $value;?></label>            
          </div> 
      <?php endforeach; ?>
      <label for="<?php echo $attributes['name'];?>[]" class="error"></label>  
  </div>
<?php
}


// GERA CHEKBOX
  function checked($value, $array) {
    if ( in_array( $value, $array ) ) {
      echo 'checked="checked"';
    }
  }
function checkbox($attributes) {?>
  <div class="form-group">
    <p><?php echo $attributes['label']; ?></p>
    <!--na linha abaixo eu pego o array associativo $attributes['checked'] e passo as chaves para a variável cheked_ids-->
    <!--se no $attributes['checked'] eu passo 'acrobatics' => 'Acrobatics' no $checked_id eu passo [0] => 'acrobatics'-->
    <!--no foreach ( $attributes['options'] as $value => $title ) $value vai ter acrobatics logo para poder verificar no in_array tem que ter a mesma chave-->
    <!--dai fica assim in_array(acrobatics,acrobatics)-->
    <?php $checked_ids = array(); foreach($attributes['checked'] as $key=>$value){array_push($checked_ids,$key);}?>
    <?php foreach ( $attributes['options'] as $value => $title ) : ?> 
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="<?php echo $attributes['name']; ?>[]" id=<?php echo $attributes['id']; ?> value="<?php echo $value; ?>" <?php isset($attributes['checked']) ? checked($value, $checked_ids) : ''; ?>><?php echo $title; ?>
            </label>
        </div>   
        <?php endforeach; ?>
          <div class="form-group">
            <span id="<?php echo $attributes['id'];?>_err" class="text-danger"><?php echo $attributes['error'];?></span>
          </div>    
  </div>
<?php }




//GERA RADIO
function radionovo($attributes) { if (isset($_POST[$attributes['id']])){$id = $_POST[$attributes['id']];}?>
  <div class="form-group">
    <p><?php echo $attributes['label']; ?></p>      
    <?php foreach ( $attributes['options'] as $value => $title ) : ?> 
        <div class="form-check">
          <input class="form-check-input" type="radio" name="<?php echo $attributes['name']; ?>" id="<?php echo $value; ?>" value="<?php echo $value; ?>" <?php isset($id) ? radiochecked($id, $value) : ''; ?>>
          <label class="form-check-label" for="<?php echo $value; ?>">
            <?php echo $title;?>
          </label>
        </div>
        <?php endforeach; ?>
          <div class="form-group">
            <span id="<?php echo $attributes['name'];?>_err" class="text-danger"><?php echo $attributes['error'];?></span>
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
function selectlist($attributes){ $i=0;(isset($_POST[$attributes['name']])) ? $selected = $_POST[$attributes['name']] : $selected = '00' ;?>
  <div class="form-group">
  <label for="<?php echo $attributes['id']; ?>"><?php echo $attributes['label']; ?></label>
    <select
        name="<?php echo $attributes['name']; ?>" 
        id="<?php echo $attributes['id']; ?>" 
        placeholder="<?php echo $attributes['placeholder']; ?>"
        class="form-control form-control-lg <?php echo (!empty($attributes['error'])) ? 'is-invalid' : ''; ?>"
        onfocus="this.classList.remove('is-invalid'), document.getElementById('<?php echo $attributes['name'];?>_err').innerHTML = '';">          
    >
        <option value="0"><?php echo $attributes['placeholder']; ?></option>
        <? foreach($attributes['options'] as $id => $option) : ?> 
              <option value="<?php echo $id; ?>"
                <?php echo $id == $selected ? 'selected':'';?>
              >
              <?php echo $option;?>
              </option>
        <?php endforeach; ?>  
    </select>
    <span id="<?php echo $attributes['name'];?>_err" class="text-danger"><?php echo $attributes['error'];?></span>
  </div>
  <?php }




//TEXTAREA
function textarea($attributes){?>
  <div class="form-group">
    <label for="$id_field"><?php echo $attributes['label'];?></label>
    <textarea 
      class="form-control" 
      name="<?php echo $attributes['name'];?>"
      id="<?php echo $attributes['id'];?>" 
      rows="<?php echo $attributes['rows'];?>" 
      onfocus="this.classList.remove('is-invalid'), document.getElementById('<?php echo $attributes['name'];?>_err').innerHTML = '';"><?php echo (isset($_POST['infadicional'])) ? trim($_POST['infadicional']) : ''; ?></textarea>
      <div class="form-group">
            <span id="<?php echo $attributes['name'];?>_err" class="text-danger"><?php echo $attributes['error'];?></span>
      </div>  
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


