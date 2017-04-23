<?php

echo $this->Form->create($usuario);
echo $this->Form->input('name');
echo $this->Form->input('username');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>
<a href="/users">Voltar </a>