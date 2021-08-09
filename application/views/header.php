<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title>Sorteios Online Grátis</title>
		<link href="<?php echo base_url('assets/styles/main_page.css');?>" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<header>
			<div class="center">
				<h1><a href="<?php echo base_url(); ?>">SorteiosOnline</a></h1>
				<div class="menu-dropdown">
					<a href="javascript:void(0);" onclick="menu()">
						<i class="fa fa-bars"></i>
					</a>
					<div class="menu-content">
						<a href="<?php echo base_url('sorteio/numeros') ?>" >Sorteio de Numeros</a>
						<a href="<?php echo base_url('sorteio/nomes') ?>" >Sorteio de Nomes</a>
						<a href="<?php echo base_url('sorteio/amigo_secreto') ?>" >Sorteio de Amigo Secreto</a>
					</div>
				</div>
			</div>
		</header>
	</body>
</html>
