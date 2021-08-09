<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<body>
		<main>
			<?=$draw_number?>
			<div class="box">
				<h4>Sortear nomes</h4>
				<p>Crie um sorteio de nomes. Informe quantos serão selecionados, os nomes e realize o sorteio!</p>
				<button 
					class="submit-button" 
					onclick="location.href='<?php echo base_url('sorteio/nomes') ?>'" 
					type="button"
				>
					CRIAR SORTEIO DE NOMES
				</button>
			</div>
			<div class="box">
				<h4>Sortear amigo secreto</h4>
				<p>
					Crie um sorteio de amigo secreto simplificado. Informe o nome e email dos amigos, e deixe a nossa ferramenta
					sortear e enviar para os emails o amigo secreto de cada um.
				</p>
				<button 
					class="submit-button" 
					onclick="location.href='<?php echo base_url('sorteio/amigo_secreto') ?>'" 
					type="button"
				>
					CRIAR AMIGO SECRETO
				</button>
			</div>
		</main>
	</body>
</html>
