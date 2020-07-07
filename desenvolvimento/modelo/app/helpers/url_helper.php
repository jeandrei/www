<?php
// Simple page redirect

function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
}


//PARA FAZER O DEBUG DE SQL BEM SIMPLES
/**
 * EXEMPLO $placeholders = ['id' => '1'];
 * $sql = 'SELECT * FROM fila WHERE id = :id ORDER BY id';
 * $sql = pdo_sql_debug($sql,$placeholders);
 * echo $sql;
 * 
 */
function pdo_sql_debug($sql,$placeholders){
    foreach($placeholders as $k => $v){
        $sql = preg_replace('/:'.$k.'/',"'".$v."'",$sql);
    }
    return $sql;
}

?>