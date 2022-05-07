<?php
    $menssage = '';
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $menssage = '<div class="alert alert-success">
                                Ação executada com sucesso!
                            </div>';
                break;
            case 'error':
                $menssage = '<div class="alert alert-danger">
                                Não foi possível executar esta ação!
                            </div>';
                break;
        }
    }

    $results = '';
    foreach ($jobs as $job) {
        $results .=
            '<tr>
                <td>' . $job->id . '</td>
                <td>' . $job->title . '</td>
                <td>' . $job->description . '</td>
                <td>' . ($job->active == 's' ? 'Ativo' : 'Inativo') . '</td>
                <td>' . date('d/m/Y à\s H:i:s', strtotime($job->date)) . '</td>
                <td>
                    <div class="btn-group">
                        <a class="me-2" href="edit.php?id=' . $job->id . '">
                            <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                        <a href="delete.php?id=' . $job->id . '">
                            <button type="button" class="btn btn-danger">Excluir</button>
                        </a>
                    </div>
                </td>
            </tr>';
    }

    $results = !empty($results) ? $results : 
        '<tr>
            <td colspan="6" class="text-center"><strong>Nenhuma vaga encontrada.</strong></td>
        </tr>';

    // Remove status and search page
    unset($_GET['status']);
    unset($_GET['page']);

    $gets = http_build_query($_GET);

    $paginations = '';
    $pages = $pagination->getPages();
    foreach ($pages as $key => $page) {
        $class = $page['currentPage'] ? 'btn-primary' : 'btn-light';
        $paginations .= '<a href="?page='.$page['page'].'&'.$gets.'">
                            <button type="button" class="btn '.$class.' me-2">'.$page['page'].'</button>
                        </a>';
    }
?>
<main>
    <?= $menssage ?>

    <section>
        <div class="d-flex flex-row-reverse">
            <a href="register.php">
                <button class="btn btn-success">Nova Vaga</button>
            </a>
        </div>
    </section>

    <section>
        <form method="get">
            <div class="row my-2">
                <div class="col">
                    <label for="search">Título</label>
                    <input type="text" name="search" class="form-control mt-2" value="<?=$search?>">
                </div>
                <div class="col">
                    <label for="filterStatus">Status</label>
                    <select name="filterStatus" class="form-control mt-2">
                        <option value="">Ativo/Inativo</option>
                        <option value="s" <?=$filterStatus == 's' ? 'selected' : ''?>>Ativo</option>
                        <option value="n" <?=$filterStatus == 'n' ? 'selected' : ''?>>Inativo</option>
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>
    </section>

    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?= $results ?>
            </tbody>
        </table>
    </section>

    <section>
        <div class="d-flex flex-row justify-content-end">
            <?=$paginations?>
        </div>
    </section>
</main>