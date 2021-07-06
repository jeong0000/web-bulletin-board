<!--게시글 화면-->

<?php
    include "lib.php";
    include "style.php";

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from sing_board where idx='$idx' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
  <head lang="en">
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0">

    <title>Hi 게시판 </title>
  </head>
  <body>
    <h1 style="text-align:center; margin-top:50px;"><?php echo $idx?>번 게시글</h1>
        <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto; text-align:center;">

        <tr>
            <th> 제목 </th>
            <td> <?php echo $data[title]?>  </td>
        </tr>
        <tr>
            <th> 작성자 </th>
            <td> <?php echo $data['u_name']?>  </td>
        </tr>
        <tr>
            <th> 내용 </th>
            <td style="width:70%; height:300px;"> <?php echo nl2br($data[memo])?></td>
        </tr>
        <tr>
            <th>파일 목록</th>
            <td><a href="download2.php?file_id=<?php echo $data['file_id']?>" target="_blank"><?php echo $data['name_orig']?></a></td>
        </tr>
        <td colspan="2">
  <?php    if($_SESSION['username'] == $data['u_name']){?>
              <div style="float:right; ">
                <a href="confirmDel.php?idx=<?php echo $idx?>" style="text-decoration: none; color: black">삭제</a><a></a>
                <a href="fix_write.php?idx=<?php echo $idx?>" style="text-decoration: none; color: black">수정</a>
              </div>
     <?php } ?>
          <input type="button" value="목록" onclick="location.href='list.php'" style="float:left;">
        </td>
        </tr>
      </table>
      </form>

         <!-- 댓글 불러오기-->
         <!-- 세션에 닉네임 값이 존재한다면 -->
<?php
    if(isset($_SESSION['username'])) { ?>
      <form action="reply.php" method="post">
        <style="margin-top:20px;">
        <h4>댓글 작성</h4>
        <input type="hidden" name="boardnum" value="<?php echo $data['idx']; ?>">
        <textarea type="text" name="replycontents" style="width:100%; height:100px; border:1px solid; resize:none;"></textarea>
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">
        <input type="submit" style='float:right; border:1px solid; background:none;' value="댓글 등록">
      </form>
<?php }?>
      <h4>댓글 목록</h4> <?php
      $query = "SELECT * from reply1 where boardnum='$idx' ORDER BY replynum DESC";
      $result = mysqli_query($connect, $query);
      while($data_r = mysqli_fetch_array($result)){
          echo "<br>".$data_r['username']."<br>";
          echo $data_r['replycontents']."<br>";
          echo $data_r['dated']."<br>";
          if($_SESSION['username'] == $data_r['username']){?>
               <form action="replyupdateView.php" method="post">
               <input type="hidden" name="replynum" value="<?php echo $data_r['replynum']; ?>" />
               <input type="hidden" name="boardnum" value="<?php echo $idx; ?>">
               <input type="hidden" name="replycontents" value="<?php echo $data_r['replycontents']; ?>">
               <input type="submit" value="수정">
      </form>
       <form action="reply_del.php" method="post">
              <input type="hidden" name="replynum" value="<?php echo $data_r['replynum']; ?>" />
              <input type="hidden" name="boardnum" value="<?php echo $idx; ?>">
              <input type="submit" value="삭제">
      </form>
    <?php }
      echo "<br>";
      } ?>
  </body>
</html>
