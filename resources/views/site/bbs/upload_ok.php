<?php
	require_once("../member/MemberDao.php");

// 설정
$uploads_dir = './uploads';
$allowed_ext = array('jpg','jpeg','png','gif');
 
// 변수 정리
$error = $_FILES['myfile']['error'];
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type']; // 파일 형식
$size = $_FILES['myfile']['size']; // 파일 사이즈




$t = explode(".", $name); 
$ext = array_pop($t); 




// 오류 확인
if( $error != UPLOAD_ERR_OK ) {
	switch( $error ) {
		case UPLOAD_ERR_INI_SIZE:
		case UPLOAD_ERR_FORM_SIZE:
			echo "파일이 너무 큽니다. ($error)";
			break;
		case UPLOAD_ERR_NO_FILE:
			echo "파일이 첨부되지 않았습니다. ($error)";
			break;
		default:
			echo "파일이 제대로 업로드되지 않았습니다. ($error)";
	}
	exit;
}
 
// 확장자 확인
if( !in_array($ext, $allowed_ext) ) {
	echo "허용되지 않는 확장자입니다.";
	exit;
}
 
// 파일 이동
move_uploaded_file( $_FILES['myfile']['tmp_name'], "$uploads_dir/$name");


// 파일 정보 출력
echo "<h2>파일 정보</h2>
<ul>
	<li>파일명: $name</li>
	<li>확장자: $ext</li>
	<li>파일형식: {$type}</li>
	<li>파일크기: {$size} 바이트</li>
</ul>";

?>

<html>
<head>
	<title></title>
</head>
<body>
<button onclick="location.href='gallery.php'">목록으로</button>
</body>
</html>