<?php

require "conn.php";

	 
	$id=$_GET['id'];


$que1="select * from motor where motorid='$id'";
$result5 = mysqli_query($conn,$que1);
while($row5 = mysqli_fetch_assoc($result5))
  {
    $currentspeed=$row5['speed'];
  }


$que="select mrecordid from motorrecord where mid='$id'";
$result2 = mysqli_query($conn,$que);
while($row2 = mysqli_fetch_assoc($result2))
  {
    $mrecordid = $row2['mrecordid'];
  }
  
  $query3="UPDATE motorrecord set endtime=now(),currentspeed='$currentspeed' WHERE mrecordid='$mrecordid'";



  mysqli_query($conn,$query3);

  $query="INSERT INTO motorrecord(mid,startime) VALUES ('$id',now())";

  mysqli_query($conn,$query);
	
	 $query="select * from motor where motorid='$id'";
	$result1=mysqli_query($conn,$query);

	$row1=mysqli_fetch_assoc($result1);
	 $speed=$row1['speed'];
	 $status=$row1['status'];
	if($status != 'OFF')
	{
		$speed=$speed+1;
	}

		$query1="UPDATE motor SET speed='$speed' WHERE motorid='$id'";

		$result=mysqli_query($conn,$query1);

		$query2="select * from motor";
		$res=mysqli_query($conn,$query2);



		?>

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
			<tbody>
				<?php
					while ($row=mysqli_fetch_assoc($res)) 
					{
				?>
						<tr>
			                <td><?php echo $row['motorname']; ?></td>
	                                <td><a href="#onmotor" onclick="return onmotors(<?php echo $row['motorid']; ?>)">
	                                    <button id="on">ON</button>
	                                  </a></td>
	                                <td><a href="#offmotor" onclick="return offmotors(<?php echo $row['motorid']; ?>)">
	                                    <button id="off">OFF</button>
	                                  </a></td>
	                                <td><div id="cspeed"><?php echo $row['speed']; ?></div>
	                                </td>
			                 <td>
	                                  <p>
	                                     
	                                     <a href="#speedinc" onclick="return speedincr(<?php echo $row['motorid']; ?>)">
	                                        <button id="schange">
	                                        <span class="glyphicon glyphicon-arrow-up"></span>
	                                        </button>
	                                      </a>
	                                     
	                                    <a href="#speeddec" onclick="return speeddecr(<?php echo $row['motorid']; ?>)">
	                                        <button id="schange">
	                                        <span class="glyphicon glyphicon-arrow-down"></span>
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
