<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahaja Yoga Home Page</title>

    <!-- <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <header>
        <div align="center">
            <img align="left" src="assets/logo3.png" height="70" width="70" />
            <a href="admin/admin.php">Go To Admin</a> 
            <a href="print.php" target="_blank">Donor Login</a>
        </div> 
    </header> --> 
    <?php include_once 'header1.php'?>
    

    <style>
        .btn-custom {
            background-color: #008471;
            color: white;
            border: none;
            text-align: center;
            padding: 5px 10px;
            margin: 5px;
            width: 100%;

        }

        .btn-custom:hover {
            background-color: #006f5c;
        }

       
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-body h6 {
            margin-bottom: 20px;
            /* Adjust the spacing between title and buttons */
            text-align: center;
        }

       

       

        .card-header img {
            object-fit: cover;
            height: 200px;
            /* Fixed height for uniformity */
            width: 100%;
        }

        .card-body .btn {
            width: 100%;
            /* Ensures buttons are aligned equally */
        }
    </style>
</head>

<body>

    <div class="container ">
        <h1 class="text-center my-3">Latest Events</h1>
        <div class="row justify-content-center">
            <!-- Event Card 1 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100 ">
                    <div class="card-header  p-0">
                        <img src="assets/image-1.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">The Life Eternal Trust</h6>
                        <div class="d-flex justify-content-between">
                            <a href="login.php?event=The%20Life%20Eternal%20Trust&type=Corups" class="btn btn-custom btn-sm">Corups</a>
                            <a href="login.php?event=The%20Life%20Eternal%20Trust&type=Center" class="btn btn-custom btn-sm">Center</a>
                            <a href="login.php?event=The%20Life%20Eternal%20Trust&type=General" class="btn btn-custom btn-sm">General</a>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100">
                    <div class="card-header p-0">
                        <img src="assets/image-2.avif" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">International Sahaja Yoga Research and Health Centre</h6>
                        <div class="d-flex justify-content-between">
                            <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=Corups" class="btn btn-custom btn-sm">Corups</a>
                            <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=Center" class="btn btn-custom btn-sm">Center</a>
                            <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=General" class="btn btn-custom btn-sm">General</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100">
                    <div class="card-header p-0 ">
                        <img src="assets/image-3.avif" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Nirmala Nagari Ganapatipule</h6>
                        <div class="d-flex justify-content-between">

                            <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>


                            <!-- Empty Column for Alignment -->
                            <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=Center" class="btn btn-custom btn-sm float-right">Center</a>


                            <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=General" class="btn btn-custom btn-sm float-right">General</a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 4 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100">
                    <div class="card-header p-0">
                        <img src="assets/image-4.avif" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Nirmala Dham Ashram, Aradgaon (Rahuri)</h6>
                        <div class="d-flex justify-content-between">
                            <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=General" class="btn btn-custom btn-sm float-right">General</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 5 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100">
                    <div class="card-header p-0">
                        <img src="assets/image-5.jpeg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Pune Ashram, Kothrud</h6>
                        <div class="d-flex justify-content-between">
                            <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            <!-- Empty Column for Alignment -->
                            <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=General" class="btn btn-custom btn-sm float-right">General</a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 6 -->
            <div class="col-md-4 mb-4" style="padding: 10px;">
                <div class="card card-default h-100">
                    <div class="card-header p-0">
                        <img src="assets/image-6.jpeg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Shri P K Salve Kale Pratishthan, Vaitarna</h6>
                        <div class="d-flex justify-content-between">
                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=Center" class="btn btn-custom btn-sm float-right">Center</a>

                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=General" class="btn btn-custom btn-sm float-right">General</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




</body>

</html>