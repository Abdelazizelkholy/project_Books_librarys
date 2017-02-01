<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>BOOKS!</title>
            <style>
              
            .table{
    margin-top: 50px;
    font-size: 18px;
    
}

            
        </style>
    </head>
    <body>
        <div class="page">
            
            
            
            
            
            
        
            
            
            
            <div class="page-header">
                 <h1> Books Script</h1>
            </div>
            
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-cog"></span>Dashdoard</a></li>
                <li role="presentation"><a href="addnew.php"><span class="glyphicon glyphicon-plus"></span>Add New</a></li>
                <li role="presentation"><a href="showall.php"><span class="glyphicon glyphicon-eye-open"></span>Show All</a></li>
            </ul>
    
            
            
            
                  <?php
                  error_reporting("E_ALL & E_NOTIC");
                  include 'connect.php';
                  
                  if($_GET['box']=='active'){
                      
                      
                     $id = intval($_GET['id']);
                     $sql = " UPDATE  book SET active=1 WHERE id=:id ";
                     $stmt = $conn->prepare($sql);
                     $stmt->bindParam(':id',$id,  PDO::PARAM_INT);
                     $stmt->execute();
                     header("location:dashboard.php");
                      
                  }elseif ($_GET['box']=='Unactive') {
                      
                       $id = intval($_GET['id']);
                     $sql = " UPDATE book SET active=0 WHERE id=:id ";
                     $stmt = $conn->prepare($sql);
                     $stmt->bindParam(':id',$id,  PDO::PARAM_INT);
                     $stmt->execute();
                     header("location:dashboard.php");
                  }elseif($_GET['box'] == 'edit'){
                      
                      $id = intval($_GET['id']);
                      $sql = "SELECT * FROM book WHERE id='$id'";
                      $stmt = $conn->query($sql);
                     // $stmt->execute();
                     $row = $stmt->fetch(PDO::FETCH_OBJ);
                     
                 if(isset($_POST['edit'])){
                       
                       $title    = $_POST['title'];
                       $author   = $_POST['author'];
                       
                       $update = " UPDATE  book SET title=:title, author=:author WHERE id ='$id'  ";
                       $updatestmt = $conn->prepare($update);
                       $updatestmt->bindparam(':title',$title,  PDO::PARAM_STR);
                       $updatestmt->bindparam(':author',$author,  PDO::PARAM_STR);
                       $updatestmt->execute();
                       
                       header("location:dashboard.php");
                       
                   }
                       
                   
                     
                     
                      ?>
                  
                  <form class="form-horizontal" action="" method="post">  
                  <fieldset>
                  
                    <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Title</label> 
          <div class="col-md-4">
              <input id="textinput" name="title" type="text" value="<?php echo $row->title;   ?>" placeholder="title" class="form-control input-md">
           
                </div>
              </div>

        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Author</label>  
          <div class="col-md-4">
          <input id="textinput" name="author" type="text" value="<?php echo $row->author;   ?>" placeholder="Author" class="form-control input-md">
           
                    </div>
                  </div>
                  
                   <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton">edit </label>
          <div class="col-md-4">
            <button id="singlebutton" name="edit" class="btn btn-primary">Button</button>
          </div>
                </div>
                  </fieldset>
                 </form> 
              
                  <?php
                  }elseif ($_GET['box'] == 'delete') {
                      
                       $id = intval($_GET['id']);
                      $sql = "DELETE FROM book WHERE id='$id'";
                      $stmt = $conn->query($sql);
                        header("location:dashboard.php");
                      
                  } 
                  
                  
                  
                  else {
                      echo '
                      
                       <table class="table">
                  <tr>
                      <td>ID</td>
                      <td>Title</td>
                      <td>Author</td>
                      <td>Status</td>
                      <td>Edit || Delete </td>
                  </tr>
                     ';
                  
                  
             
                  $sql = "SELECT * FROM book  ORDER BY id";
                  $stmt = $conn->query($sql);
                  $count = $stmt->rowCount();
                 
                  $id = 1;
                  
                  if($count){
                      
                 
                  
                  while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                      if($row->active == 0){
                          
                          echo "<tr>
                           <td>".$id++."</td>   
                           <td>{$row->title}</td>     
                           <td>{$row->author}</td>     
                           <td><a href='dashboard.php?box=active&id={$row->id}' > active </a></td>    
                            <td><a href='dashboard.php?box=edit&id={$row->id}' > Edit </a> ||
                                <a href='dashboard.php?box=delete&id={$row->id}' > Delete </a>


                            </td>   


                          </tr>";
                          
                          
                          
                      }
                          elseif ($row->active  == 1) {
                          echo "<tr>
                           <td>".$id++."</td>   
                           <td>{$row->title}</td>     
                           <td>{$row->author}</td>     
                           <td><a href='dashboard.php?box=Unactive&id={$row->id}' >Unactive </a></td>    
                            <td><a href='dashboard.php?box=edit&id={$row->id}' > Edit </a> ||
                                <a href='dashboard.php?box=delete&id={$row->id}' > Delete </a>


                            </td>   


                          </tr>";
                          
                      }
                      
                      
                      
                  }
                  
                  
                  
                  ?>
                  
                  
                  
             </table>
            
            <?php
            
             }  else {
                      
                  }
                  }
            
            ?>
            
        </div>
        
        
        <?php
        
        ?>
        
         <script src="js/jquery-3.1.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>
