<?php
include 'config.php'; ?>
<?php include 'partials/head.php'; ?>


<?php include 'partials/nav.php'; ?>
<?php
$notify = "";
$name = $_POST['name'];
$comment = $_POST['comment'];
$submit = $_POST['submit'];
if (isset($_POST['notify_box'])) {
    $notify = $_POST['notify_box'];
}

if ($submit) {
    if ($name && $comment) {
        $insert = mysql_query("INSERT INTO comment (name,comment) VALUES
    ('$name','$comment') ");
    } else {
        echo " please fill out all fields";
    }
}

mb_internal_encoding('UTF-8');
$sql = "SELECT * FROM comment";
$getquery = mysqli_query($sql); ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Comment box</title>
    <style type="text/css">
    body {
        margin: auto 48px;
    }
    </style>
</head>

<body>
    <div>
        <table id="commentTable">
            <colgroup>
                <col width="25%" />
                <col width="75%" />
            </colgroup>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysql_fetch_array($getquery)) {
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['comment'] . '</td>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <form action="comment.php" method="POST">
        <colgroup>
            <col widht="25%" style="vertical-align:top;" />
            <col widht="75%" style="vertical-align:top;" />
        </colgroup>
        <table>

            <tr>
                <td><label for="comment"></label></td>
                <td><textarea name="" rows="10" cols="50"></textarea></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Comment"></td>
            </tr>
        </table>
    </form>
</body>

</html>