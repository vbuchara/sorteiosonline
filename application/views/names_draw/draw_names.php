<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="box">
			<h4>Sortear nomes</h4>
			<p>Crie um sorteio com as opções abaixo.</p>
			<form id="names_form" method="post" action="<?php echo base_url('sorteio/nomes')?>">
				<div class="form-group">
					<label>Quantidade de pesoas a serem sorteadas:</label>
					<input 
						type="number" 
						min="1" 
						name="numbers" 
						value="<?= (isset($numbers) && $numbers) ? $numbers : 1?>"
					/>
				</div>

				<div class="form-group">
					<label>Nomes dos sorteados <b>(Separe cada nome por ";")</b></label>
					<textarea    
						name="names" 
					><?= (isset($names) && $names) ? $names : '' ?></textarea>
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
