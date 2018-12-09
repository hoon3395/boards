<?php
/**
 * Created by PhpStorm.
 * User: LeeSJ
 * Date: 2018-09-13
 * Time: 오후 2:26
 */

/*
 * 1. 로그인 입력폼엣 ㅓ전달된 아이디, 비밀번호 읽기
 * 2. 입력된 id 의 회원정보를 db 에서 찾기
 * 3. id를 가진 레코드가 있고 pw 가 맞으면 로그인 - > 세션에 로그인 정보 저장
 * (세션을 이용한다는 것은 항상 로그인 페이지에서 세션을 먼저 확인 한다는 뜻)
 * 4. 레코드 없거나 비밀번호 틀리면 로그인 폼페이지로 이동(에러 메시지 출력 후)
 */


/*
인증 (Authentication)
권한관리 (Authorization)
request에서 id, pw 추출
db에서 그 id와 pw 가진 레코드 있는지 확인하고
(select * from member where id = :id and pw = :pw)
=> id와 pw 값을 가지고 select 해도 되지만
: select * from member where id = $id and pw =:pw
=> 일반적으로는 id값만 가지고 select 해본다.
: select * from member where id = $id
있으면 session에 로그인 했음을 표시하는 정보 기록하고
main page로 이동
*/



require_once "memberPDO.php";
require_once "tools.php";

$id = requestValue("id");
$pw = requestValue("pw");

if ($id && $pw) {
    $mdao = new MemberDAO();
    $member = $mdao->getMember($id);

    if ($member) {

        if ($member["pw"] == $pw) {
            //로그인 성공
            //세션에 로그인 성공 정보를 기록 : 어떻게? 
            session_start(); // session 이 실행되어 있으면 기존의 session 사용, 없으면 session 시작

            $_SESSION["uid"] = $id; // session 변수 설정
            $_SESSION["name"] = $member["name"];

            goNow(MAIN_PAGE);
        } else {
            errorBack("비밀번호 확인");
        }
    } else {
        errorBack("아이디 확인");
    }
} else {
    errorBack("값 부족");
}
