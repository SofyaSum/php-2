<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <div class="catalog">
        <?php
        session_start();
        $_SESSION['limit'] = 3;
        $link = mysqli_connect('localhost', 'root', '', 'gb');
        $query = 'SELECT * FROM images WHERE 1 ORDER BY viewed DESC LIMIT 3';
        $result = mysqli_query($link, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<a href="showimg.php?image_id=' . $row['id'] . '">';
            echo '<img width="250" src="' . $row['path'] . '">';
            echo '</a>';
        }
        ?>
    </div>
    <input type="button" class="more" value="Ещё v">
</body>
<script src="fetch.js"></script>
</html>