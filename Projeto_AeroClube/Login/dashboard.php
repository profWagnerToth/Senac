<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Aero Clube</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        #wrapper {
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        #sidebar-wrapper {
            min-width: 250px;
            max-width: 250px;
            background-color: #343a40;
            color: #fff;
            transition: all 0.3s ease;
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 15px;
            font-size: 1.25rem;
            font-weight: 500;
            border-bottom: 1px solid #495057;
        }
        #sidebar-wrapper .list-group-item {
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
        }
        #sidebar-wrapper .list-group-item:hover {
            background-color: #495057;
            color: #fff;
        }
        #page-content-wrapper {
            flex: 1;
            padding: 20px;
            transition: all 0.3s ease;
        }
        #menu-toggle {
            margin-left: 20px;
        }
        .toggled #sidebar-wrapper {
            margin-left: -250px;
        }
        .toggled #page-content-wrapper {
            margin-left: 0;
        }
        .section-title {
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Menu</div>
            <div class="list-group list-group-flush">
                <a href="../Alunos/dashboardAluno.php" class="list-group-item list-group-item-action">Alunos</a>
                <a href="../Instrutores/dashboardInstrutores.php" class="list-group-item list-group-item-action">Instrutores</a>
                <a href="../formacoes_adicionais/dashboardFormacao.php" class="list-group-item list-group-item-action">Formações Adicionais</a>
                <a href="../formacoes_instrutores/dashboardFormacoes_Instrutores.php" class="list-group-item list-group-item-action">Formações de Instrutores</a>
                <a href="#registros-voos" class="list-group-item list-group-item-action">Registros de Voos</a>
                <a href="#pareceres" class="list-group-item list-group-item-action">Pareceres</a>
                <a href="#emissao-breve" class="list-group-item list-group-item-action">Emissão de Brevê</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Menu</button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../home.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Dashboard do Aero Clube</h1>
                <p>Bem-vindo ao painel de controle. Selecione uma opção do menu à esquerda para navegar.</p>

                <!-- Alunos Section -->
                <div id="alunos" class="mt-4">
                    <h2 class="section-title">Alunos</h2>
                    <p>Gerencie os alunos cadastrados no aeroclube.</p>
                    <!-- Conteúdo relacionado aos alunos -->
                </div>

                <!-- Instrutores Section -->
                <div id="instrutores" class="mt-4">
                    <h2 class="section-title">Instrutores</h2>
                    <p>Gerencie os instrutores do aeroclube.</p>
                    <!-- Conteúdo relacionado aos instrutores -->
                </div>

                <!-- Formações Adicionais Section -->
                <div id="formacoes-adicionais" class="mt-4">
                    <h2 class="section-title">Formações Adicionais</h2>
                    <p>Gerencie as formações adicionais oferecidas.</p>
                    <!-- Conteúdo relacionado às formações adicionais -->
                </div>

                <!-- Formações de Instrutores Section -->
                <div id="formacoes-instrutores" class="mt-4">
                    <h2 class="section-title">Formações de Instrutores</h2>
                    <p>Gerencie as formações dos instrutores.</p>
                    <!-- Conteúdo relacionado às formações dos instrutores -->
                </div>

                <!-- Registros de Voos Section -->
                <div id="registros-voos" class="mt-4">
                    <h2 class="section-title">Registros de Voos</h2>
                    <p>Gerencie os registros de voos realizados.</p>
                    <!-- Conteúdo relacionado aos registros de voos -->
                </div>

                <!-- Pareceres Section -->
                <div id="pareceres" class="mt-4">
                    <h2 class="section-title">Pareceres</h2>
                    <p>Gerencie os pareceres emitidos.</p>
                    <!-- Conteúdo relacionado aos pareceres -->
                </div>

                <!-- Emissão de Brevê Section -->
                <div id="emissao-breve" class="mt-4">
                    <h2 class="section-title">Emissão de Brevê</h2>
                    <p>Gerencie a emissão de brevês para os pilotos.</p>
                    <!-- Conteúdo relacionado à emissão de brevê -->
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        var toggleButton = document.getElementById("menu-toggle");
        var wrapper = document.getElementById("wrapper");

        toggleButton.addEventListener("click", function() {
            wrapper.classList.toggle("toggled");
        });
    </script>
</body>
</html>
