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
    margin-top: 30px;
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
              
              
              <!--     create table ya habiby     -->
              
              <table class="table">
                  <tr>
                      <td>ID</td>
                      <td>Title</td>
                      <td>Author</td>
                  </tr>
              
              <?php
                  //  call up the file database  
              include 'connect.php';
              
              //  selest data from database
              $sql = " SELECT *FROM book WHERE active=1 ";
              $stmt = $conn->prepare($sql);
              $stmt->execute();
              $id = 1;
              
              //  i'm write this code to show data
              while ($row = $stmt->fetch()){
                  
                  echo '<tr>';
                  echo '<td>'.$id++.'</td>';
                  echo '<td>'.$row['title'].'</td>';
                  echo '<td>'.$row['author'].'</td>';
                  echo '</tr>';
                  
                  
              }
              
           
              
              
              ?>
              
       </table> 
          </div>      
              
              
    
        
        
        
        
        <script src="js/jquery-3.1.1.min.js"></script>
         <script src="js/bootstrap.js"></script>
    </body>
</html>
