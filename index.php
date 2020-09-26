<?php
include("action.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Google Contacts</title>
</head>
<body>
    <div class="container">
    <div class="jumbotron">
    <h1 align="center">Google Contacts</h1>
    <form action="index.php" method="post">
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="searchbar">
     
          <input class="search_input" type="text" name="search" placeholder="Search...">
          <button type="submit" class="search-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.592 2.712L2.38 7.25h4.87a.75.75 0 110 1.5H2.38l-.788 4.538L13.929 8 1.592 2.712zM.989 8L.064 2.68a1.341 1.341 0 011.85-1.462l13.402 5.744a1.13 1.13 0 010 2.076L1.913 14.782a1.341 1.341 0 01-1.85-1.463L.99 8z"></path></svg></button>
         
        </div>
      </div>
      </form>
      
    </div>
    </div>
    </div>
    <style>
    
    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #353b48;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color:white;
    text-decoration:none;
    }
    </style>
    <div class="container">
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="panel panel-primary">
  
    <div class="panel-body">
    <?php
    if(isset($_POST['search'])){
    
    }

if(isset($_GET['update'])){
  
   
        global $con;
    
        $id=$_GET['id'];
        

    
        $select="SELECT * FROM contacts WHERE id=$id";
        $query=mysqli_query($con,$select);
        $fetch=mysqli_fetch_array($query);
        session_start();
        $_SESSION['id']=$fetch['id'];
        $_SESSION['location']=$fetch['location'];
    
    ?>
      <div class="panel-heading">
   
   Enter Contact details
   </div>
    <form method="post" action="action.php" enctype="multipart/form-data">
    <table class="table table-hover">
    <tr>
    <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Update Photo</span>
    </div>
    <div class="custom-file">
    <input type="file" class="custom-file-input" value="<?php echo $fetch['location'];?>" name="image" id="customFile" required>
    <label class="custom-file-label" for="inputGroupFile01">Upload Photo</label>
    </div>
    <td>Contact Name</td>
    <td><input type="text" class="form-control" name="name" value="<?php echo $fetch['name'];?>" placeholder="Enter Contact Name" required></td>
    <td>Phone Number</td>
    <td><input type="text"class="form-control" name="number"value="<?php echo $fetch['phone_number'];?>" placeholder="Enter Phone Number"required></td>
    </tr>
    <td cospan="2" align="center"><input type="submit" class="btn btn-primary" name="updat" value="Update"></td>
    </tr>
    </table>
 

    </form>
    
    
    <?php
    
    
    }
      


else{
    ?>
     <form method="post" action="action.php"  enctype="multipart/form-data">
    <table class="table table-hover">
    <tr>
    <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload Photo</span>
  </div>
  <div class="custom-file">
  <input type="file" class="custom-file-input"  name="image" id="customFile" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
  </div>
    <td>Contact Name</td>
    <td><input type="text" class="form-control" name="name" placeholder="Enter Contact Name" required></td>
    <td>Phone Number</td>
    <td><input type="text"class="form-control" name="number" placeholder="Enter Phone Number"required></td>
    </tr>
    <td cospan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Save"></td>
    </tr>
    </table>
    </form>
    <?php
    
}

?>
    
    
    </div>
    </div></div>
    <div class="col-md-3">
    
    </div>

    </div>
    <div class="container">
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    <table class="table table-bordered"style={border-radi}>
    <tr>
    <th>Photo</th>
    <th>Contact Name</th>
    <th>Phone Number</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
   <?php
   if(isset($_POST['search']))
   {
       $searchq=$_POST['search'];
       $searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
       $query="SELECT * FROM contacts WHERE  name LIKE '%$searchq%' OR phone_number LIKE '%$searchq%'";
       $rquery=mysqli_query($con,$query);
       $count=mysqli_num_rows($rquery);
       if($count==0)
       {
           $output='There is no search research results';
       }
       else{
           while($row=mysqli_fetch_array($rquery))
           {
               $name=$row['name'];
               $number=$row['phone_number'];
               $location=$row['location'];
           
           ?>
           <tr>
            <th>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo $location?>"  class="rounded-circle" alt="Cinque Terre" width="36" height="36" ></th>
           <th><?php echo $name;?></th>
       <th><?php echo $number;?></th>
       <th><a href="index.php?update=1&id=<?php echo $row['id'];?>" class="btn btn-info"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M17.263 2.177a1.75 1.75 0 012.474 0l2.586 2.586a1.75 1.75 0 010 2.474L19.53 10.03l-.012.013L8.69 20.378a1.75 1.75 0 01-.699.409l-5.523 1.68a.75.75 0 01-.935-.935l1.673-5.5a1.75 1.75 0 01.466-.756L14.476 4.963l2.787-2.786zm-2.275 4.371l-10.28 9.813a.25.25 0 00-.067.108l-1.264 4.154 4.177-1.271a.25.25 0 00.1-.059l10.273-9.806-2.94-2.939zM19 8.44l2.263-2.262a.25.25 0 000-.354l-2.586-2.586a.25.25 0 00-.354 0L16.061 5.5 19 8.44z"></path></svg></a></th>
        <th><a href="index.php?delete=1&id=<?php echo $row['id'];?>"class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg></a></th>
    </tr>
         <?php
       }
   }
}
   else{
   show();
   }

   ?>
    
    </table>
    </div>
    
    </div>
    </div>
</body>
</html>