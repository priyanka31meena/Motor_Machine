<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="bootstrap3.3.7/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="bootstrap3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
      .btn-circle.btn-xl {
          width: 70px;
          height: 70px;
          padding: 10px 16px;
          font-size: 24px;
          line-height: 1.33;
          border-radius: 35px;
          background-color: green;
           border: none;
        }
        .btn-circle.btn-xxl {
          width: 70px;
          height: 70px;
          padding: 10px 16px;
          font-size: 24px;
          line-height: 1.33;
          border-radius: 35px;
          background-color: red;
           border: none;
        }

    </style>
    <script type="text/javascript">
      function fixmotors(id)
     {
        

           $.ajax({
                    type: "GET",
                    url:"fixmotor.php",
                     data:'id='+id,
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                      setTimeout(fixmotors, 1000)
                    }

                 });
                     
    }
    function loadpage()
     {
        

           $.ajax({
                    type: "GET",
                    url:"loadpage.php",
                  
                    success: function(data)
                    {
                      $("#page-wrapper").html(data);
                      setTimeout(fixmotors, 1000)
                    }

                 });
                     
    }
    </script>
  </head>
  <body onload='loadpage()'>

   <div id="page-wrapper">
      
      </div>
    

    


  </body>
</html>
