<?php
include("db.php");

if(isset($_POST['submit']))
{
  
function insert(){
    global $con;
    $name=$_POST['name'];

    $number=$_POST['number'];
    $photo=$_FILES['image']['tmp_name'];
    $real=$_FILES['image']['name'];
    move_uploaded_file($photo,"upload/$real");
    $location="upload/".$real;
    $insert="INSERT INTO contacts(name,phone_number,location)
    VALUES('$name','$number','$location')";
    $query=mysqli_query($con,$insert);
    if($query)
    {
        header("location:index.php?msg=Record Inserted");
        }

    }
    insert();

}
function show(){
    global $con;
    $select="SELECT * FROM contacts";
    $query=mysqli_query($con,$select);
    while($fetch=mysqli_fetch_array($query)){
        $name=$fetch['name'];
        $image=$fetch['location'];
        $phone=$fetch['phone_number'];
        ?>
         <tr>
         <div class="img-wrapper">
  

        <th>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $image?>"  class="rounded-circle" alt="Cinque Terre" width="36" height="36" ></th>
        </div>
        <th><?php echo $name;?></th>
        <th><?php echo $phone;?></th>
        
        <th><a href="index.php?update=1&id=<?php echo $fetch['id'];?>" class="btn btn-info"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path></svg></a></th>
        <th><a href="index.php?delete=1&id=<?php echo $fetch['id'];?>"class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg></a></th>
    </tr>
        </tr>
        <style type="text/css">
    img{
      width:36px;
      height:36px;
      opacity: 1;
      filter: alpha(opacity=100);
      
    }
    img:hover
    {
      opacity: 0.3;
      filter: alpha(opacity=30);
    }
  </style>
        <?php
         }


         
   
}

if(isset($_POST['updat']))
{
    $name=$_POST['name'];
    $update="UPDATE contacts 
    SET name='$name' ";
    $query=mysqli_query($con,$name);
    if($query)
    {
        header("location:index.php?msg=Record Inserted");
    }

}
if(isset($_GET['delete']))
{
  
function delete(){
    global $con;
    $id=$_GET['id'];


 
 
  
    $delete="DELETE FROM contacts  WHERE id='$id' ";
   
  
    $query=mysqli_query($con,$delete);
    if($query)
    {
        header("location:index.php?msg=Record deleted");
        }

    }
    delete();

}
if(isset($_POST['updat']))
{
  
function insert(){
    global $con;
    $name=$_POST['name'];
    $number=$_POST['number'];
    
  session_start();
  $id=$_SESSION['id'];
  $image=$_SESSION['location'];
  
  $photo=$_FILES['image']['tmp_name'];
  $real=$_FILES['image']['name'];
  move_uploaded_file($photo,"upload/$real");
  $location="upload/".$real;
  
    $insert="UPDATE contacts SET  name='$name',phone_number='$number',location='$location' WHERE id='$id' ";
   
  
    $query=mysqli_query($con,$insert);
    if($query)
    {
        header("location:index.php?msg=Record updated");
        }

    }
    insert();

}

?>