<?php
if($_SESSION['status']!= 'guardian')
{
	session_destroy();
	header('Location:logowanie.php?error=security');
}
				echo '
				<form class="form-signin" method="post" action="" id="make_comment">
					<h3>Pole na uwagi</h3>
					<textarea name="comment" form="make_comment" cols="50" rows="10" placeholder="Tutaj wpisz swoją uwagę."></textarea> <br>
					<div class="right">
					<a><button class="button-style">Prześlij uwagę</button></a>
					<a href="userpanel.php?location=students"><button class="button-style">Anuluj</button></a>
					</div>
				</form>
				 <br>
				';
				if(!empty($_POST))
				{
					if(strlen(@$_POST['comment']) < 30)
					{
						echo 'Wpisz conajmniej 30 znaków w opisie';
					}
					else
					{
						$sql_comment = 'INSERT INTO `comments` (id_student, description, id_guardian)
						VALUES ('.$_GET['student_id'].',"'.$_POST['comment'].'",'.$_SESSION['id'].')
						';
						$base->query($sql_comment);
						header("Location:userpanel.php?location=students&comment=1");
					}
				}

?>
