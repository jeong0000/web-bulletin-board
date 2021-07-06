<!--검색-->

<?php
  include "lib.php";
  include "style.php";
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
</head>
<body>
<?php
  // 검색 변수
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];

  $catagory = mysqli_real_escape_string($connect, $catagory);
  $catagory = mysqli_real_escape_string($connect, $catagory);
?>
  <h1 style="text-align:center; margin-top:50px;">검색결과</h1>
  <div style="float:right; margin-right:15%; ">
  <?php
  if( (!isset($_SESSION['id'])) &&  (!isset($_SESSION['username'])) ){ ?>
    <input type="button" value="로그인" onclick="location.href='login.php'">
    <input type="button" value="회원가입" onclick="location.href='register.php'"><?php
  }else{?>
    <input type="button" value="회원정보 수정" onclick="location.href='update_account.php'">
    <input type="button" value="로그아웃" onclick="location.href='logout.php'"><?php
  }; ?>
  </div>
  <input type="button" value="홈으로" onclick="location.href='list.php'" style="margin-left:15%;">
  <br>
  <div style="width:60%; height:60px; margin-top:30px; text-align: right;">
    <form action="search.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="u_name">작성자</option>
        <option value="memo">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
  </div>
  <table style="width:60%; height:100px; margin:auto; text-align:center;">
    <tr>
      <th width=50 > 번호</th>
      <th> 제목   </th>
      <th width=100> 작성자</th>
      <th width=90 > 작성일 </th>
    </tr>

    <?php
      $query = "select * from sing_board where $catagory like '%$search_con%' order by idx desc";
      $result = mysqli_query($connect, $query);
      while($data = mysqli_fetch_array($result)){?>
        <tr>
          <td><?php echo $data['idx'];?></td>
      <?php if(strlen($data['title'])>30){
              //title이 30을 넘어서면 ...표시
              $data['title']=str_replace($data["title"],mb_substr($data["title"],0,30,"utf-8")."...",$data["title"]);
            }?>
          <td> <a href="view.php?idx=<?php echo $data[idx]?>" style="text-decoration: none; color:black;"><?php echo $data['title']?></a></td>
          <td> <?php echo $data['u_name']?> </td>
          <td> <?php echo substr($data['created'],0,10)?> </td><?php
      }?>
    </tr>
  </table>
</body>
</html>
