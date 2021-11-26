
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

   
    <?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<style type='text/css'>



</style>

</head>





				<a class="collapse-item" href='<?php echo site_url('examples/clubs')?>'></a> 
				<a class="collapse-item" href='<?php echo site_url('examples/categorie')?>'></a> 
								<a class="collapse-item" href='<?php echo site_url('examples/coachs')?>'></a> 


		<a class="collapse-item" href='<?php echo site_url('examples/matches')?>'></a> 	
				<a class="collapse-item" href='<?php echo site_url('examples/matchestow')?>'></a> 	
			
		<a class="collapse-item" href='<?php echo site_url('examples/competitions')?>'></a> 
		<a class="collapse-item" href='<?php echo site_url('examples/demandelicence')?>'></a>
		<a class="collapse-item" href='<?php echo site_url('examples/arbitres')?>'></a> 
							
			</div>
		</div>
	
	

</div>

    <div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
	
	
</body>
</html>