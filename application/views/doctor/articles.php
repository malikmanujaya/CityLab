<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/form.css'?>"/>
<link rel="stylesheet" href="<?php echo BASEURL.'/public/assets/css/table.css'?>"/>

<?php include "components/sidenav.php"; ?>

<div class="main">
        <div class="container">
            <form action="<?php echo BASEURL.'/article/new'?>" method="post" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="6" cols="50"></textarea>
                <label for="filename">Attach File</label>
                <input type="file" id="filename" name="filename" accept="image/*">

                <input type="submit" value="Submit">

            </form>
        </div>

        <table class="styled-table">       
            <thead>
            <tr>
                <th>Date</th>
                <th>Articles</th>
                <th></th>
            </tr>
            </thead>
            
            <tbody>
            <?php 
                $result=$data['result'];
                foreach ($result as $row): 
            ?>
            <tr>
                <td>
                <?php echo $row['date'];?>
                </td>
                <td>
                <a href="<?php echo BASEURL.'/article/edit?article_id='.$row['article_id'];?>"><?php echo $row['title'];?></a>
                </td>
                <td>
                <button class="delete"><a href="<?php echo BASEURL.'/article/delete?article_id='.$row['article_id'];?>"><i class="fas fa-trash"></i></a></button>
                <button class="update"><a href="<?php echo BASEURL.'/article/edit?article_id='.$row['article_id'];?>"><i class="fas fa-pen"></i></a></button>            
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
      </table>
</div> 
</body>
</html>