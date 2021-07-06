<!--게시글 삭제 과정-->

<?php
    include "lib.php";

    $idx = $_POST['idx'];
    $pwd = $_POST['pwd'];

    $idx = mysqli_real_escape_string($connect, $idx);
    $pwd = mysqli_real_escape_string($connect, $pwd);

    $query = "select * from sing_board where idx='$idx' and pwd='$pwd' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if(!$data[idx]){?>
        <script>
        alert('잘못된 비밀번호입니다.');
        history.back(1);
        </script>
  <?php      exit;
    }

    $query = "delete from sing_board where idx='$idx' ";
    mysqli_query($connect, $query);

?>
<script>
    location.href='list.php';
</script>
