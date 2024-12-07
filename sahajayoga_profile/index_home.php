<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahaja Yoga Home Page</title>

    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/dynamicAction.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <header>
        <div align="center">
            <img align="left" src="assets/logo3.png" height="70" width="70" />
            <a href="admin/admin.php">Go To Admin</a>
        </div>
    </header>

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

        .form-group {
            display: flex;
            justify-content: center;
            padding: 5px;
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
        margin-bottom: 20px; /* Adjust the spacing between title and buttons */
        text-align: center;
    }

    .form-row {
        margin-top: auto; /* Pushes the buttons to the bottom */
    }

    .form-group {
        text-align: center;
    }

    .btn-custom {
        width: 80%; /* Optional: Adjust button width as needed */
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center my-5">Latest Events</h1>
        <div class="row justify-content-center">
            <!-- Event Card 1 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default ">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">The Life Eternal Trust</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=The%20Life%20Eternal%20Trust&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Empty Column for Alignment -->
                                <a href="login.php?event=The%20Life%20Eternal%20Trust&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=The%20Life%20Eternal%20Trust&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">International Sahaja Yoga Research and Health Centre</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Empty Column for Alignment -->
                                <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=International%20Sahaja%20Yoga%20Research%20and%20Health%20Centre&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Nirmala Nagari Ganapatipule</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Empty Column for Alignment -->
                                <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Nirmala%20Nagari%20Ganapatipule&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 4 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Nirmala Dham Ashram, Aradgaon (Rahuri)</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Empty Column for Alignment -->
                                <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Nirmala%20Dham%20Ashram,%20Aradgaon%20(Rahuri)&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 5 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Pune Ashram, Kothrud</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <!-- Empty Column for Alignment -->
                                <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Pune%20Ashram,%20Kothrud&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Event Card 6 -->
            <div class="col-md-4" style="padding: 10px;">
                <div class="card card-default">
                    <div class="card-header">
                        <img src="img/unnamed.jpg" class="img-rounded" width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h6 align="center">Shri P K Salve Kale Pratishthan, Vaitarna</h6>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=Corups" class="btn btn-custom btn-sm float-right">Corups</a>
                            </div>
                            <div class="form-group col-md-4">
                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=Center" class="btn btn-custom btn-sm float-right">Center</a>
                            </div>

                            <div class="form-group col-md-4">
                                <a href="login.php?event=Shri%20P%20K%20Salve%20Kale%20Pratishthan,%20Vaitarna&type=General" class="btn btn-custom btn-sm float-right">General</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




</body>

</html>