<?php

class MemberDAO
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=test", "root", "");

            // sql문이 에러난 경우에도 에러를 발생 시키기 위해
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //해당하는 id 가 이미 DB에 있는지 확인하기 위하여
    //해당 클래스의 $db 변수(this->db)의 prepare 결과를 저장할 객체를 만드는것을 잊지말 것
    //prepare 로 쓰는 것과 바로 query 로 전송하는것의 차이 알아두기
    function getMember($id)
    {
        try {
            // :id - place holder
            $pstmt = $this->db->prepare("SELECT * FROM member WHERE id=:id");
            $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pstmt->execute();

            //결과 하나를 배열로 만드는 명령어
            return $result = $pstmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    //DB에 데이터 저장
    function insertMember($id, $pw, $name, $nickname)
    {
        try {
            $pstmt = $this->db->prepare("INSERT INTO member VALUES (:id, :pw, :name, :nickname)");
            $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
            $pstmt->bindValue(":name", $name, PDO::PARAM_STR);
            $pstmt->bindValue(":nickname",$nickname,PDO::PARAM_STR);
            $pstmt->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
?>