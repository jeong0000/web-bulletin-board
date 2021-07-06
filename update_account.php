<!--회원정보 수정 화면-->

<?php
    include "lib.php";
    include "style.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
</head>
<body>
  <h1 style="text-align:center; margin-top:50px;">회원정보 수정</h1>
    <form action="member_process.php" method="POST">
      <input type="hidden" name="idx_m" value="<?php echo $_SESSION['idx_m']?>">
      <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto;">
        <tr>
          <th>아이디</th>
          <td><input type="hidden" name="id"><?php echo $_SESSION['id']?></td>
        </tr>
        <tr>
          <th>비밀번호</th>
          <td><input type="password" name="password"></td>
        </tr>
        <tr>
          <th>비밀번호 확인</th>
          <td><input type="password" name="password_confirm"></td>
        </tr>
        <tr>
          <th>사용자이름</th>
          <td><input type="text" name="username" value="<?php echo $_SESSION['username']?>"></td>
        </tr>
        <tr>
          <th>전화번호</th>
          <td><input type="text" name="phone" placeholder="010-XXXX-XXXX" value="<?php echo $_SESSION['phone']?>"></td>
        </tr>
        <tr>
          <th>e-mail주소</th>
          <td><input type="text" name="email" placeholder="--@--.com" value="<?php echo $_SESSION['email']?>"></td>
        </tr>
        <tr>
          <td colspan="2">
            <div style="text-align:center;">
              <input type="submit" value="수정하기">
              <input type="button" value="목록" onclick="location.href='list.php'" >
            </div>
          </td>
        </tr>
      </table>
    </form>
</body>
</html>
