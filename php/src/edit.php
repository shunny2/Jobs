<?php
    require('../vendor/autoload.php');

    define('TITLE','Editar vaga');

    use \App\Entity\Job;
    use \App\Session\Login;

    Login::requireLogin();
    
    // Get ID Validation
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header('location: index.php?status=error');
        exit;
    }

    // Consult vacancy
    $job = Job::getVacancy($_GET['id']);
    
    // Job Validation
    if(!$job instanceof Job) {
        header('location: index.php?status=error');
        exit;
    }

    // Post Validation
    if(isset($_POST['title'], $_POST['description'], $_POST['active'])) {
        $job->title = $_POST['title'];
        $job->description = $_POST['description'];
        $job->active = $_POST['active'];

        $job->update();

        header('location: index.php?status=success');
        exit;
    }

    include('../includes/header.php');
    include('../includes/form.php');
    include('../includes/footer.php');
?>