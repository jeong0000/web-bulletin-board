<!-- 회원정보 업데이트 -->

<?php
    include "lib.php";

    $idx_m = $_POST['idx_m'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //sql injection 방어
    $id = mysqli_real_escape_string($connect, $id);
    $password = mysqli_real_escape_string($connect, $password);
    $password_confirm = mysqli_real_escape_string($connect, $password_confirm);
    $username = mysqli_real_escape_string($connect, $username);
    $phone = mysqli_real_escape_string($connect, $phone);
    $email = mysqli_real_escape_string($connect, $email);

    // 수정
    $pw = $password;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);
    if(!$password || !$password_confirm){
        ?><script> alert ("비밀번호를 입력해주세요."); history.back(1); </script><?php
    }
    else if(strlen($pw) < 6)
    {?>
        <script> alert ("비밀번호는 영문, 숫자, 특수문자를 혼합하여 6자 이상으로 입력하세요.");history.back(1); </script><?php
    }
    else if(preg_match("/\s/u", $pw) == true)
    {?>
        <script> alert ("비밀번호는 공백없이 입력하세요.");history.back(1); </script><?php
    }
    else if( $num == 0 || $eng == 0 || $spe == 0)
    {?>
          <script> alert ("영문, 숫자, 특수문자를 혼합하여 입력하세요.");history.back(1); </script><?php
    }
    else if($password != $password_confirm){
      ?><script> alert ("비밀번호가 일치하지 않습니다."); history.back(1); </script><?php
    } else if (!$username) {
      ?><script> alert ("사용자이름을 입력해주세요."); history.back(1); </script><?php
    } else if (!$phone) {
      ?><script> alert ("전화번호를 입력해주세요."); history.back(1); </script><?php
    } else if (!$email) {
      ?><script> alert ("이메일 주소를 입력해주세요."); history.back(1); </script><?php
    }else{
      $query = "UPDATE member set password='$password', username='$username', phone='$phone', email='$email' where idx_m='$idx_m' ";
      mysqli_query($connect, $query);

      $query = "SELECT * from member where idx_m='$idx_m'";
      $result = mysqli_query($connect, $query);
      $data = mysqli_fetch_array($result);

      $_SESSION['id']=$data['id'];
      $_SESSION['username']=$data['username'];
      $_SESSION['phone']=$data['phone'];
      $_SESSION['email']=$data['email'];
      ?>
      <script>
      alert("회원정보가 업데이트되었습니다.");
      location.href='list.php';
      </script>  <?php
    }; ?>
