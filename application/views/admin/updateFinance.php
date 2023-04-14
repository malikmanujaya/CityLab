<?php include "components/sidenav.php"; ?>

<style>
    body{width:1000px;font-family:arial;letter-spacing:1px;line-height:20px;}
a{color:white;}
.contents{display:flex;flex-direction: column;align-items: flex-end;position:absolute;top:5%;}
.button_link {display:flex;justify-content:center;margin:20px 0px;text-align:right;text-decoration:none; background-color:var(--color1);padding:10px;width:100px;border-radius:10px;}
.frm-add {border: #c3bebe 1px solid;padding: 30px;}
.demo-form-heading {margin-top:0px;font-weight: 500;}
.demo-form-row{margin-top:20px;}
.demo-form-field{width:600px;padding:10px;}
.demo-form-submit{color:#FFF;background-color:#414444;padding:10px 50px;border:0px;cursor:pointer;border-radius:10px;}
</style>

    <div class="main">

        <?php 
        $result=$data['result']; 
        ?>
        <div class="contents">

            <div style="margin:20px 0px;text-align:right;">
                <a href="<?php echo BASEURL.'/finance'?>" class="button_link">Back to List</a>
            </div>

            <div class="frm-add">
                <h1 class="demo-form-heading">Edit Record</h1>
                <form name="frmAdd" action="<?php echo BASEURL.'/finance/update'?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $result[0]['id'];?>" required />
                    
                    <div class="demo-form-row">
                        <label>Description: </label><br>
                        <input type="text" name="description" class="demo-form-field" value="<?php echo $result[0]['description']; ?>" required />
                    </div>
                    <div class="demo-form-row">
                        <label>Income Money: </label><br>
                        <input type="text" name="income" class="demo-form-field" value="<?php echo $result[0]['income']; ?>"  />
                    </div>
                    <div class="demo-form-row">
                        <label>Expense Money: </label><br>
                        <input type="text" name="expense" class="demo-form-field" value="<?php echo $result[0]['expense']; ?>"  />
                    </div>

                    <div class="demo-form-row">
                        <input name="save_record" type="submit" value="Save" class="demo-form-submit">
                    </div>
                </form>
            </div>


        </div>
    </div>

    </body>
</html>