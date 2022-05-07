<?php
    require('../vendor/autoload.php');

    use App\Entity\Job;
    use App\Database\Pagination;

    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $filterStatus = filter_input(INPUT_GET, 'filterStatus', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // Look for the characters 's' and 'n' in the array
    $filterStatus = in_array($filterStatus, ['s', 'n']) ? $filterStatus : '';

    // SQL conditions query
    $conditions = [
        !empty($search) ? 'title LIKE "%'.str_replace(' ', '%', $search).'%"' : null,
        !empty($filterStatus) ? 'active = "'.$filterStatus.'"' : null
    ];

    // Remove empty positions
    $conditions = array_filter($conditions);

    // Convert to string and separates by AND
    $where = implode(' AND ', $conditions);

    // Total number of vacancies
    $numberOfVacancies = Job::getNumberOfVacancies($where);

    $pagination = new Pagination($numberOfVacancies, $_GET['page'] ?? 1, 10);

    $jobs = Job::getVacancies($where, null, $pagination->getLimit());

    include('../includes/header.php');
    include('../includes/listing.php');
    include('../includes/footer.php');
?>