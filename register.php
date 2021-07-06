<!--회원가입 화면-->

<?php include "style.php"; ?>

<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>회원 가입</title>
    <style>
      body { font-family: sans-serif; font-size: 14px; }
      input, button { font-family: inherit; font-size: inherit; }
    </style>
  </head>

  <body>
    <h1 style="text-align:center; margin-top:50px;">회원 가입</h1>
    <form action="register_insert.php" method="POST">
      <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto;">
        <tr>
          <th>아이디</th>
          <td><input type="text" name="id"></td>
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
          <td><input type="text" name="username"></td>
        </tr>
        <tr>
          <th>전화번호</th>
          <td><input type="text" name="phone" placeholder="010-XXXX-XXXX"></td>
        </tr>
        <tr>
          <th>e-mail주소</th>
          <td><input type="text" name="email" placeholder="--@--.com"></td>
        </tr>
        <tr>
          <td colspan="2">
            <div style="text-align:center;">
              <input type="submit" value="가입하기">
            </div>
          </td>
        </tr>
      </table>

    </form>
  </body>
</html>
