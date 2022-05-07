<?php
    require('../vendor/autoload.php');

    define('TITLE','Cadastrar vaga');

    use \App\Entity\Job;

    $job = new Job;
    
    // Post Validation
    if(isset($_POST['title'], $_POST['description'], $_POST['active'])) {
        $job->title = $_POST['title'];
        $job->description = $_POST['description'];
        $job->active = $_POST['active'];

        $job->register();

        header('location: index.php?status=success');
        exit;
    }

    include('../includes/header.php');
    include('../includes/form.php');
    include('../includes/footer.php');
?>