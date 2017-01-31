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
    </head>
    <body>
        
         <?php
        
         //   ensure from button exist ya baby
         
         if(isset($_POST['add'])){
            
             // make varaible to send to database ya habiby
             $title    = $_POST['title'];
             $author   = $_POST['author'];
             $active   = $_POST['active'];
             $errors   = array();
            //      ensure that the input isnot empty...
             if( empty($title)  || empty($author)){
                 
                 $errors[]= 'please , filed requrid';
             }  else {
             // call up file connection ya baby
                 include 'connect.php';
                 
                 // insert data from input user to database
                 $sql = " INSERT INTO book (title,author,active) VALUES(?,?,?)  ";
                 $stmt = $conn->prepare($sql);
                 $stmt->bindParam(1,$title,  PDO::PARAM_STR);
                 $stmt->bindParam(2,$author,  PDO::PARAM_STR);
                 $stmt->bindParam(3,$active,  PDO::PARAM_INT);
                 $stmt->execute();
                 $succes = " the book has been added ";
                 
             }
             
         }
         
         
        ?>
        
        
        
        
        
        
        
        
          <div class="page">
            <div class="page-header">
                 <h1> Books Script</h1>
            </div>
            
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-cog"></span>Dashdoard</a></li>
                <li role="presentation"><a href="addnew.php"><span class="glyphicon glyphicon-plus"></span>Add New</a></li>
                <li role="presentation"><a href="showall.php"><span class="glyphicon glyphicon-eye-open"></span>Show All</a></li>
            </ul>
              
             <!-- you shouhd take care from name , action , method ya baby             -->

              <form class="form-horizontal" action="" method="post">
<fieldset>
    
    <br>
    
   <?php
   
   
   //  i'm write the code here to show in the form ya 2lby...
   if(isset($succes)){
       
       echo '<div class="alert alert-success" role="alert">'.$succes.'</div>';
       
   }
   
   
   if(isset($errors)){
       
       foreach ($errors as $error ){
           
           echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
       } 
   }  
   
   
   
   ?>



<!-- Text input-->

            

        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Title</label>  
          <div class="col-md-4">
          <input id="textinput" name="title" type="text" placeholder="title" class="form-control input-md">
          <span class="help-block">help</span>  
          </div>
        </div>

<!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Author</label>  
          <div class="col-md-4">
          <input id="textinput" name="author" type="text" placeholder="Author" class="form-control input-md">
          <span class="help-block">help</span>  
          </div>
        </div>

<!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="selectbasic">Select Basic</label>
          <div class="col-md-4">
            <select id="selectbasic" name="active" class="form-control">
              <option value="0">Un active</option>
              <option value="1">active </option>
            </select>
          </div>
        </div>

<!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton">Add </label>
          <div class="col-md-4">
            <button id="singlebutton" name="add" class="btn btn-primary">Button</button>
          </div>
        </div>

</fieldset>
</form>
              
              
    
        </div>
        
        
       
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </body>
</html>
