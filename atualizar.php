<?php 
require "config/conexao.php"; 

$id       = $_POST["id"] ?? null; 
$nome     = trim($_POST["nome"] ?? ""); 
$email    = trim($_POST["email"] ?? ""); 
$telefone = trim($_POST["telefone"] ?? ""); 
$cidade   = trim($_POST["cidade"] ?? ""); 

// Validação corrigida para aceitar edição sem erros caso telefone/cidade venham vazios, 
// exigindo apenas o ID, Nome e E-mail válidos.
if (!$id || !is_numeric($id) || $nome === "" || $email === "") { 
    die("Dados inválidos. Por favor, preencha os campos obrigatórios."); 
} 

$sql = "UPDATE clientes SET 
        nome = :nome, 
        email = :email, 
        telefone = :telefone, 
        cidade = :cidade 
        WHERE id = :id"; 

$stmt = $pdo->prepare($sql); 
$stmt->execute([ 
    ":nome"     => $nome, 
    ":email"    => $email, 
    ":telefone" => $telefone, 
    ":cidade"   => $cidade, 
    ":id"       => $id, 
]); 

header("Location: index.php"); 
exit;