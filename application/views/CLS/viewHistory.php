<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/form.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/back.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/table.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/search.css'?>"/>
<?php include "components/sidenav.php"; ?>

    <div class="main">
      
      <div class="searchBox">
        
        <form action=" <?php echo BASEURL.'/report/search'?>" method="post">
          <input type="search" name="search" placeholder="search" >
          
            <i class="fa fa-search fa-lg" ></i>
          
        </form>
      
      </div>
      
      <div class="table-container">
      
        <table id="sample_data" class="styled-table" >
          <thead>
            <tr>
              <th>ID</th>
              <th>Created Date</th>
              <th>Result</th>
              <th>Unit</th>
              <th>Specimend Examined </th>
              <th>Test</th>
              <th>Actions</th>
            </tr>
          </thead>
        
          <?php 
          $datas = $this->result;
        
            if(!empty($datas)){
              foreach($datas as $data){
              $report_id = $data['report_id'];
              $created_date= $data['created_date'];
              $result = $data['result'];
              
              $unit = $data['unit'];
              $speci_examined = $data['speci_examined'];
              //$test = $data['test'];
          ?>
            
            <tbody id="myTable">     
                <tr>        
                  <td data-label = "ID" ><?php echo $report_id; ?></td>
                  <td data-label = "Created Date" ><?php echo $created_date; ?></td>
                  <td data-label = "Result" ><?php echo $result; ?></td>
                  <td data-label = "Unit" ><?php echo $unit; ?></td>
                  <td data-label = "specimend examined" ><?php echo $speci_examined; ?></td>
                  <td data-label = "Test" >XXX</td>
                  <td data-label = "#">
                    <a href="<?php echo BASEURL.'/report/edit?report_id='.$data['report_id']?>"><i class="fas fa-pen-square"></i></a>
                    <a href="<?php echo BASEURL.'/report/delete?report_id='.$data['report_id']?>"><i class="fas fa-trash-alt"></i></a>                   
                  </td>
                </tr>
                    
          <?php
            }   
          }else{
            echo "no such report";
          }
          ?>  

            </tbody>
        </table>
      </div>

    <div class="pages">
      <a href="<?php echo BASEURL.'/report'?>" class="btn11">Back</a>
    </div>
  </div>  
</div>
</body>
</html>