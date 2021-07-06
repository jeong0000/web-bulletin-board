<!--파일 다운로드-->

<?php
  $file_id = $_REQUEST['file_id'];
  include "lib.php";

  $query = "SELECT file_id, name_orig, name_save FROM sing_board WHERE file_id = '$file_id'";
  $stmt = mysqli_prepare($connect, $query);

  $bind = mysqli_stmt_bind_param($stmt, "s", $file_id);
  $exec = mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($result);

  $name_orig = $row['name_orig'];
  $name_save = $row['name_save'];

  $fileDir = "./upload/";
  $fullPath = $fileDir."/".$name_save;
  $length = filesize($fullPath);

  header("Content-Type: application/octet-stream");
  header("Content-Length: $length");
  header("Content-Disposition: attachment; filename=".iconv('utf-8','euc-kr',$name_orig));
  header("Content-Transfer-Encoding: binary");

  $fh = fopen($fullPath, "r");
  fpassthru($fh);

  mysqli_free_result($result);
  mysqli_stmt_close($stmt);
  mysqli_close($connect);

  exit;
?>
