<h3>Login</h3>
<?php
echo $this->Form->create();
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->submit();
echo $this->Form->end();