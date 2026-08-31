<?php

/**
 * View da página de cadastro de serviço
 */

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Serviço</title>
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/service-register.css">
</head>

<body>
    <main>
        <section id="service-register-section">
            <div class="service-form-container">
                <header>
                    <h1>Cadastrar Novo Serviço</h1>
                </header>
                <?php if (!empty($result)): ?>

                    <p>
                        <?php echo implode(" ", $result); ?>
                    </p>

                <?php endif; ?>
                <form id="service-register-form" method="post" class="service-register-form">
                    <fieldset>
                        <label>Descrição</label>
                        <input name="description" type="text" placeholder="Descrição">
                    </fieldset>
                    <fieldset>
                        <label>Preço</label>
                        <input name="price" type="number" placeholder="preço" step="1">
                    </fieldset>
                    <fieldset class="form-actions">
                        <button type="submit" class="form-submit-button">Cadastrar</button>
                    </fieldset>
                </form>
            </div>
        </section>
    </main>
</body>

</html>