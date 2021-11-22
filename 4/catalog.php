<?php
session_start();
$link = mysqli_connect('localhost', 'root', '', 'gb');
$var = json_decode(file_get_contents('php://input'), true);

if (isset($var['button'])) {
    $_SESSION['limit'] += 3;
}
else {
    $_SESSION['limit'] = 3;
}
$limit = $_SESSION['limit'];

renderCatalog($link, $limit);
function renderCatalog($link, $limit) {
    $query = 'SELECT * FROM images WHERE 1 ORDER BY viewed DESC LIMIT ' . $limit;
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="showimages.php?image_id=' . $row['id'] . '">';
        echo '<img width="250" src="' . $row['path'] . '">';
        echo '</a>';
    }
}