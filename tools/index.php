<?php
	include "data.php";

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
    <title>Code Tools</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
<br>
  	<div class="container">
  		<div class="row">

			<div class="col-md-12">
				<form class="form form-horizontal" method="post">

					<div class="form-group">
						
						<div class="col-md-2">
							<label class="form-label">Table name</label>
							<input class="form-control" type="text" name="table_name" value="<?=$table['name']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Add prefix</label>
							<input class="form-control" type="text" name="fun_add" value="<?=$add['name']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Update prefix</label>
							<input class="form-control" type="text" name="fun_update" value="<?=$update['name']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Select prefix</label>
							<input class="form-control" type="text" name="fun_select" value="<?=$select['name']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Delete prefix</label>
							<input class="form-control" type="text" name="fun_delete" value="<?=$delete['name']?>">
						</div>

					</div><!--form-group-->

					<div class="form-group">
						
						<div class="col-md-2">
							<label class="form-label">Default fun name</label>
							<input class="form-control" type="text" name="table_sname" value="<?=$table['sname']?>">
						</div>

						<div class="col-md-2">
							
						</div>

						<div class="col-md-2">
							
						</div>

						<div class="col-md-2">
							<label class="form-label">Select return</label>
							<?php get_function_return_options("select_return",$select['return']); ?>
						</div>

						<div class="col-md-2">
							
						</div>

					</div><!--form-group-->

					<div class="form-group">
						
						<div class="col-md-2">
							<label class="form-label">Comment name</label>
							<input class="form-control" type="text" name="table_cname" value="<?=$table['cname']?>">
						</div>

						<div class="col-md-2">
							
						</div>

						<div class="col-md-2">
							<label class="form-label">Update on feild</label>
							<input class="form-control" type="text" name="update_feild" value="<?=$update['field']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Select on feild</label>
							<input class="form-control" type="text" name="select_feild" value="<?=$select['field']?>">
						</div>

						<div class="col-md-2">
							<label class="form-label">Delete on feild</label>
							<input class="form-control" type="text" name="delete_feild" value="<?=$delete['field']?>">
						</div>

					</div><!--form-group-->

					<div class="form-group">
						<div class="col-md-12">
						 	<input class="btn btn-success" type="submit" name="" value="Genrate Codignator Model code">
						</div>
					</div><!--form-group-->

				</form>
			</div><!--col-md-12-->


<div class="col-md-12">
	<hr>
</div>

  			<div class="com-md-12">
  				<pre style="font-size:15px;">

<?php echo write_add_fun(); ?>

<?php echo write_update_fun(); ?>

<?php echo write_select_fun(); ?>

<?php echo write_delete_fun(); ?>

  				</pre>
  			</div><!--com-md-12-->
  		</div><!--row-->
  	</div><!--container-->
 
  </body>
</html>
 