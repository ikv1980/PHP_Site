<?php
 
//���� ������ ������ �� ���������
if(isset($_POST['login']) && isset($_POST['password']))
{
//������������ � ���� ������
    include("bd.php");
 
//���������� ��� � ����������
    $login=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
 
//������� �� ������� ���� � ������������ �� ������
    $res=mysql_query("SELECT * FROM `users` WHERE `login`='$login' ");
    $data=mysql_fetch_array($res);
 
//���� ������ ���, �� ����� ��� ���
    if(empty($data['login']))
    {
        die("������ ������������ �� ����������!");
    }
//���� ������ �� ���������
    if($password!=$data['password'])
    {
        die("��������� ������ �������!");
    }
//��������� ������������ ������
    session_start();
 
//���������� � ���������� login � id
    $_SESSION['login']=$data['login'];
    $_SESSION['id']=$data['id'];
//���������������� �� �������
    header("location: index.php");
}
 
?>