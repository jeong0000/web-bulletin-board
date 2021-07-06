<!--게시글 수정 과정-->

<?php
    include "lib.php";

    $idx=$_POST['idx'];
    $name = $_POST['u_name'];
    $title = $_POST['title'];
    $memo = $_POST['memo'];
    $pwd = $_POST['pwd'];
    $created = $_POST['created'];

    //sql injection방어
    $name = mysqli_real_escape_string($connect, $name);
    $title = mysqli_real_escape_string($connect, $title);
    $memo = mysqli_real_escape_string($connect, $memo);
    $pwd = mysqli_real_escape_string($connect, $pwd);
    $idx = mysqli_real_escape_string($connect, $idx);
    $created = mysqli_real_escape_string($connect, $created);

    $query = "select * from sing_board where idx='$idx' and pwd='$pwd'";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if(!$data[idx]){ ?>
      <script>
          alert('잘못된 비밀번호입니다.');
          history.back(1);
      </script>  <?php
       exit;
    }

    $query = "UPDATE sing_board set title='$title', u_name='$name', memo='$memo' where idx='$idx' ";
    mysqli_query($connect, $query);  ?>

    <script>
          location.href='list.php';
    </script>
