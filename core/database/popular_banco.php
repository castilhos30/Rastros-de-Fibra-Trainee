<?php

$host = 'db'; 
$dbname = 'rastros-de-fibra_db';
$user = 'root'; 
$pass = 'root';  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

/**
 * @param PDO $pdo Conexão com o banco de dados.
 * @param int $quantidade Número de interações a serem geradas.
 * @param string $dataInicio Data inicial no formato 'YYYY-MM-DD'.
 * @param string $dataFim Data final no formato 'YYYY-MM-DD'.
 */
function popularInteracoes($pdo, $quantidade, $dataInicio = '2026-01-01', $dataFim = '2026-06-20') {
    
    $stmtUsuarios = $pdo->query("SELECT id FROM usuarios");
    $usuariosIds = $stmtUsuarios->fetchAll(PDO::FETCH_COLUMN);

    $stmtPosts = $pdo->query("SELECT id FROM posts");
    $postsIds = $stmtPosts->fetchAll(PDO::FETCH_COLUMN);

    if (empty($usuariosIds) || empty($postsIds)) {
        die("Erro: É necessário ter usuários e posts cadastrados antes de popular as interações.\n");
    }

    $maxInteracoesPossiveis = count($usuariosIds) * count($postsIds);
    if ($quantidade > $maxInteracoesPossiveis) {
        die("Erro: Você pediu {$quantidade} interações, mas com a quantidade atual de usuários e posts, o máximo de interações únicas possíveis é {$maxInteracoesPossiveis}.\n");
    }

    $timestampInicio = strtotime($dataInicio);
    $timestampFim = strtotime($dataFim);

    $sql = "INSERT IGNORE INTO interacoes (likes, dislikes, id_usuario, id_post, tipo, data) 
            VALUES (:likes, :dislikes, :id_usuario, :id_post, :tipo, :data)";
    $stmtInsert = $pdo->prepare($sql);

    $inseridos = 0;
    $combinacoesUsadas = [];
    while ($inseridos < $quantidade) {
        $idUsuario = $usuariosIds[array_rand($usuariosIds)];
        $idPost = $postsIds[array_rand($postsIds)];

        $chaveCombinacao = $idUsuario . '-' . $idPost;

        if (in_array($chaveCombinacao, $combinacoesUsadas)) {
            continue;
        }

        $timestampAleatorio = mt_rand($timestampInicio, $timestampFim);
        $dataAleatoria = date('Y-m-d H:i:s', $timestampAleatorio);

        $tipo = mt_rand(0, 1);
        if ($tipo === 0) {
            $likes = 1;
            $dislikes = 0;
        } else {
            $likes = 0;
            $dislikes = 1;
        }

        try {
            $stmtInsert->execute([
                ':likes' => $likes,
                ':dislikes' => $dislikes,
                ':id_usuario' => $idUsuario,
                ':id_post' => $idPost,
                ':tipo' => $tipo,
                ':data' => $dataAleatoria
            ]);
            
            if ($stmtInsert->rowCount() > 0) {
                $combinacoesUsadas[] = $chaveCombinacao; 
                $inseridos++;
            }
        } catch (PDOException $e) {
            continue;
        }
    }

    echo "Sucesso! Foram geradas {$inseridos} interações únicas espalhadas entre {$dataInicio} e {$dataFim}.\n";
}

popularInteracoes($pdo, 49, '2026-01-01', '2026-06-20');

?>