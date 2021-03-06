<?php
include_once('resources/init.php');

if(isset($_POST['title'], $_POST['contents'], $_POST['category'])){
	$errors = array();

	$title = trim($_POST['title']);
	$contents = trim($_POST['contents']);
	$category = trim($_POST['category']);

	if(empty($title)){
		$errors[] = 'You need to supply a title.';
	}else if(strlen($title) > 255){
		 $errors[] = 'The title cannot be longer than 255 characters.';
	}

	if(empty($contents)){
		$errors[] = 'You need to supply some text';
	}

	if(!category_exists('id', $_POST['category'])){
		$errors[] = 'That category does not exist.';
	}

	if(empty($errors)){
		add_post($title, $contents, $_POST['category']);

		$id = mysql_insert_id();



		header("Location: index.php?=id={$id}");
		die();

	}

	
}//end if
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
     <style>
     
     	label {display: block;}
	</style>   
	<title> Add post </title>
    </head>
    <body>
    	<h1>Add a Post</h1>

    	<?php
    	if(isset($errors) && ! empty($errors)){
    		echo '<ul><li>',  implode('</li><li>', $errors) , '</li></ul>';
    	}  
    	?>

    		
      
        <form action="" method="post">
        	<div>
        	<label for="title"> Title </label>
        	<input type="text" name="title" value="<?php if (isset($_POST['title']) ) echo $_POST['title']; ?>">
		</div>
        <div>
        	<label for="contents"> Contents </label>
        	<textarea name="contents"  rows="15" cols="50" ><?php if (isset($_POST['contents']) ) echo $_POST['contents']; ?></textarea>
		</div>
		<div>
        	<label for="category">Category </label>
        	<select name="category">
        		<?php 
        		foreach ( get_categories() as $category ){
        			?>
        			<option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?> </option> <?php
        		}
        		?>
			</select>
		</div>
		<div>
			<input type="submit" value="Add Post"
		</div>
		</form>
    </body>
</html>