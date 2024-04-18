<?php

require_once ('koneksi.php');
require_once ('sql.php');

$obj = new crud;
if(isset($_GET['nis']) && !$obj->detailData($_GET['nis'])) {
    die("Error: NIS not found");
}
if($_SERVER['REQUEST_METHOD']=='POST'):

    if($obj->deleteData($obj->nis)):
        echo '<div class="alert alert-success">Data successfully deleted</div>';
    else:
        echo '<div class="alert alert-danger">Failed to save data</div>';
    endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <title>PHP Tutorial: CRUD with OOP PHP</title>

    <link href="./fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="container">
        <div class="card shadow mb-4 mt-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">PHP Tutorial: CRUD with OOP PHP</h6>
                </div>
            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <div class="card-body">
                    <button type="submit" class="mt-4 btn btn-md btn-primary">Delete</button>
                    <a href="index.php" class="mt-4 btn btn-md btn-primary"><span style="color:white">back</span></a>        
                </div>
            </form>
    
        </div>
    </div>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
