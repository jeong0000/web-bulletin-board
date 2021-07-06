<!--로그아웃 화면-->

<?php
    include "lib.php";

    $session = session_destroy();

    if($session){
?>
    <script>
      alert("로그아웃되었습니다.");
      location.href="list.php";
    </script><?php 
    } ?>
