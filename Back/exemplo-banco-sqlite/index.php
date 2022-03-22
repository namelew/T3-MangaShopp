<?php

require_once 'db.php';

try {
    // Sempre que o banco de dados for usado, é necessário colocar os comandos dentro de um
    // try...catch para que se, ocorrer algum erro, saberemos o que aconteceu.

    // Exemplo de busca de dados
    $comando = $db->prepare('SELECT * FROM usuarios');
    $comando->execute();
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

    if (count($resultado) > 0) {
        foreach($resultado as $linha) {
            echo 'Nome: ' . $linha['nome'] . ', E-mail: ' . $linha['email'] . '<br>';
        }
    } else {
        echo 'Nenhum usuário encontrado';
    }

    // Exemplo de inserção de dados
    $nome = 'Fernando';
    $email = 'fernando.bevilacqua@uffs.edu.br';
    $comando = $db->prepare('INSERT INTO usuarios (nome, email) VALUES (:nome, :email)');
    $comando->bindParam(':nome', $nome);
    $comando->bindParam(':email', $email);
    $comando->execute();

    // Exemplo de atualização de dados
    $id = 1;
    $nome = 'Fernando Bevilacqua';
    $email = 'dovyski@gmail.com';
    $comando = $db->prepare('UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id');
    $comando->bindParam(':id', $id);
    $comando->bindParam(':nome', $nome);
    $comando->bindParam(':email', $email);
    $comando->execute();

} catch (PDOException $e) {
    echo 'Erro ao executar comando no banco de dados: ' . $e->getMessage();
    exit();
}

?>