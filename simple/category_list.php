<?php include_once('resources/init.php'); ?>
<!DOCTYPE html>
	<html lang="en">
		
            <meta charset="utf-8" />
                        
            
			
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title> Manage categories</title>
</head>	

</head>
    <body> 
        
    <?php
    foreach (get_categories() as $category){
        ?>
        <p><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?> </a> - <a href="delete_category.php?id=<?php echo $category['id']; ?>">Delete</a></p>
        <?php
    }
    ?>
        
        
       
      
    </body>
</html>