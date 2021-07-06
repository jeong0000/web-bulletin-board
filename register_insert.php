<!--회원가입 과정-->

<?php
  include "lib.php";

  $id = $_POST[ 'id' ];
  $password = $_POST[ 'password' ];
  $password_confirm = $_POST[ 'password_confirm' ];
  $username = $_POST[ 'username' ];
  $phone = $_POST[ 'phone' ];
  $email = $_POST[ 'email' ];

  $id = mysqli_real_escape_string($connect, $id);
  $password = mysqli_real_escape_string($connect, $password);
  $password_confirm = mysqli_real_escape_string($connect, $password_confirm);
  $username = mysqli_real_escape_string($connect, $username);
  $phone = mysqli_real_escape_string($connect, $phone);
  $email = mysqli_real_escape_string($connect, $email);

  $pw = $password;
  $num = preg_match('/[0-9]/u', $pw);
  $eng = preg_match('/[a-z]/u', $pw);
  $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

  if(strlen($pw) < 6)
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

  else if ( !is_null( $id) ) {
    $query = "SELECT id FROM member WHERE id = '$id'";
    $result = mysqli_query( $connect, $query );
    while ($data = mysqli_fetch_array( $result )) {
      $id_e = $data[ 'id' ];
    }
    if ( $id == $id_e ) {
      $wi = 1;
    }
    elseif ( $password != $password_confirm ) {
      $wp = 1;
    } else {
      $add_user = "INSERT INTO member ( id, password, username, phone, email ) VALUES ( '$id', '$password','$username','$phone','$email' );";
      mysqli_query( $connect, $add_user );?>
      <script>
        alert('회원 가입이 완료되었습니다');
        location.href="list.php";
      </script>
      <?php
    }
  }
    if ( $wi== 1 ) {?>
    <script> alert ("이미 사용중인 아이디입니다");history.back(1); </script><?php
  }
  if ( $wp == 1 ) {?>
    <script> alert ("비밀번호가 일치하지 않습니다.");history.back(1); </script><?php
  }
?>
