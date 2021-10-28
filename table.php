<?php
    require 'connection.php';

    $sql = "SELECT * FROM longitude_latitude";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="450%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Longitude</th>
                        <th>Latitude</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_object($result)) : ?>
                    <tr>
                        <td><?= $row->longitude; ?></td>
                        <td><?= $row->latitude; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
           </table>
        </div>
    </div>
</body>
</html>