<?php 
function imprimeuf($ufsec){
$arrayEstados = array(
    'AC',
    'AL',
    'AM',
    'AP',
    'AC',
    'BA',
    'CE',
    'DF',
    'ES',
    'GO',
    'MA',
    'MT',
    'MS',
    'MG',
    'PA',
    'PB',
    'PR',
    'PE',
    'PE',
    'PI',
    'RJ',
    'RN',
    'RN',
    'RO',
    'RS',
    'RR',
    'SC',
    'SE',
    'SP',
    'TO' 
  );  
  foreach($arrayEstados as $uf){ 
    //iduf tem que ser passada pelo post
    if($uf == $ufsec){
      $html .= '<option selected value="'.$uf.'" '.'>'.$uf.'</option>';
    }
    else{
    $html .='<option value="'.$uf.'" '.'>'.$uf.'</option>';           

  }

}
return $html;
}
?>