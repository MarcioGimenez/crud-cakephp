<table>
	<thead>
		<tr>
			<th>id</th>
			<th>nome</th>
			<th>email</th>
			<th>ação</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $key => $usuario): ?>
		<tr>
			<td><?=$usuario->id?></td>
			<td><?=$usuario->name?></td>
			<td><?=$usuario->email?></td>
			<td>
				<a href="/users/edit/<?=$usuario->id?>">Alterar</a>
				<a href="/users/view/<?=$usuario->id?>">Visualizar</a>
				
				<form action="/users/delete/<?=$usuario->id?>" method="post">
					<input type="submit" name="deletar" value="Deletar">
				</form>
			</td>
		</tr>
	<?php endforeach;?>
</tbody>
</table>
<a href="/users/add">Novo Usuário </a>