

<?php
include('header.php');
include('db.php');
$con=mysqli_connect($host,$user,$password,$db);

if(mysqli_errno($con)){
    echo "Unable To Connect with DB";
}else{
  
     $query="select * from post";
    $result = mysqli_query($con,$query);
   $post= mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);
   mysqli_close($con);

}
?>



    <?php foreach($post as $pos): ?>
     <div>
     <h3><?php echo $pos['title'] ?></h3>
     <small><?php echo $pos['body'] ?></small><br>
     <small><?php echo $pos['time'] ?></small>
     <br>
     <br>
     <a class="btn btn-primary" href="post.php?id=<?php echo $pos['id'] ?> "> Read More</a>
     </div>
    <?php endforeach; ?>
    </div>





