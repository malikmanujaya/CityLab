<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/forms.css'?>"/>
<?php include "components/sidenav.php"; ?>  

    <div class="main">
        <div class="contents">
          <div class="container">
            <h3><center>Add New Record</center></h3><br>
            <form action="<?php echo BASEURL.'/finance/add'?>" method="post">
  
                <div class="form-group">
                  <div class="row">
                    <div class="col-25"><label>Description</label></div>
                    <div class="col-75"><input type="text" name="description" class="form-control" required></div>
                  </div>
                </div>
        
                <div class="form-group">
                  <div class="row">
                    <div class="col-25"><label>Income</label></div>
                    <div class="col-75"><input type="text" name="income" class="form-control" ></div>
                  </div>
                </div>
                                       <div class="form-group">
                                                                     <div class="row">
                                                                     <div class="col-25">
                                                                         <label>Expenses</label></div>
                                                                         <div class="col-75">
                                                                          <input type="text" name="expense" class="form-control" ></div>
                                                                          </div>
                                                                     </div>

    <div class="row">

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                            <input type="reset" class="btn btn-primary" name="cancel" value="Cancel"></a>
                              </div>
                          </form>
    </div>


  </div>
</div>
</body>

</html>