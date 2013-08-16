<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	
</head>
<body>
	<table border = "1px" align = "center" width = "800">
		<th>ID</th>
		<th>Name</th>
		<th>Apartment</th>
		<th>Operation</th>
		<?php if(is_array($UserData)): $i = 0; $__LIST__ = $UserData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$User): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($User['id']); ?></td>
			<td><?php echo ($User['username']); ?></td>
			<td><?php echo ($User['apartment']); ?></td>
			<td> <a href = "__URL__/modify/id/<?php echo ($User['id']); ?>">edit</a> | <a href = "__URL__/del/id/<?php echo ($User['id']); ?>">delete</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<a href  = "__URL__/add">add</a>
	</table>
</body>
</html>