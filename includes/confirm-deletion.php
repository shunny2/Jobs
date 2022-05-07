<main>
    <section>
        <h2 class="mt-5">Excluir Vaga</h2>

        <form method="post">
            <div class="form-group">
                <p>Você deseja realmente excluir a vaga <strong><?= $job->title ?></strong>?</p>
            </div>

            <div class="btn-group">
                <a class="me-2" href="index.php">
                    <button type="button" class="btn btn-success">Cancelar</button>
                </a>
                <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </section>
</main>