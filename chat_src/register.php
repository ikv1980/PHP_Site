<?php
 
//��������� ������ �� ������
if(isset($_POST['login']) && isset($_POST['password']))
{
//���������� ��� � ����������
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    $name=htmlspecialchars(trim($_POST['name']));
    $surname=htmlspecialchars(trim($_POST['surname']));
    $city=htmlspecialchars(trim($_POST['city']));
 
//��������� �� �������
    if($login=="" || $password=="" || $name=="" || $surname=="" || $city=="")
    {
        die("��������� ��� ����!");
    }
 
//���������� ���� ������
    include("bd.php");
 
//������� �� �� ���������� � ��������� ������
    $res=mysql_query("SELECT `login` FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
//���� �� �� ����, �� ������ ����� ��� ����
    if(!empty($data['login']))
    {
        die("����� ����� ��� ����������!");
    }
 
//��������� ����� ������
    if(strlen($password)<7)
    {
        die("����� ������ �� ����� ���� ������ 7 ��������!");
    }
 
//��������� ������ � �� 
    $query="INSERT INTO `users` (`login`,`password`,`name`,`surname`,`city`) VALUES('$login','$password','$name','$surname','$city') ";
    $result=mysql_query($query);
 
//���� ������ ������� �������� � �������
    if($result==true)
    {
        echo "�� ������� ����������������! <br><a href='index.php'>�� �������</a>";
    }
//���� �� ���, �� ������� ������
    else
    {
        echo "Error! ----> ". mysql_error();
    }
}
?>