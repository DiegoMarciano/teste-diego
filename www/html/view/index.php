<?php

/**
 * View da página inicial (login)
 */

$result = $result ?? [];

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/sign.css">
</head>

<body>

    <main>

        <section id="sign-section">

            <div class="sign-form-container">

                <header>

                    <h1>
                        Sistema de controle de serviços
                    </h1>

                </header>

                <?php if ($_SERVER["REQUEST_METHOD"] === "GET"): ?>

                    <form id="signin-form" method="post" class="signin-form" action="/">

                        <fieldset>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" placeholder="email@email.com" required>
                        </fieldset>

                        <fieldset>
                            <label for="password">Senha</label>
                            <input id="password" name="password" type="password" placeholder="************" required>
                        </fieldset>

                        <fieldset class="form-actions">
                            <button type="submit" class="form-submit-button">Entrar</button>
                            <a href="/signup.php">Cadastrar usuário</a>
                        </fieldset>

                    </form>

                <?php else: ?>

                    <p><?php echo implode(" ", $result); ?></p>

                    <footer>
                        <p><a href="/">Voltar</a></p>
                    </footer>

                <?php endif; ?>

            </div>

        </section>

    </main>

</body>

</html>