<?php
include 'inc/header-guest.php';
include 'inc/sidebar-guest.php';
error_reporting(E_ALL ^ E_NOTICE);

//include 'inc/content.php';
?>

<?php
 $post = new Post();
 $fm = new Format();
?>

<!--pagination-->
<?php
$perPage=2;

if(!isset($_GET['adminId']) || $_GET['adminId']==NULL){
//header("Location:404.php");

}else{
  $adminId=$_GET['adminId'];
  $author=$_GET['author'];
}


?>



<!--pagination-->

<div class="col-sm-9 animated  slideInRight">
<h2 class="v-center well">POST STORE</h2>
<div class="min-height well">
<div class="row">
<?php
$getPost= $post->getPostByAuthor($author,$adminId);
if($getPost){
$i=0;
while($result=$getPost->fetch_assoc()){
$i++;
?>
<div class="col-md-12 single-post">
    <div class="thumbnail">
    
     
      <div class="caption">
         <h4 class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-tag" ></i>&nbsp;<?php echo $result['tags'];?></h4>

        <p class=" thum-height " style="text-align:justify; padding: 10px;">

         <strong style="font-size: 25px;color:white; display:block; margin-bottom:15px; " class="btn btn-primary"><?php echo $result['title'];?></strong>

          <img src="../admin/<?php echo $result['image'];?>" style="margin-top:-15px;" alt="..." class="pull-right col-sm-4" width="200px;">


         <?php echo $fm->textShorten($result['body']);?>
          <a href="post-details.php?id=<?php echo $result['id'];?>" class="btn btn-info pull-right" >Read More..</a>

     
          
         
              <hr>
               
          <br></br>





        </p>
        
        
        <p><button class="btn btn-primary" style="margin-left: 10px;" role="button"><i class=""></i><?php echo $fm->formDate($result['date']);?></Button>


        <a href="blog-guest.php" class="btn btn-info pull-right" >BACK</a>&nbsp;&nbsp;&nbsp;


        <a href="#" class="btn btn-primary pull-right" title="AUTHOR" role="button">By&nbsp;<i class="fa fa-user"></i><?php echo $result['author'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
        <label class="new animated infinite jello pull-right">NEW</label>
      </div>
    </div>


</div>
<?php

} //--end while loop--

?>

<!--pagination-->
<?php 
$getPost= $post->getAllPost();
$rows=mysqli_num_rows($getPost);
$totalPages=ceil($rows/$perPage);



echo "<span class='pagination'><a href='index.php?page=1' class='btn btn-primary'>".'first Page'."</a>";

for($i=1;$i<=$totalPages;$i++){

 echo "<a href='index.php?page=".$i."' class='badge'>".$i."</a>"; 
  
}


echo "<a href='index.php?page=$totalPages' class='btn btn-primary'>".'last Page'."</a></span>"

?>


<!--pagination-->
<?php

}else{
  echo "Data not found";
  //header("Location:404.php");
}
?>




    


      
      

      
      </div>
      </div><!--col-sm-9-end -->
      </div><!--row-end -->
      </div><!--container-end -->
      </section><!--4th-row-end -->



<?php include 'inc/footer.php' ;?>