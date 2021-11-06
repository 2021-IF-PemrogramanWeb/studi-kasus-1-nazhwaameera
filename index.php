<?php
    session_start();
    //jika user berusaha masuk tanpa login
    if( !isset($_SESSION["login"]) )
    {
        header("Location: login.php"); //kembali ke halaman login
        exit;
    }

    $conn = mysqli_connect("localhost", "root", "", "housing1");

    $query = "SELECT * FROM sales_data"; //query
    $result = mysqli_query($conn, $query);
    $data = [];
        
    while( $row = mysqli_fetch_assoc($result) )
    {
        $data[] = $row;
    }

    //Mendapatkan id user
    // $user_id = $_GET["id_user"];
    // $result_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $user_id");
    // $user = [];

    // while( $row = mysqli_fetch_assoc($result_user) )
    // {
    //     $user[] = $row;
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        .profile a.nav-link {
            display: flex;
            justify-content: flex-end;
        }
        .container {
            margin-top: 20px;
        }
        .button-group {
            display: flex;
            justify-content: flex-end;
        }
        .button-item {
            margin: 5px;
        }
        .container.border {
            margin: 10px;
        }
        .logo {
            display: flex;
            justify-content: flex-start;
        }
        .title {
            font-family: 'Zen Antique Soft';
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
        <!-- Left links -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item me-3 me-lg-1">
                <div class="nav-link d-sm-flex align-items-sm-center">
                <img
                    src="https://picsum.photos/200"
                    class="rounded-circle"
                    height="22"
                    alt=""
                    loading="lazy"
                />
                <strong class="d-none d-sm-block ms-1" style="color: white; display: flex; justify-content:center">tes@gmail.com</strong>
                </div>
            </li>
        </ul>
        <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
    </nav>
    <div class="container">
        <div class="button-group">
            <div class="button-item">
                <a class="btn btn-dark" href="graph.php" role="button">Generate Graph</a>
                <!-- <button type="button" class="btn btn-dark">Generate Graph</button> -->
            </div>
            <div class="button-item">
                <a class="btn btn-dark" href="generateTablePDF.php" role="button">Generate PDF</a>
                <!-- <button type="button" class="btn btn-dark">Generate PDF</button> -->
            </div>
            <div class="button-item">
                <a class="btn btn-danger" href="logout.php" role="button">Log Out</a>
                <!-- <button type="button" class="btn btn-danger" href="login.php">Log Out</button> -->
            </div>
        </div>
        <div class="container border">
            <div class="logo">
                <img src="images/dummy-logo.png" alt="Logo">
            </div>
            <div class="title">
                <h1>2020 Sales Report</h1>
            </div>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th>Order ID</th>
                    <th>Month</th>
                    <th>Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach( $data as $row ) : ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?= $row["month"]; ?></td>
                        <td><?= $row["sales"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
   
</body>
</html>