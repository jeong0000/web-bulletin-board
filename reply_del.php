<!--댓글 삭제-->

<?php
    include "lib.php";

    $boardnum = $_POST['boardnum'];
    $replynum = $_POST['replynum'];

    $boardnum = mysqli_real_escape_string($connect, $boardnum);
    $replynum = mysqli_real_escape_string($connect, $replynum);

    $query = "DELETE from reply1 where boardnum='$boardnum' and replynum='$replynum'";
    mysqli_query($connect, $query);

?>
<script>
  alert("댓글이 삭제되었습니다.");
  history.back(1);
</script>
