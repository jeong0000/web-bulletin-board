<!--로그인 과정-->

<?php
  include "lib.php";

  $id = $_POST['id'];
  $password = $_POST['password'];

  $id = mysqli_real_escape_string($connect, $id);
  $password = mysqli_real_escape_string($connect, $password);

  $query = "SELECT * from member where id='$id' and password='$password'";
  $result = mysqli_query($connect,$query);
  $data = mysqli_fetch_array($result);

  if($data){
    $_SESSION['idx_m'] = $data['idx_m'];
    $_SESSION['id']=$data['id'];
    $_SESSION['username']=$data['username'];
    $_SESSION['phone']=$data['phone'];
    $_SESSION['email']=$data['email'];
?>
    <script>
    location.href="list.php";
    </script><?php
  }else{?>
    <script>
    alert( "아이디 또는 비밀번호가 틀렸습니다.");
    location.href="login.php";
    </script><?php
  } ?>
