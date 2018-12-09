<?php
//require_once 는 한번만 불러옴
require_once "tools.php";
require_once "memberPDO.php";
require_once "memberForm.php";

$id = requestValue("id");
$pw = requestValue("pw");
$name = requestValue("name");
$nickname = requestValue("nickname");

if ($id && $pw && $name && $nickname) {
    $mdao = new MemberDAO();
    if ($mdao->getMember($id)) {
        // 에러 메시지 출력하고 폼 페이지로 이동
        errorBack("이미 사용중인 아이디");
    } else {
        
        //가입 완료 후 메인 페이지로
        $mdao->insertMember($id, $pw, $name, $nickname);
        returnToMP("가입 완료", MAIN_PAGE);
    }
} else {
    errorBack("입력 내용 부족");
    header("Location: memberForm.php");
}
?>