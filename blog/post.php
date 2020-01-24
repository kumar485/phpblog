<?php
include('header.php');
include('db.php');

$con=mysqli_connect($host,$user,$password,$db);

if(mysqli_errno($con)){
    echo "Unable To Connect with DB";
}else{
    $id=$_GET['id'];
  //  echo $id;
    $query="select * from post where id=$id";
    $result = mysqli_query($con,$query);
   $post= mysqli_fetch_assoc($result);
    //var_dump($post);
   mysqli_free_result($result);
   mysqli_close($con);

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
   // echo "Deleted";

        $id=$_POST['del'];
    // echo $id;
     $query="DELETE FROM `post` WHERE  id=$id";

     if( mysqli_query($con,$query)){
        header("Location:index.php"); 
     }
    else{
         echo "Error occured while Deleting..";
     }
 
    

   }
}
?>


   
     <div>
     <h3><?php echo $post['title'] ?></h3>
     <small><?php echo $post['body'] ?></small><br>
     <small><?php echo $post['time'] ?></small>
     <br>
     <a class="btn btn-primary" href="edit.php?id=<?php echo $post['id']  ?>">EDIT</a>
     </div>
     <div style="display:flex; justify-content:flex-end; ">
     <form method="POST" action="<?php  $_SERVER['PHP_SELF']; ?>">
     
       <input type="hidden" name="del" value="<?php echo $post['id']; ?>"><br>
       <input type="submit"  name="submit" value="DELETE" class="btn btn-danger" >
     </form>
     </div>
  </div>





