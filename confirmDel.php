<!--게시글 삭제 확인 화면-->

<?php
    include "lib.php";
    include "style.php";
    if(!$_SESSION['idx_m']){?>
        <script>
            alert("회원만 접근 가능합니다.");
            location.href="login.php";
        </script>
        <?php
    }

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);
?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <meat name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title> 게시글 삭제</title>
  </head>
  <body>
    <form action="del.php" method="post">
        <input type="hidden" name="idx" value="<?php echo $idx?>">
        <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto;" >
        <tr>
              <th colspan=2> <?php echo $idx?>번 게시물을 정말 삭제하시겠습니까? </th>
        </tr>
        <tr>
              <th> 비밀번호 </th>
              <td> <input type="password" name="pwd" placeholder="비밀번호"  size=20 > </td>
        </tr>
        <tr>
              <td colspan="2">
        <tr>
              <td colspan="2">
                <div style="text-align:center; ">
                      <input type="submit" value="확인">
                      <input type="button" value="목록" onclick="location.href='list.php'" >
                </div>
              </td>
        </tr>
        </table>
      </form>
  </body>
</html>
