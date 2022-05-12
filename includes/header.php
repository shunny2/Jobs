<?php
  use \App\Session\Login;

  // Logged user data
  $loggedInUser = Login::getUserLoggedIn();
  
  // User details
  $user = $loggedInUser ? 
    'Bem vindo ' .$loggedInUser['name']. '! >'. '<strong><a href="logout.php" class="text-light ml-3" style="text-decoration: none">Sair</a></strong>' :
    '<strong><a href="login.php" class="text-light ml-3" style="text-decoration: none">Entrar</a></strong>';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Vagas</title>
</head>

<body class="bg-dark text-light">
  <div class="container">
    <div class="text-center">
      <h1>Vagas de emprego</h1>
      <p>Exemplo de CRUD com PHP orientado a Objetos</p>

      <hr class="border-light">

      <div class="d-flex justify-content-end mb-5">
        <?=$user?>
      </div>
    </div>