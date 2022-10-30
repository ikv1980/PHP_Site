<!-- ����� ��� ����� � �����������!-->
<style>
#messages
{
	width:300px;
	height:150px;
	overflow:auto;
	border:1px solid silver;
}
</style>

<!--���������� Jquery!-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript">
	//��������� ���������� JQuery
	google.load("jquery", "1.3.2");
	google.load("jqueryui", "1.7.2");
	
	//������� �������� ���������
	function send()
	{
		//��������� ��������� �� ���� ����� � id mess_to_add
		var mess=$("#mess_to_send").val();
		// �������� �������
       $.ajax({
                type: "POST",
                url: "add_mess.php",
                data:"mess="+mess,
                // ������� �� ��� ������ PHP
                success: function(html)
				{
					//���� ��� �������, ��������� ���������
					load_messes();
					//������� ����� ����� ���������
					$("#mess_to_send").val('');
                }
        });
	}
	
	//������� �������� ���������
	function load_messes()
	{
		$.ajax({
                type: "POST",
                url:  "load_messes.php",
                data: "req=ok",
                // ������� �� ��� ������ PHP
                success: function(html)
				{
					//������� ����� �����
					$("#messages").empty();
					//������� ��� ������ ��� php
					$("#messages").append(html);
					//������������ ���� ����(���� ��������� �����)
					$("#messages").scrollTop(90000);
                }
        });
	}
</script>

<table>
<tr>
<td>
<div id="messages">
</div>
</td>
</tr>
<tr>
<td>
<form action="javascript:send();">
<input type="text" id="mess_to_send">
<input type="button" value="���������">
</form>
</td>
</tr>
</table>

<script>
//��� �������� �������� ���������� ���������
load_messes();
//������ ���� �� ������ ��� �������
setInterval(load_messes,3000);
</script>
