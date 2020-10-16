
<?php 
$connection=mysqli_connect('localhost','root','','facebook');
if($connection){
    //echo "We are  connected";
}
else{
    die("Database connection failed");
}


$query="SELECT * FROM tUser WHERE User_id=1";
$result=mysqli_query($connection,$query);
if(!$result){
    die("Query Failed" . mysqli_error($connection));
}

while($row=mysqli_fetch_assoc($result)){
  $name=$row['Name'];
  $email=$row['Email_id'];
  $password=$row['Password'];
  $address=$row['Address'];
  $phone=$row['Phone'];
}
 

if(isset($_POST['submit'])){
    $name = $_POST['name'];
   $password = $_POST['password'];
  //  $id= $_POST['id'];
   $query="UPDATE tUser SET Name='$name',Password='$password' WHERE User_id=1";
//    $query .="username=$username"; 
//    $query .="password=$password ";
//     $query .=" WHERE id=$id";
   $result=mysqli_query($connection,$query);
   if(!$result){
       die ("Query Failed".mysqli_error($connection));
   }
   else{
       echo "'<h5 style='color:green;'>Updated Sucessfully</h5>'";
   }
}
?>




<html>
<head>
<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


<title></title>
</head>
<body>

<div class="container">
<div class="col-xs-6">
<h1 style="color:blue;">Update Your Record</h1>
<form action="update.php" method="post">
<div class="form-group">
<label for="name">name</label>
<input type="text" name="name" value="<?php echo $name?>" class="form-control">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" value="<?php echo $password?>" class="form-control">
<div>
<div class="form-group">
<label for="email">email</label>
<input type="email" name="email" value="<?php echo $email?>" class="form-control">
<div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" name="address" value="<?php echo $address?>" class="form-control">
<div>
<div class="form-group">
<label for="mobile">Mobile Number</label>
<input type="text" name="number" value="<?php echo $phone?>" class="form-control">
<div>
<br>
<input type="submit" name="submit" value="UPDATE" class="btn btn-primary">

</form>
</div>
</div>

</body>

</html>