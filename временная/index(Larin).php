<?php

// подключение к БД
$pdo = new PDO('mysql:host=localhost;dbname=urGadget;charset=utf8', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

// вычисляем
$perPage = 2;
$page = $_GET['page'] ?? 1;
$offset = ($page - 1) * $perPage;
$search = $_GET['search'] ?? "";
$searchString = $search ? "&search=$search" : "";

// выборка записей
$countries = $pdo->prepare("select * from countries where name LIKE ? limit $offset, $perPage");
$countries->execute([
    "%{$search}%"
]);
$countries = $countries->fetchAll();

// определяем общее количество
$rows = $pdo->prepare("SELECT COUNT(*) as count FROM countries where name LIKE ?");
$rows->execute([
    "%{$search}%"
]);
$totalRows = $rows->fetchAll()[0]->count;
$totalPages = ceil($totalRows / $perPage);
?>

<?php foreach ($countries as $country) : ?>
    <div>
        Country: <?= $country->name ?>
    </div>
<?php endforeach; ?>

<br>

<a href="?page=1<?= $searchString ?>">First</a>
<a href="<?= $page <= 1 ? "#" : "?page=" . ($page - 1).$searchString ?>">Prev</a>
<a href="<?= $page >= $totalPages ? "#" : "?page=" . ($page + 1).$searchString ?>">Next</a>
<a href="?page=<?= $totalPages . $searchString ?>">Last</a>