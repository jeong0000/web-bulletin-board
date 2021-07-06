<!--글쓰기 화면-->

<?php
    include "lib.php";
    include "style.php";

    if(!$_SESSION['idx_m']){
        ?>
        <script>
            alert("회원만 접근 가능합니다.");
            location.href="login.php";
        </script> <?php
    }

    $idx = $_GET['idx'];
    $idx = mysqli_real_escape_string($connect, $idx);

    $query = "select * from sing_board where idx='$idx' ";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);
?>
  <table width=800 border="1" cellpadding=5 style="width:60%; height:100px; margin:auto;" >
    <script type="text/javascript">
// 파일 업로드
  function formSubmit(f) {
    // 업로드 할 수 있는 파일 확장자를 제한
    var extArray = new Array('hwp','xls','doc','xlsx','docx','pdf','jpg','gif','png','txt','ppt','pptx');
    var path = document.getElementById("upfile").value;

    if(path != "") {
      var pos = path.indexOf(".");
      if(pos < 0) {
        alert("확장자가 없는파일 입니다.");
        return false;
      }
      var ext = path.slice(path.indexOf(".") + 1).toLowerCase();
      var checkExt = false;
      for(var i = 0; i < extArray.length; i++) {
        if(ext == extArray[i]) {
          checkExt = true;
          break;
        }
      }
      if(checkExt == false) {
        alert("업로드 할 수 없는 파일 확장자 입니다.");
        return false;
      }
      return true;
    }
  }
</script>
  <form action="writePost.php" method="post" enctype="multipart/form-data" onsubmit="return formSubmit(this);">
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
          <th>첨부파일</th>
          <td><input type="file" name="upfile" id="upfile" ></td>
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
