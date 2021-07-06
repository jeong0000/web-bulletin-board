<!--로그인 첫화면-->

<!DOCTYPE>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
  </head>
  <body>
    <h1 style="text-align:center; margin-top:50px;"> 로그인 </h1>
    <div style="text-align:center; margin-top:30px;">
      <form action="loginProc.php" method="post">
        <div style="margin-bottom:10px;"> <input type="text" name="id" placeholder="아이디"><br></div>
        <div style="margin-bottom:10px;"> <input type="password" name="password" placeholder="비밀번호"><br></div>
        <div style="position:relative;"> <button type="submit">로그인</button></div>
      </form>
    </div>
  </body>
</html>
