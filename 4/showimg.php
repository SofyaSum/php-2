<?php

$id = $_GET['image_id'] ?? null;
$link = mysqli_connect('localhost', 'root', '', 'gb');
if ($id && is_numeric($id)) {
    mysqli_query($link, 'UPDATE images SET viewed = viewed + 1 WHERE id =' . $id);
    $result = mysqli_query($link, 'SELECT * FROM images WHERE id=' . $id);
    $image = mysqli_fetch_assoc($result);
    if ($image) {
        echo '<img src="' . $image['path'] . '">';
    } else {
        die;
    }
    echo '<p> Просмотров: ' . $image['viewed'] . '</p>';
}