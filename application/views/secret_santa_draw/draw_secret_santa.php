<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<body>
		<div class="box">
			<h4>Sortear Amigo Secreto</h4>
			<p>Sortea quem será amigo secreto de quem com as opções abaixo.</p>
			<form id="secret_santa_form" method="post" action="<?php echo base_url('sorteio/amigo_secreto')?>">
				<div class="form-group 0">
					<div>
						<label>Nome:</label>
						<input 
							type="text" 
							name="name[0]" 
							value="<?= (isset($name[0]) && $name[0]) ? $name[0] : ''?>"
						/>
					</div>
					<div>
						<label>Email:</label>
						<input 
							type="email" 
							name="email[0]" 
							value="<?= (isset($email[0]) && $email[0]) ? $email[0] : ''?>"
						/>
					</div>
				</div>
				<div class="form-group 1">
					<div>
						<label>Nome:</label>
						<input 
							type="text" 
							name="name[1]" 
							value="<?= (isset($name[1]) && $name[1]) ? $name[1] : ''?>"
						/>
					</div>
					<div>
						<label>Email:</label>
						<input 
							type="email" 
							name="email[1]" 
							value="<?= (isset($email[1]) && $email[1]) ? $email[1] : ''?>"
						/>
					</div>
				</div>

				<?php if(isset($name) && count($name) > 2) :?>
					<?php $lastnames = array_slice($name, 2);?>
					<?php $lastemail = array_slice($email, 2);?>
					<?php foreach($lastnames as $key => $n): ?>
						<div class="form-group <?= $key + 2 ?>">
							<div>
								<label>Nome:</label>
								<input 
									type="text" 
									name="name[<?= $key + 2 ?>]" 
									value="<?= $n ?>"
								/>
							</div>
							<div>
								<label>Email:</label>
								<input 
									type="email" 
									name="email[<?= $key + 2 ?>]" 
									value="<?= $lastemail[$key] ?>"
								/>
							</div>
							<div>
								<button 
									type="button" 
									class="remove-button <?= $key + 2 ?>"
									onclick="removeParticipant(<?= $key + 2 ?>)"
								>
									<i class="fa fa-times"></i>
								</button>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
				
				<button 
					class="add-button" 
					type="button"
					onclick="addParticipant()"
				>
					+ ADICIONAR PARTICIPANTE
				</button>
				
				<?php if(isset($result) && $result == TRUE): ?>
					<div class="box result">
						<h1><b>Amigos secretos sorteados e emails enviados com sucesso!</b></h1>
					</div>
				<?php elseif(validation_errors()): ?>
					<?php if(strpos(validation_errors(), "Email") !== FALSE): ?>
						<div class="box result">
							<?="<p class='error'><b>Algum dos participantes tem um email não valido.</b></p>"?>
						</div>
					<?php else: ?>
						<div class="box result">
							<?="<p class='error'><b>Pelo menos duas pessoas com nome e email preenchidos são necessárias para o sorteio.</b></p>"?>
						</div>
					<?php endif; ?>
				<?php endif;?>
				<button type="submit" class="submit-button">SORTEAR AMIGO SECRETO</button>
			</form>
		</div>
		<script type="text/javascript">
			var quantity = <?= (isset($name) && count($name) > 2) ? count($name) : 2 ?>;
			function addParticipant() {
				var div = document.createElement('div');
				div.className = `form-group ${quantity}`;
				div.innerHTML = `<div>
						<label>Nome:</label>
						<input 
							type="text" 
							name="name[${quantity}]" 
							value=""
						/>
					</div>
					<div>
						<label>Email:</label>
						<input 
							type="email" 
							name="email[${quantity}]" 
							value=""
						/>
					</div>
					<div>
						<button 
							type="button" 
							class="remove-button ${quantity}"
							onclick="removeParticipant(${quantity})"
						>
							<i class="fa fa-times"></i>
						</button>
					</div>
					`;

				var button = document.getElementsByClassName('add-button')[0];
				
				document.getElementById('secret_santa_form').insertBefore(div, button);

				quantity++;
			}

			function removeParticipant(pos){
				document.getElementsByClassName(`form-group ${pos}`)[0].remove();
				
				for(i = pos + 1; i < quantity; i++){
					document.getElementsByClassName(`form-group ${i}`)[0].className = `form-group ${pos}`;
					document.getElementsByName(`name[${i}]`)[0].setAttribute('name',`name[${pos}]`);
					document.getElementsByName(`email[${i}]`)[0].setAttribute('name',`email[${pos}]`);
					document.getElementsByClassName(`remove-button ${i}`)[0].setAttribute('onclick',`removeParticipant(${pos})`);
					document.getElementsByClassName(`remove-button ${i}`)[0].className = `remove-button ${pos}`;

					pos++;
				}

				quantity--;
			}
		</script>
	</body>
</html>
