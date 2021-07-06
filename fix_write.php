<!--게시글 수정 화면-->

<?php
    include "lib.php";
    include "style.php";
    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from sing_board where idx='$idx' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);?>

<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
    <title> 게시글 수정</title>
  </head>
  <body>
    <h1 style="text-align:center; margin-top:50px;"><?php echo $idx?>번 게시글 수정</h1>
    <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto;">
    <form action="fix_writePost.php" method="post">
      <input type="hidden" name="idx" value="<?php echo $idx?>">
      <input type="hidden" name="created" value="<?php echo $data['created']?>">
      <tr>
          <th> 제목 </th>
          <td><input type="text" name="title" style="width:100%;" value="<?php echo $data[title]?>"></td>
      </tr>
      <tr>
          <th> 작성자 </th>
          <td><?php echo $_SESSION['username']?><input type="hidden" name="u_name" value="<?php echo $_SESSION['username']?>"></td>
      </tr>
      <tr>
          <th> 내용 </th>
          <td><textarea name="memo" style="width:100%; height:300px;"> <?php echo nl2br($data[memo])?></textarea></td>
      </tr>
      <tr>
          <th>파일 목록</th>
          <td><a href="download2.php?file_id=<?php echo $data['file_id']?>" target="_blank"><?php echo $data['name_orig']?></a></td>
      </tr>
      <tr>
          <th> 비밀번호 </th>
          <td><input type="password" name="pwd" placehoder="비밀번호" size=20></td>
      </tr>
      <tr>
          <td colspan="2">
          <div style="text-align:center;">
            <input type="submit" value="저장">
            <input type="button" value="목록" onclick="location.href='list.php'" >
          </div>
          </td>
      </tr>
  </table>
  </form>
 </body>
</html>
