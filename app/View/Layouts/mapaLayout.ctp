<html lang="PT-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vayron</title>
    <?php
    echo $this->Html->css('Metronic/bootstrap.min.css');
    echo $this->Html->css('Metronic/fontawesome.min.css');


    ?>
</head>
<body>
    <div class="container-fluid bg-white">
    <a href="./dashboards"><button type="button" class="btn btn-dark">Voltar</button></a>
    <a class="navbar-brand mr-auto"><p class="h4"> Mapa Inteligente &nbsp;|&nbsp; <?php echo '<span class="h4">' . AuthComponent::user('Estabelecimento.nome_fantasia') ?></p></a>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </nav>
        <main role="main"  id="content">
            <?php
            echo $this->Flash->render();
            echo $this->fetch('content');
            ?>
        </main>

        <?php
    echo $this->Html->script('Metronic/jquery-2.1.3'); //Buffer|Todo projeto|
    echo $this->Html->script('Metronic/mapa.js');
    ?>
</body>

</html>