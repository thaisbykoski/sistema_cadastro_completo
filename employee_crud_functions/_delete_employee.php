<?php

    include '../db/connection.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM `employees` WHERE id_employee = $id";

    $delete = mysqli_query($connection,$sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Exclusão</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://use.fontawesome.com/releases/v5.9.0/js/all.js" data-auto-a11y="true"></script>
</head>
<body>
<div class="container mb-3">

    <?php

        // Checks if the user is logged in
        session_start();
        $user = $_SESSION['user'];

        if (!isset($_SESSION['user'])) {
            header('Location: ../index.php');
        }

        // Controls what each user level can access
        $sql = "SELECT user_level FROM users WHERE user_mail = '$user' and status='Ativo'";
        $search = mysqli_query($connection, $sql);
        $array = mysqli_fetch_array($search);
        $level = $array['user_level'];

    ?>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../home.php"><i class="fas fa-home"></i> Home</a>
                </li>

                <?php

                    // User Level
                    if(($level == 1)||($level == 2)) {
                        
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-plus-square" style="color: green;"></i>
                    Cadastros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../register_new_employee.php">Adicionar Funcionário</a>
                    </div>
                </li>
                <?php  } ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search" style="color: blue;"></i>
                    Consultar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../list_employee.php">Lista de Funcionários</a>
                    </div>
                </li>

                <?php 

                    // User Level
                    if(($level == 1)) {
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user" style="color: #000;"></i>
                        Usuários
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../user_registration.php">Cadastrar Usuário</a>
                        <a class="dropdown-item" href="../users_approval.php">Aprovar Usuário</a>
                    </div>
                </li>

                <?php } ?>
            </ul>       
        </div>
        <div class="buttons">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item" style="text-align: right;">
                    <a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt" style="color: red;"></i> Sair</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Menu -->
    <div class="row">
        <!-- Confirmation card -->
        <div class="col-sm-12 pl-0 pr-0 border border-dark border-5 rounded-top">
            <div class="card text-center del-conf border-danger">
                <img class="card-img-top img-trash rounded float-left mt-5" src="../img/trash.png" alt="Imagem de capa do card">
                <div class="card-body">
                    <h5 class="card-title border-0 text-center" style="margin-bottom: 20px;">Deletado com sucesso!</h5>
                    <div class="return-button">
                        <a href="../list_employee.php" class="btn btn-lg btn-warning"> Voltar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    </body>
</html>
