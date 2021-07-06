<!--댓글 등록-->

<?php
  include "lib.php";

  //text/html형식에 대해 utf-8설정
  header("Content-Type: text/html; charset=UTF-8");
  //게시물 번호
  $boardnum = $_POST["boardnum"];
  $username = $_POST["username"];

  $boardnum = mysqli_real_escape_string($connect, $boardnum);
  $username = mysqli_real_escape_string($connect, $username);
  //댓글 내용
  $replycontents = $_POST["replycontents"];
  $dated = date("Y-m-d H:i:s");

  $replycontents = mysqli_real_escape_string($connect, $replycontents);
  $replycontents = htmlspecialchars($replycontents);

  $sql = " SELECT MAX(replynum) AS replynum FROM reply1 where boardnum = '$boardnum' ";
  $res = mysqli_query($connect,$sql);

  $row=mysqli_fetch_array($res);
  //이미 저장되어 있는 댓글들중 최신 댓글의 번호 값 + 1
  $replynum=($row['replynum']+1);

  $query = "INSERT into reply1(boardnum,replynum,replycontents,username,dated) values('$boardnum','$replynum','$replycontents','$username', '$dated') ";
  mysqli_query($connect, $query);
?>

<script>
  alert("댓글이 등록되었습니다.");
  location.href="view.php?idx=<?php echo $boardnum?>";
</script>
