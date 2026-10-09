<?php 
require "config/conexao.php"; 

$stmt = $pdo->query(
    "SELECT * FROM clientes ORDER BY id DESC"
); 
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <div class="header-acoes">
            <h1>Lista de Clientes</h1>
            <a href="cadastro.php" class="btn btn-novo">
                <i class="fa-solid fa-user-plus"></i> Novo Cliente
            </a>
        </div>

        <div class="table-responsive">
            <table> 
                <thead> 
                    <tr> 
                        <th>Nome</th> 
                        <th>E-mail</th> 
                        <th>Cidade</th> 
                        <th class="text-center">Ações</th> 
                    </tr> 
                </thead> 
                <tbody> 
                    <?php if (empty($clientes)): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Nenhum cliente cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($clientes as $cliente): ?> 
                        <tr> 
                            <td><?= htmlspecialchars($cliente["nome"]) ?></td> 
                            <td><?= htmlspecialchars($cliente["email"]) ?></td> 
                            <td><?= htmlspecialchars($cliente["cidade"]) ?></td> 
                            <td class="acoes-cell"> 
                                <a href="editar.php?id=<?= $cliente['id'] ?>" class="btn btn-sm btn-editar" title="Editar">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a> 
                                <a href="excluir.php?id=<?= $cliente['id'] ?>" class="btn btn-sm btn-excluir" title="Excluir" onclick="return confirm('Deseja realmente excluir este cliente?');">
                                    <i class="fa-solid fa-trash-can"></i> Excluir
                                </a> 
                            </td> 
                        </tr> 
                        <?php endforeach; ?> 
                    <?php endif; ?>
                </tbody> 
            </table>
        </div>
    </div>

    <!-- Rodapé Estilizado -->
    <footer class="site-footer">
        <div class="footer-content">
            <p><i class="fa-solid fa-laptop-code"></i> Desenvolvido por <strong>Adriel Victtor</strong></p>
            <p><i class="fa-solid fa-graduation-cap"></i> Curso Técnico em Informática | <span>CETI ARLÉO BARBOSA</span></p>
            <p class="footer-copy"><i class="fa-regular fa-copyright"></i> 2026 - Todos os direitos reservados</p>
        </div>
    </footer>

    <script src="js/script.js"></script> 
</body>
</html>