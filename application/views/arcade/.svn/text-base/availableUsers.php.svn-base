
<table id="challengeList">
<?php 
	if ($users) {
		foreach ($users as $user) {
			if ($user->id != $currentUser->id) {
?>		
			<tr>
			<td> 
			<?php echo anchor("arcade/invite?login=" . $user->login, "Challenge ".$user->login) ?> 
			</td>
			</tr>

<?php 	
			}
		}
	}
?>

</table>