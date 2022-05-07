<main>
    <section>
        <div class="d-flex flex-row-reverse">
            <a href="index.php">
                <button class="btn btn-success">Voltar</button>
            </a>
        </div>

        <h2 class="mt-3"><?=TITLE?></h2>

        <form method="post">
            <div class="form-group mb-2">
                <label for="title">Título</label>
                <input type="text" class="form-control" name="title" value="<?=$job->title?>">
            </div>
            
            <div class="form-group mb-2">
                <label for="description">Descrição</label>
                <textarea type="text" class="form-control" name="description" rows="5"><?=$job->description?></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <div class="mt-1">
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="active" value="s" checked> Ativo
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-control">
                            <input type="radio" name="active" value="n" <?=$job->active == 'n' ? 'checked' : ''?>> Inativo
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </section>
</main>