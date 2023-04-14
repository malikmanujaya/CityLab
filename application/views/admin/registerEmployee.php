<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/forms.css'?>"/>
<?php include "components/sidenav.php"; ?>   

    <div class="main">
      <div class="contents">
        <div class="container">
          <h1><center>Register Employee</center></h1>
          <form action="" method="post">
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="first_name">First Name</label></div>
               <div class="col-75"><input type="text" id="first_name" name="first_name" placeholder="Enter First Name" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="last_name">Last Name</label></div>
               <div class="col-75"><input type="text" id="last_name" name="last_name" placeholder="Enter Last Name" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-25"><label for="title">Type</label></div>
                <div class="col-75">
                  <select id="title" name="title">
                    <option value="CLS">CLS (Clinical Laboratory Scientist)</option>
                    <option value="Receptionist">Receptionist</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="username">UserName</label></div>
               <div class="col-75"><input type="text" id="username" name="username" placeholder="Enter Username" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="contact">Contact Number</label></div>
               <div class="col-75"><input type="number" id="contact" name="contact" placeholder="Enter Contact Number" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="email">Email</label></div>
               <div class="col-75"><input type="email" id="email" name="email" placeholder="Email Address" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="password">Password</label></div>
               <div class="col-75"><input type="password" id="password" name="password" placeholder="password" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="confirm_password">Password</label></div>
               <div class="col-75"><input type="password" id="confirm_password" name="confirm_password" placeholder="confirm password" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
             <div class="row">
               <div class="col-25"><label for="dob">Birthday</label></div>
               <div class="col-75"><input type="date" id="dob" name="dob" placeholder="birthday" class="form-control" required></div>
             </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-25"><label for="gender">Gender</label></div>
                <div class="col-75">
                  <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              <input type="reset" class="btn btn-primary" name="cancel" value="Cancel">
            </div>
        </form>

      </div>
    </div>
  
</body>
</html>