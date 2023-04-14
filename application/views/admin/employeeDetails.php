<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/table.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/search.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/pagination.css'?>"/>

<?php include "components/sidenav.php"; ?>

    <div class="main">
        <div class="container">
            <div class="searchBox">
                <input type="search" name="search" placeholder="Search"><i class="fa fa-search"></i>
            </div>                

            <table class="styled-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Salary</th>
                    <th>DOB</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                    <?php
                        $result=$data['result'];
                        foreach($result as $row) {
                            $dob = date('d-m-Y',strtotime($row['dob']));
                            $today = date("Y-m-d");
                            $diff = date_diff(date_create($dob), date_create($today));
                    ?>
                    <tr>
                        <td> <?php echo $row["emp_id"]; ?> </td>
                        <td> <?php echo $row["first_name"] ." ".$row["last_name"]; ?> </td>
                        <td> <?php echo $row["type"]; ?> </td>
                        <td> <?php echo $row["gender"]; ?> </td>
                        <td> <?php echo $row["contact"]; ?> </td>
                        <td> <?php echo $row["salary"]; ?> </td>
                        <td> <?php echo $row["dob"]; ?> </td>
                        <td> <?php echo $diff->format('%y');?> y </td>
                        <td>
                            &nbsp;<a href="<?php echo BASEURL.'/employee/edit?user_id='.$row['user_id']; ?>"><i class="far fa-edit" style="color:#26A826;"></i></a>&nbsp;
                            &nbsp;<a href="<?php echo BASEURL.'/employee/delete?user_id='.$row['user_id']; ?>"><i class="far fa-trash-alt" style="color:#FF0000;"></i></a>
                        </td>
                    </tr>
                    <?php 
                        } 
                    ?> 
                </tbody>
            </table>

            <!-- <?php 
                $pageno=$data['pageno'];
                $total_pages=$data['pages'];      
            ?> -->

            <ul class="pagination">
            <li><a href="?pageno=1"><<</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
            </li>
            <li><a href="?pageno=<?php echo $paheno; ?>"><?php echo $pageno ?></a></li>
            <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">>></a></li>
            </ul>

        </div>
    </div>    
</body>

<script>
    $(document).ready(function(){
		$(".delete-record").click(function(e){
			e.preventDefault();
			var confirmBox = confirm('Are you Sure?');
			if(confirmBox == true){
				var getHref = $(this).attr('href');
				window.location.href=getHref;
			}
		});
	});
</script>

</html>