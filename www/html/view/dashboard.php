<?php

/**
 * View do dashboard
 */
$services = $services ?? [];
$description = $description ?? "";
$startDate = $startDate ?? "";
$endDate = $endDate ?? "";
?>

<!DOCTYPE html>

<html lang="pt">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link
        rel="stylesheet"
        href="assets/style/main.css">

    <link
        rel="stylesheet"
        href="assets/style/dashboard.css">

</head>

<body>

    <div id="dashboard">

        <aside class="sidebar">

            <div class="sidebar-user">

                <span>
                    Logado como:
                </span>

                <strong>
                    <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
                </strong>

                <a href="/logout.php">
                    Sair
                </a>

            </div>

            <nav class="sidebar-nav">

                <a href="/service-register.php">
                    Cadastrar Serviço
                </a>

            </nav>

        </aside>

        <main class="main-content">

            <header class="page-header">

                <h1>
                    Dashboard
                </h1>

            </header>

            <section class="service-summary">

                <div class="service-list">

                    <h2>
                        Últimos Serviços
                    </h2>

                    <ul>

                        <?php foreach (array_slice($services, 0, 3) as $service): ?>

                            <li>

                                <?php echo $service["id_service"]; ?>

                                -

                                <?php echo htmlspecialchars($service["description"]); ?>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>

                <div class="service-list">

                    <h2>
                        Serviços Pendentes
                    </h2>

                    <ul>

                        <?php foreach ($services as $service): ?>

                            <?php if ($service["finished_at"] === null): ?>

                                <li>

                                    <?php echo $service["id_service"]; ?>

                                    -

                                    <?php echo htmlspecialchars($service["description"]); ?>

                                </li>

                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                </div>

            </section>

            <section id="section-services">

                <form class="service-filters" method="get">
                    <input type="text" name="description" placeholder="Nome" value="<?php echo htmlspecialchars($description); ?>">
                    <input type="date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>">

                    <input type="date" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>">

                    <button type="submit">Filtrar</button>
                </form>

                <div class="services-table-wrapper">

                    <table class="services-table">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>Valor</th>
                                <th>Comissão</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?php echo $service["id_service"]; ?></td>
                                    <td><?php echo htmlspecialchars($service["description"]); ?></td>
                                    <td>R$<?php echo number_format(
                                                $service["price"],
                                                2,
                                                ",",
                                                "."
                                            ); ?></td>
                                    <td>R$<?php echo number_format(
                                                $service["commission_user"],
                                                2,
                                                ",",
                                                "."
                                            ); ?>
                                    </td>
                                    <td><?php if ($service["finished_at"] === null): ?>

                                            PENDENTE

                                            <form method="post">
                                                <input type="hidden" name="service_id" value="<?php echo $service["id_service"]; ?>">
                                                <button type="submit">Finalizar</button>
                                            </form>

                                        <?php else: ?>

                                            FINALIZADO

                                        <?php endif; ?>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </section>

        </main>

    </div>

</body>

</html>