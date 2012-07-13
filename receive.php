<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>

<?php
	echo $_FILES['userfile']['name']."<br>";
	$file_name = iconv('utf-8','big5',$_FILES['userfile']['name']);
	//$file_name = $_FILES['userfile']['name'];
	
	echo $_FILES['userfile']['type']."<br>";
	$file_type = $_FILES['userfile']['type'];
	
	echo $_FILES['userfile']['size']."<br>";
	$file_size = $_FILES['userfile']['size'];
	
	echo $_FILES['userfile']['tmp_name']."<br>";
	$file_tmp_name = $_FILES['userfile']['tmp_name'];
	
	echo $_FILES['userfile']['error']."<br>";
	$file_error = $_FILES['userfile']['error'];
	/*
	foreach($_FILES['userfile'] as &$value)
	{
		echo $value."<br/>";
	}
	echo $_FILES['userfile'][0]."<br>";
	*/
	$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
	echo "$DOCUMENT_ROOT";
	echo "<hr />";
	
	//上傳檔案沒有錯誤
	if($_FILES['userfile']['error']==0)
	{
		//檔案上傳成功才覆蓋原圖檔
		//開啟檔案
		$fp=fopen("$DOCUMENT_ROOT/fileupload/upload/".$file_name,'w+');
		//**********************************************
	
		$fileplace="$DOCUMENT_ROOT/fileupload/upload/".$file_name;
		//建立要移動的位置
	
		$checK_move = move_uploaded_file($file_tmp_name,$fileplace);
		
		echo "<br/>file_tmp_name:$file_tmp_name<br/>";
		$fileplace = iconv('big5','utf-8',$fileplace);
		echo "<br/>fileplace:$fileplace<br/>";
	}

?>