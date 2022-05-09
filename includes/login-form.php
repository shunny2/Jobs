<?php
    $loginAlert = !empty($loginAlert) ? '<div class="alert alert-danger">'.$loginAlert.'</div>' : '';
    $registerAlert = !empty($registerAlert) ? '<div class="alert alert-danger">'.$registerAlert.'</div>' : '';
?>

<main>
    <div class="text-light">
        <div class="row">
            <div class="col mt-5">
                <form method="post">
                    <h2>Login</h2>

                    <?=$loginAlert?>

                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="password">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group mt-4 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary" name="action" value="login">Entrar</button>
                    </div>
                </form>
            </div>

            <div class="col mt-5">
                <form method="post">
                    <h2>Cadastre-se</h2>

                    <?=$registerAlert?>

                    <div class="form-group mt-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="password">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group mt-4 d-flex flex-row-reverse">
                        <button type="submit" class="btn btn-primary" name="action" value="register">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>