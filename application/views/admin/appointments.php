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
              <th>Patient</th>
              <th>Doctor</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $result=$data['result'];
              foreach($result as $row) {
            ?>
            <tr>
              
              <td> <?php echo $row["first_name"] ." ".$row["last_name"] ; ?> </td>
              <td> <?php echo $row["doctor_id"]; ?> </td>
              <td>
                &nbsp;<a href=""><i class="far fa-edit" style="color:#26A826;"></i></a>&nbsp;
                &nbsp;<a href=""><i class="far fa-trash-alt" style="color:#FF0000;"></i></a>
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

</html>