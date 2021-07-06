<!--쓴 글 저장 과정-->

<script>
    location.href='list.php';
</script>
<?php
    include "lib.php";

    $name = $_POST['u_name'];
    $idx = $_POST['idx'];
    $title = $_POST['title'];
    $memo = $_POST['memo'];
    $pwd = $_POST['pwd'];

    //sql injection방어
    $idx = mysqli_real_escape_string($connect, $idx);
    $name = mysqli_real_escape_string($connect, $name);
    $title = mysqli_real_escape_string($connect, $title);
    $memo = mysqli_real_escape_string($connect, $memo);
    $pwd = mysqli_real_escape_string($connect, $pwd);
   $memo = htmlspecialchars($memo);

    // file
    $created = date("Y-m-d H:i:s");
    if(isset($_FILES['upfile']) && $_FILES['upfile']['name'] != "") {
        $file = $_FILES['upfile'];
        $upload_directory = './upload/';
        $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
        $allowed_extensions = explode(',', $ext_str);
        $max_file_size = 5242880;
        $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
        // 확장자 체크
        if(!in_array($ext, $allowed_extensions)) {
            echo "업로드할 수 없는 확장자 입니다.";
        }
        // 파일 크기 체크
        if($file['size'] >= $max_file_size) {
            echo "5MB 까지만 업로드 가능합니다.";
        }

        $path = md5(microtime()) . '.' . $ext;
        $file_id = md5(uniqid(rand(), true));
        $name_orig = $file['name'];
        $name_save = $path;
        if(move_uploaded_file($file['tmp_name'], $upload_directory.$path)) {
            $query = "INSERT INTO sing_board(title,u_name, memo, created, pwd,file_id, name_orig, name_save) VALUES('$title','$name','$memo','$created', '$pwd','$file_id','$name_orig',,'$name_save')";
            mysqli_query($connect, $query);
            ?><script>alert("파일 업로드 성공");<?php
        }
    } else {
      $query1 = "INSERT into sing_board(title,u_name, memo, created, pwd) values('$title','$name','$memo','$created', '$pwd') ";
      mysqli_query($connect, $query1);
    }
?>
<script>
 location.href='list.php';
</script>
