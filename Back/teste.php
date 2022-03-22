<?php 
    $arquivo = 'banco.sql';
    $init = false;
    if(!file_exists($arquivo)){
        $init = true;
        file_put_contents($arquivo, '');
    }

    $db = new PDO("sqlite:$arquivo");

    if($init){
        $create = $db->prepare('CREATE TABLE usuario(id INTEGER NOT NULL, nome TEXT, email TEXT, senha VARCHAR(32))')
    }

?>