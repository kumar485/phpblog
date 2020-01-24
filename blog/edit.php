<?php
include('header.php');
include('db.php');

$con=mysqli_connect($host,$user,$password,$db);

if(mysqli_errno($con)){
    echo "Unable To Connect with DB";
}else{
    $id=$_GET['id'];
 // echo $id;
   // if(isset($_POST['submit'])){

      
  
    $query="select * from post where id=$id";
    $result = mysqli_query($con,$query);
   $post= mysqli_fetch_assoc($result);
   // var_dump($post);
   mysqli_free_result($result);
   mysqli_close($con);

    

  //  }
}
?>

<?php
include('db.php');

$con=mysqli_connect($host,$user,$password,$db);

if(mysqli_errno($con)){
    echo "Unable To Connect with DB";
}else{
   // $id=$_GET['id'];
 // echo $id;
   if(isset($_POST['submit'])){

  //  echo "submitted edit";
$title=$_POST['title'];
       $body=$_POST['body'];
       $id=$_POST['id'];
   // echo $id;
    $query="UPDATE `post` SET `title`='$title',`body`='$body' WHERE id=$id";

    if( mysqli_query($con,$query)){
        header("Location:index.php"); 
    }
    else{
        echo "Error occured while updating..";
    }
  //   $result = mysqli_query($con,$query);
//    $post= mysqli_fetch_assoc($result);
//    // var_dump($post);
//    mysqli_free_result($result);
//    mysqli_close($con);

    

   }
}
?>




   
     <div class="container">
      <form  method="POST" action="<?php  $_SERVER['PHP_SELF']; ?> ">
       <label for="title">TITLE</label><br>
       <input type="hidden" name="id" value="<?php echo $post['id']; ?>"></br>
       <input type="text" name="title" value="<?php echo $post['title']; ?>"></br>
       <label for="body">BODY</label><br>
       <textarea class="ckeditor" name="body" id="editor1" cols="60" rows="10"> <?php echo $post['body']; ?></textarea>
       <br>
       <br>
       <input type="submit" name="submit" value="EDIT POST" class="btn btn-primary">
      </form>
     </div>
  





