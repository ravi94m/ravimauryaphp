<?php 
 $connection=mysqli_connect('localhost','root','','facebook');
  if($connection){
      //echo "We are  connected";
  }
  else{
      die("Database connection failed");
  }
  $query="SELECT name FROM tUser WHERE User_id=1";
  $result=mysqli_query($connection,$query);
  if(!$result){
      die("Query Failed" . mysqli_error($connection));
  }
  while($i = mysqli_fetch_array($result)) {
    $j = $i[0];
 }
$query_friendlist= "SELECT friend_name from tFriends where User_id=1";
$query_friendlist_result=mysqli_query($connection,$query_friendlist);
//post
if(isset($_POST["submit"])){
  $post=  $_POST["post"];
echo $post;
  $post_id_array = array(21, 6, 7,8,9,10,11,12);
  $post_query="INSERT INTO `tWall` (`User_id`, `posting_date`, `post`, `post_id`) VALUES ('1', current_timestamp(), '$post', '$post_id_array[0]')";
  $post_result=mysqli_query($connection,$post_query);
  if(!$post_result){
    die("Query Failed".mysqli_error($connection));
  }
}

//fetch post
$fetch_post="SELECT * FROM tWall ORDER BY posting_date ASC";
$fetch_post_result=mysqli_query($connection,$fetch_post);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
    body{
      background-color: rgb(218, 221, 225);
}
    }
       .container-fluid {
          width: 100%;
         

      }
       .list{
        list-style:none;
      }
      .navbar-nav { 
            margin-left: auto; 
        } 
    </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm bg-light"> 
  <div><a href="update.php">Welcome <?php echo $j ?></a></div>
  
  <ul class="navbar-nav"> 
  <li class="nav-item"> 
  <i class="fa fa-comment-o" style="font-size:24px;color:blue"></i>
      </li> &nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item"> 
  <i class="fa fa-bell-o" style="font-size:24px;color:blue"></i>
      </li> &nbsp;&nbsp;&nbsp;&nbsp;
  <li class="nav-item"> 
  <input type="text" placeholder="Search.." >
      </li> 
      <li class="nav-item"> 
          <a class="nav-link" href="#"> 
            About 
          </a> 
      </li> 
      <li class="nav-item"> 
          <a class="nav-link" href="#"> 
            Contacts 
          </a> 
      </li> 
      <li class="nav-item"> 
          <a class="nav-link" href="#"> 
            Settings 
          </a> 
      </li> 
      <li class="nav-item"> 
          <a class="nav-link" href="#"> 
            Logout 
          </a> 
      </li> 
  </ul>
   
</nav> 
<div class="container-fluid">
      <div class="row" style="height: 16em;background-color: power-white;">
        <div class="col-sm-4" style="text-align: center;align-items: center;">
          <h2 style="margin-left:-200px;">  Friend List</h2>
            <!-- <ul class="list">
  <li class="nav-list"><a class="nav-link" href="#">Ram</a></li>
  <li class="nav-list"><a class="nav-link" href="#">Shyam</a></li>
  <li class="nav-list"><a class="nav-link" href="#">Mohan</a></li>
</ul> -->
<table>
<?php 
while($row1=mysqli_fetch_assoc($query_friendlist_result)){
  ?>
  <tr>
  <td><a href="#"><?php echo $row1['friend_name'];?></a></td>
  </tr>
  <?php 
}
?>
</table>
</div>
        <div class="col-sm-8" style="text-align: center;align-items: center;">
        <form method="post" action="facebook.php">
        <div class="form-group">
    <label for="exampleFormControlTextarea1">Post Something</label>
    <textarea class="form-control" name="post" placeholder="Write Something here" id="exampleFormControlTextarea1" rows="6"></textarea>
   <br>
    <input type="submit" class="btn btn-primary" value="Post" name="submit">
  </div>
  </form>
  <div class="user_posts" >Your post will display here</div>
  <br>
  <table>
<?php 
while($row2=mysqli_fetch_assoc($fetch_post_result)){
  ?>
  <tr>
  <td><?php echo $row2['post'];?></td>
  <td><?php echo $row2['posting_date'];?></td>
  </tr>
  <?php 
}
?>
</table>
        
        </div>
       
      </div>
 
  </div>
  </body>
</html>