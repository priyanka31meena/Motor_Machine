  <table style="width:90%" >
            <thead>
              <tr>
                <th>Motor Number</th>
                <th>Motor Health</th>
                <th>Fix issue</th>
               
              </tr>
            </thead>
              <?php 
                  require "../conn.php"; 
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
                  
                    <?php 
                      if($row['speed']<10)
                      {
                        ?>

                            <td>
                              <button type="button" class="btn-circle btn-xl"></button>

                            </td>

                        <?php
                      }
                      else
                      {
                        ?>
                          <td>
                              <button type="button" class="btn-circle btn-xxl"></button>

                            </td>
                        <?php
                      }
                     ?>
                  
                   <td>
                    <a href="#fixmotor" onclick="return fixmotors(<?php echo $row['motorid']; ?>)">
                      <button id="addmotor">Fix the motor</button>
                    </a></td>
                 
               </tr> 
               <?php
                      }
               ?>
            
            </tbody>
        </table>