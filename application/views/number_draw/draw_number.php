<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="box">
			<h4>Sortear números</h4>
			<p>Crie um sorteio com as opções abaixo.</p>
			<form id="numbers_form" method="post" action="<?php echo base_url('sorteio/numeros')?>">
				<div class="form-group">
					<label>Quantidade de Numeros a serem sorteados:</label>
					<input 
						type="number" 
						min="1" 
						name="numbers" 
						value="<?= (isset($numbers) && $numbers) ? $numbers : 1?>"
					/>
				</div>

				<div class="form-group">
					<label>Entre</label>
					<input 
						type="number" 
						min="1" 
						name="minimun" 
						value="<?= (isset($minimun) && $minimun) ? $minimun : 1?>"
					/>
				</div>

				<div class="form-group">
					<label>e</label>
					<input 
						type="number" 
						min="1" 
						name="maximun" 
						value="<?= (isset($maximun) && $maximun) ? $maximun : 100?>"
					/>
				</div>
				
				<?php if(isset($result) && $result): ?>
					<div class="box result">
						<p><b>Resultado:</b> <?=$result?></p>
					</div>
				<?php elseif(validation_errors()): ?>
					<div class="box result">
						<?=validation_errors("<p class='error'><b>", "</b></p>")?>
					</div>
				<?php endif;?>
				<button type="submit" class="submit-button">CRIAR SORTEIO</button>
			</form>
		</div>
	</body>
</html>
