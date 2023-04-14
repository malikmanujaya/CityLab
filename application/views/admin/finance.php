<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/table.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/search.css'?>"/>
<?php include "components/sidenav.php"; ?>

    <div class="main">
      <div class="container">
        <div class="searchBox">
          <input type="search" name="search" placeholder="Search"><i class="fa fa-search"></i>
        </div>                

        <table class="styled-table">
          <thead>
          <tr>
            <th>Description</th>
            <th>Date</th>
            <th>Income</th>
            <th>Expenses</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            <?php
              $result=$data['result'];
              foreach($result as $row) {
            ?>
            <tr>
              <td> <?php echo $row["description"]; ?> </td>
              <td> <?php echo $row["date"]; ?> </td>
              <td> <?php if($row["income"]==0)
                          echo "-";
                         else echo $row["income"]; ?> </td>
              <td> <?php if($row["expense"]==0) echo "-"; else echo $row["expense"]; ?> </td>
              <td>
                &nbsp;<a href="<?php echo BASEURL.'/finance/edit?finance_id='.$row['id']; ?>"><i class="far fa-edit" style="color:#26A826;"></i></a>&nbsp;
                &nbsp;<a href="<?php echo BASEURL.'/finance/delete?finance_id='.$row['id']; ?>"><i class="far fa-trash-alt" style="color:#FF0000;"></i></a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>



      </div>
    </div>
</body>

<script>
    $(document).ready(function(){
			$(".delete-record").click(function(e){
				e.preventDefault();

				var confirmBox = confirm('Are you Sure?');

				if(confirmBox == true)
				{
					var getHref = $(this).attr('href');
					window.location.href=getHref;
				}
			});
		});
</script>
</html>