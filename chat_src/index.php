<html>
 
<title>���</title>
 
<head>
</head>
 
<body>
<?php
//��������� ������ ��� ������ � ����� �������
session_start();
//���� ����������� ����� � ����,
//���������� ����� ����� � �����������
if(!isset($_SESSION['login']) || !isset($_SESSION['id']))
{
?>
<center>
<form action="register.php" method="POST">
<h3>�����������</h3>
�����: <br> <input type="text" name="login">
<br>
������: <br> <input type="password" name="password">
<br>
���: <br> <input type="text" name="name">
<br>
�������: <br> <input type="text" name="surname">
<br>
�����: <br> <input type="text" name="city">
<br>
<input type="submit" value="������������������">
</form>
 
<form action="login.php" method="POST">
<h3>����</h3>
�����: <br> <input type="text" name="login">
<br>
������: <br> <input type="password" name="password">
<br>
<input type="submit" value="����">
</form>
</center>
<?php
}
//���� ������ ��������, �� ���� ������������ ����� 
//�����, � � ��� ���� ����� � ����
//�� ���������� ������� ������������
//��� ����� ������� �� ���� ��� ������ �� ������
//� ������� �� �� ��������
if(isset($_SESSION['login']) && isset($_SESSION['id']))
{
 
    include("bd.php");
    $user=$_SESSION['login'];
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$user' ");
    $user_data=mysql_fetch_array($res);
 
    echo "<center>";
    echo "��� �����: <b>". $user_data['login']."</b><br>";
    echo "���� ���: <b>". $user_data['name']."</b><br>";
    echo "���� �������: <b>". $user_data['surname']."</b><br>";
    echo "����� ����������: <b>". $user_data['city']."</b><br>";
    echo "<a href='exit.php'>�����</a>";
	include("chat.php");
    echo "</center>";
}
?>
</body>
 
</html>