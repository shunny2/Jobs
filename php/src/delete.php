<?php
    require('../vendor/autoload.php');

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
    if(isset($_POST['delete'])) {
        $job->delete();

        header('location: index.php?status=success');
        exit;
    }

    include('../includes/header.php');
    include('../includes/confirm-deletion.php');
    include('../includes/footer.php');
?>