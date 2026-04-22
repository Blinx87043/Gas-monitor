<?php
use DamianPaginationPhp\Pagination;

error_reporting(E_ALL & ~E_DEPRECATED);

require_once __DIR__ . '/../../app/app.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../index.php");
}

$pagination = new Pagination(['pp' => 5, 'css_class_p' => 'pagination pagination-sm m-0 float-right']);

$count = $conn->query("SELECT COUNT(*) FROM gas")->fetchColumn();

$pagination->paginate($count);

$limit = $pagination->getLimit();
$offset = $pagination->getOffset();

$stmt = $conn->prepare("SELECT * FROM gas ORDER BY datatime DESC LIMIT {$offset}, {$limit}");
$gas = [];

if($stmt->execute()) {
    $gas = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include('../../template/gas/index.php');