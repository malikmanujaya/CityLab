<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/formInput.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/settings.css'?>"/>
<?php include "components/sidenav.php"; ?>

    <div class="main">
        
        <?php $result=$data['result']; ?>

        <!-- <div class="container">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <form action="<?php echo BASEURL.'/settings/profile'?>" method="post" enctype="multipart/form-data">
                        <input type='file' id="imageUpload" name="imageUpload" onchange="this.form.submit()" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"><i class="fas fa-camera upload-button"></i></label>   
                    </form>
                </div>

                <div class="avatar-preview">
                    <div id="imagePreview">
                        <img width="100%" height="100%" src="<?php echo BASEURL; ?>/public/assets/img/profile/<?php if ($result['image']){
                                                                                                                        echo $result['image'];
                                                                                                                    }else{
                                                                                                                        echo "default.png";
                                                                                                                    } ?>" alt=""/>
                    </div>
                </div>
            </div>
        </div> -->
        
        <form class="form" action="<?php echo BASEURL.'/settings/updateLab'?>" method="post">
        
            <div class="inputContainer">
                <input type="text" name="name" id="name" class="input" value="<?php echo $result[0]['name']; ?>">
                <label for="name" class="label">Name</label>
            </div>
            <div class="inputContainer">
                <input type="text" name="email" id="email" class="input" value="<?php echo $result[0]['email']; ?>">
                <label for="email" class="label">Email</label>
            </div>    
            <div class="inputContainer">
                <input type="text" name="address" id="address" class="input" value="<?php echo $result[0]['address']; ?>">
                <label for="address" class="label">Address</label>
            </div>
            <div class="inputContainer">
                <input type="number" name="contact" id="contact" class="input" value="<?php echo $result[0]['contact']; ?>">
                <label for="contact" class="label">Contact</label>
            </div>
    
            <button class="submitBtn">Submit</button>
        </form>
        
    </div> 
</body>
</html>