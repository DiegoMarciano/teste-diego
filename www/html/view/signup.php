<?php

/**
 * View da página de cadastro de usuário
 */
$result = $result ?? [];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/sign.css">
</head>

<body>

    <main>

        <section id="signup-section">

            <div class="sign-form-container">

                <header>

                    <h1>
                        Cadastrar novo usuário
                    </h1>

                </header>

                <?php if (empty($result)): ?>

                    <form
                        id="signup-form"
                        action="#"
                        method="post"
                        class="login-form">

                        <fieldset>
                            <label for="name">Nome</label>
                            <input id="name" name="name" type="text" placeholder="Seu nome completo">
                        </fieldset>

                        <fieldset>
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" placeholder="email@email.com">
                        </fieldset>

                        <fieldset>
                            <label for="password">Senha</label>
                            <input id="password" name="password" type="password" placeholder="***************">
                        </fieldset>

                        <fieldset>
                            <button type="submit" class="form-submit-button">Cadastrar</button>
                        </fieldset>

                    </form>

                <?php else: ?>

                    <p><?php echo implode(" ", $result); ?>
                        <?php if (
                            in_array(
                                "Usuário cadastrado com sucesso.",
                                $result
                            )
                        ): ?>

                            <a href="/">Voltar para login</a>
                        <?php endif; ?>
                    </p>

                <?php endif; ?>

            </div>

        </section>

    </main>

    <script src="assets/script/main.js"></script>

</body>

</html>