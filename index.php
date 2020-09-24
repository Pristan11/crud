<html>
<head>
<title>REconding</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
 integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
          <?php require_once 'process.php' ?>
         <?php 
         if(isset($_SESSION['message'])) :
         ?>
          <div class='alert alert-<?=$_SESSION['msg_type']?>'>
          <?php echo $_SESSION['message'];
                 unset($_SESSION['message']);
          ?>
          </div>
          <?php endif ?>
        <?php $mysqli=new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM data") or die($mysqli_error);
        
        ?>
       
    
        <div class="row justify-content-center">
        <table class="table">
        <thead> 
         <tr>
                   <th> Name</th>       
                   <th>Location</th>       
                   <th colpan='2'>Action</th>       

         </tr>
        </thead>
        <?php while($row =$result->fetch_assoc()): ?>
        <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                 <td> <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">
                    Edit</a>
                    <a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">
                    Delete</a>
                    </td>  

        </tr>
        <?php endwhile; ?>
        </table>
         </div>
        

         <div class="container">
    <div class="row justify-content-center">
    <form action="process.php" method="POST">
    <div class='form-group'>
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" 
     value="<?php echo $name; ?>" placeholder="Enter Your Name">
    </div>
    <div class='form-group'>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="">Location</label>
    <input type="text"  name="location" class="form-control"
    value="<?php echo $location; ?>" placeholder="Enter Your Location">
    </div>
    <div class='form-group'>
    <?php 
    if($update==true):
      ?>

    <button type="submit" name="update" class="btn btn-success">Update</button>
    <?php else: ?>
      <button type="submit" name="save" class="btn btn-success">save</button>
    <?php endif ?>
    </div>
    </form>
    </div>
    </div>
</body>

</html>