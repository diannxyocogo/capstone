<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
<!DOCTYPE html>
<html>
	<head>
		<title> Applicant | HireFolks </title>
        <style>
.error {
   background: #F2DEDE;
   color: #a94442; 
   margin-left: 5%;
   margin-right: 5%;
   margin-top: 7%;
}
    </style>
	</head>
	<body>
	</body>
</html>