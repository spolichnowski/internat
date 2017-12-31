<?php
	function change_room($number, $action)
	{
		if($action == '+')
		{
			return $number+1;
		}
		if($action == '-')
		{
			if($number==1)
			{
				return $number;
			}
			else
			{
				return $number-1;
			}
		}
	}
	if(@$_GET['comment']==1)
	{
		echo '<div class="alert alert-success alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Dodano uwagę
		</div>';
	}

		if(!empty(@$_GET['room_id']) && intval(@$_GET['room_id']>0))
		{
			$sql_students_list = 'SELECT * FROM `students` WHERE `room` LIKE '.intval(@$_GET['room_id']).';';
			echo '<h3 class="left">Pokój '.intval($_GET['room_id']).'</h3>';
			echo '
			<div class="right">
			<a href="userpanel.php?location=students&room_id='.change_room($_GET['room_id'],'-').'"><button class="button-style">Poprzedni pokój</button></a>
			<a href="userpanel.php?location=students&room_id='.change_room($_GET['room_id'],'+').'"><button class="button-style">Następny pokój</button></a>
			<a href="userpanel.php?location=students"><button class="button-style">Wszystkie pokoje</button></a>
			</div>
			';
		}
		else
		{
			$sql_students_list = 'SELECT * FROM `students`;';
		}
		$result = $base->query($sql_students_list);
		echo '<table class="table table-bordered table-hover table-margi">';

		echo'
			<tr>
				<th>Imię i Nazwisko</th>
				<th>Data urodzenia</th>
				<th>Pokój</th>
			</tr>';

		while($row = $result->fetch_row())
		{
			echo'
			<tr>
				<td><a href="userpanel.php?location=presence&student_id='.$row[0].'">'.$row[1].' '.$row[2].'</a></td>
				<td>'.$row[3].'</td>
				<td>'.$row[5].'</td>
			</tr>';
		}
		echo '</table>';
?>
