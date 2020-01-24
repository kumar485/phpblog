<?php
include('header.php');
include('db.php');

$con=mysqli_connect($host,$user,$password,$db);

if(mysqli_errno($con)){
    echo "Unable To Connect with DB";
}else{
//     $id=$_GET['id'];
//   //  echo $id;
    if(isset($_POST['submit'])){

        //echo "submitted";
      $title=$_POST['title'];
      $body=$_POST['body'];
      echo $title;
     $query="INSERT INTO `post`(`title`, `body`) VALUES ('$title','$body')";
    //  $result = mysqli_query($con,$query);
//    $post= mysqli_fetch_assoc($result);
//     //var_dump($post);
//    mysqli_free_result($result);
//    mysqli_close($con);
      if(mysqli_query($con,$query)){
        header("Location:index.php");

      }else{
          echo "Error while Redirect";
      }

    }
}
?>


   
     <div>
      <form  method="POST" action="<?php  $_SERVER['PHP_SELF']; ?> ">
       <label for="title">TITLE</label><br>
       <input type="text" name="title" value=""></br>
       <label for="body">BODY</label><br>
       <textarea name="body" id="" cols="60" rows="10"></textarea>
       <br>
       <input type="submit" name="submit" value="ADD POST" class="btn btn-primary">
      </form>
     </div>
  





