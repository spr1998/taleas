<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">

</style>
<body>

	<div class="container">
	<div class="row">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		<h1>Krijo nje postim</h1>
    		
    		<form action="index.php?controller=posts&action=addPost" method="POST" enctype="multipart/form-data">
    		    
    		    
    		    <div class="form-group">
    		        <label for="title">Titulli </label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Permbajtja</label>
    		        <textarea rows="5" maxlength="254" class="form-control" name="content" ></textarea>
    		    </div>
    		    
    		    
    		    
    		    <div class="form-group">
    		    	<input type="file" name="file"><br />
    		        <button type="submit" class="btn btn-primary">
    		            Krijo
    		        </button>
    		        <a href="index.php?controller=posts&action=index" class="btn btn-default">
    		            Anullo
    		        </a>
    		    </div>
    		    <?php if(isset($_SESSION["error"])){ echo $_SESSION["error"]; unset($_SESSION["error"]); } ?>
    		</form>
		</div>
		
	</div>
</div>

</body>
</html>















<!--<p>This is the requested post:</p>

<p><?php echo $post->name; ?></p>
<p><?php echo $post->content; ?></p> -->