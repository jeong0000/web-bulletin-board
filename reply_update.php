<!--댓글 수정 과정-->

<?php
  include "lib.php";

  $boardnum = $_POST['boardnum'];
  $replynum = $_POST['replynum'];
  $replycontents = $_POST['replycontents'];

  $boardnum = mysqli_real_escape_string($connect, $boardnum);
  $replynum = mysqli_real_escape_string($connect, $replynum);
  $replycontents = mysqli_real_escape_string($connect, $replycontents);

  $replycontents = htmlspecialchars($replycontents);

  $query = "UPDATE reply1 set replycontents='$replycontents' where boardnum='$boardnum' and replynum='$replynum' ";
  mysqli_query($connect, $query);

?>
  <script>
    alert('수정되었습니다.');
    location.href="view.php?idx=<?=$boardnum?>";
  </script>
