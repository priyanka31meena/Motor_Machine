<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="bootstrap3.3.7/js/bootstrap.min.js"></script>
    <script>

   
     $(document).ready(function() 
     {

        $("a#add").on('click', function(e)
        {
           $.ajax({
                    type: "GET",
                    url:"addmotor.php",
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                    }

                 });
                     e.preventDefault();
        });

        
     


      });



     function onmotors(id)
     {
        // Motor On

           $.ajax({
                    type: "GET",
                    url:"onmotor.php",
                     data:'id='+id,
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                      setTimeout(onmotor, 1000)
                    }

                 });
                     // e.preventDefault();



      }

      function offmotors(id)
      {
             //Motor Off

       
           $.ajax({
                    type: "GET",
                    url:"offmotor.php",
                    data:'id='+id,
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                       setTimeout(offmotors, 1000)
                    }

                 });
                
      
      }

      function speedincr(id)
      {
           $.ajax({
                    type: "GET",
                    url:"speedinc.php",
                    data:'id='+id,
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                      setTimeout(speedincr, 1000)
                    }

                 });
      }

      function speeddecr(id)
      {
             $.ajax({
                    type: "GET",
                    url:"speeddec.php",
                    data:'id='+id,
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                      setTimeout(speeddecr, 1000)
                    }

                 });
      }
    </script>
    <style type="text/css">
      a:focus, a:hover {
    color: #23527c;
    text-decoration: none;
    }
    </style>
  </head>
  <body>

   <div id="page-wrapper">
        <table style="width:90%" >
            <thead>
              <tr>
                <th>Motor Number</th>
                <th>Turn On Switch</th>
                <th>Turn Off Switch</th>
                <th>Current Speed</th>
                <th>Speed Change</th>
              </tr>
            </thead>
         
              <?php 
                  require "conn.php"; 
                  $query2="select * from motor";
                  $res=mysqli_query($conn,$query2);
              ?>   
                  <tbody>
                  <?php
                    while ($row=mysqli_fetch_assoc($res)) 
                    {
                    
                  ?>
                      <tr>
                                <td><?php echo $row['motorname']; ?></td>
                               <!--  <td><button id="on">ON</button></td> -->
                                  <td><a href="#onmotor" onclick="return onmotors(<?php echo $row['motorid']; ?>)">
                                    <button id="on">ON</button>
                                  </a></td>                               
                               <td><a href="#offmotor" onclick="return offmotors(<?php echo $row['motorid']; ?>)">
                                    <button id="off">OFF</button>
                                  </a></td>
                                <td><div id="cspeed"><?php echo $row['speed']; ?></div>
                             
                                <td>
                                  <p>
                                     
                                     <a href="#speedinc" onclick="return speedincr(<?php echo $row['motorid']; ?>)">
                                        <button id="schange">
                                        <span class="glyphicon glyphicon-arrow-up">
                                          
                                        </span>
                                        </button>
                                      </a>
                                     
                                    <a href="#speeddec" onclick="return speeddecr(<?php echo $row['motorid']; ?>)">
                                        <button id="schange">
                                        <span class="glyphicon glyphicon-arrow-down">
                                          
                                        </span>
                                        </button>
                                    </a>

                                  </p>
                                </td>
                            </tr> 
                  <?php   
                    }
                  ?>

             
         
            </tbody> 
    
        </table>
      </div>
        <a id="add">
          <button id="addmotor">
              Add a motor
          </button>
         </a>

    


  </body>
</html>
