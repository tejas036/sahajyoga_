<?php
session_start();
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
}

include_once 'header.php';

?>
<style>
a.more {
  color: white;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<div class="container-fluid">
	


<div class="card-body">
		<div class="card card-default">
			<div class="card-header">
				Database Settings  
            </div>
			<form name="frmSearch" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="export.php" class="btn btn-secondary" role="button">EXPORT DATABASE</a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <a href="#" class="btn btn-secondary" role="button">IMPORT DATABASE</a>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <a href="#" class="btn btn-secondary" role="button">CLEAR DATABASE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="padding:0px; ">
                 <!-- <input type="submit" class="btn btn-primary float-right" style="margin-right : 70px;" name="submit" id="submit" value="Submit" >  -->
                </div>
			</form>
		</div>
	  </div>







</div>
<?php
include_once 'footer.php';
?>
