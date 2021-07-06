<!--댓글수정화면-->

<?php
  include "lib.php";

  $boardnum = $_POST['boardnum'];
  $replynum = $_POST['replynum'];
  $replycontents = $_POST['replycontents'];

  $boardnum = mysqli_real_escape_string($connect, $boardnum);
  $replynum = mysqli_real_escape_string($connect, $replynum);
  $replycontents = mysqli_real_escape_string($connect, $replycontents);


  $query = "select * from reply1 where boardnum='$boardnum' ";
  $result = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($result);
 ?>

 <!DOCTYPE html>
 <html>
   <head lang="en">
     <meta charset="utf-8">
     <meat name="viewpoint" content="width=device-width, initial-scale=1.0">
     <title>Hi 게시판 </title>
   </head>

   <body>
      <form action="reply_update.php" method="post">
        <input type="hidden" name="boardnum" value="<?php echo $boardnum?>">
        <input type="hidden" name="replynum" value="<?php echo $replynum?>">
         <tr>
            <th><?php $_SESSION['username']?><input type="hidden" name="u_name" value="<?=$_SESSION['username']?>"></th>
         </tr>
         <tr>
            <td><textarea name="replycontents" style="width:100%; height:100px; border:1px solid; resize:none;"><?=nl2br($replycontents)?></textarea></td>
         </tr>
         <tr>
           <div style="text-align:center;">
             <input type="submit" value="수정하기">
           </div>
         </tr>
       </table>
    </form>
    <script>hisotry.back(1);</script>
  </body>
</html>
