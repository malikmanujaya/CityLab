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
                <th>Date</th>
                <th>Test</th>
                <th>Report</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $result=$data['result'];
              foreach ($result as $row): 
              ?>
                <tr>
                  <td><?php echo $row["created_date"] ;?></td>
                  <td><?php echo $row["name"] ;?></td>
                  <td><a href="<?php echo BASEURL.'/test/report'?>" target="_blank"><?php echo $row["speci_examined"] ;?>&nbspReport</a></td>
                  <td><?php echo $row["status"] ;?></td>
                </tr>
              <?php endforeach;?> 
            </tbody>
        </table>
      </div>     
    </div> 
</body>
</html>