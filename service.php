<?php
    $servID = $_GET['id'];
    $HeaderLogo = 'yes';

    $servTitle = '';

    require './functions/db.php';
    $stmt = mysqli_stmt_init($db);
    $queri = "SELECT * FROM `services` WHERE `id`=?";
    mysqli_stmt_prepare($stmt,$queri);
    mysqli_stmt_bind_param($stmt,'s',$servID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $servTitle = $row['title'];
        }
    }
    if($servTitle!=null){
        $page = $servTitle;
    }else{$page = "Service";}

    include_once './parts/header.php';

    if($db):
?>
<h1><?php if($servTitle!=null){echo $servTitle;}else{echo 'This service doesn\'t exist!';}?></h1>
<?php
    mysqli_close($db);
    else:
        echo '<p role="alert">Coud not connect to the database</p>';
    endif;
    include_once './parts/footer.php';
?>
