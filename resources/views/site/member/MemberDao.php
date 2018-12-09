<?php
class MemberDAO {
	private $db;

	public function __construct(){
		try{
			$this->db = new PDO("mysql:host=localhost;dbname=test","root","");
			$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			exit($e->getMessage());
		}

	}

		public function getMember($id){
			try{	

				$sql = "select * from member where id=:id"; // :id 는 플레이스홀더, 그자리를 나중에 줄거니까 비워두라는 뜻
				/* 준비하다, 실행준비, DB서버가 ...
				1.문법검사
				2.유효성검사
				3.실행계획 수립
				*/
				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":id",$id,PDO::PARAM_STR); // :id에 $id값을 넣고 데이터타입은 STR
				$pstmt->execute(); // 실행하거라
				$result = $pstmt->fetch(PDO::FETCH_ASSOC); // 결과 갖고온나 , fetch는 결과를 배열로
			}catch(PDOException $e){
				exit($e->getMessage());
			}

			return $result;
		}

		public function insertMember($id, $pw, $name, $nickname)
    {
        try {
            $pstmt = $this->db->prepare("INSERT INTO member VALUES (:id, :pw, :name, :nickname )");
            $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
            $pstmt->bindValue(":pw", $pw, PDO::PARAM_STR);
	   		$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
	   		$pstmt->bindValue(":nickname",$nickname,PDO::PARAM_STR);
	   		$pstmt->execute();

	   		/*
			$sql = "insert into member(name, pw, id) values(:name, :pw,:id)";
			$pstmt = $this->db->prepare($sql);
			$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
			$pstmt->bindValue(":id",$id,PDO::PARAM_STR);
			$pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);
			$pstmt->execute();


	   		 */
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    function updateMember($id, $pw, $name,$nickname){
		try{
			$sql = "update member set pw = :pw, name = :name, nickname = :nickname where id= :id";
			$pstmt = $this->db->prepare($sql);
				/* 준비하다, 실행준비, DB서버가 ...
				1.문법검사
				2.유효성검사
				3.실행계획 수립
				*/
			$pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);
			$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
			$pstmt->bindValue(":nickname",$nickname,PDO::PARAM_STR);
			$pstmt->bindValue(":id",$id,PDO::PARAM_STR);
			$pstmt->execute();
		}catch(PDOException $e){
			exit($e->getMessage());
		}
	}
/*
	function uploadPicture($imageblob,$name,$type,$size){
		try{
				$sql = "INSERT INTO gallery VALUES (:imageblob,:name, :type, :size)" ;
				$pstmt = $this->db->prepare($sql);

				$pstmt->bindValue(":imageblob",$imageblob,PDO::PARAM_STR);
				$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
				$pstmt->bindValue(":type",$type,PDO::PARAM_STR);
				$pstmt->bindValue(":size",$size,PDO::PARAM_STR);
				$pstmt->execute();


	}catch(PDOException $e){
		exit($e->getMessage());
	}
}
*/


	// 모든 파일정보 반환 (2차원 배열)
	// $sort 피드 기준으로 정렬, $dir는 정렬 방향(asc/desc)
	public function getFileList($sort, $dir){
		try{
			$query = $this->db->prepare("select * from gallery order by $sort $dir");
			$query->execute();
			$result = $query->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			exit($e->getMessage());
		}
		return $result;
	}


	public function addFileInfo($fname, $ftime, $fsize){
		try{
			$sql = "select fname from gallery where num=:num";
			$query = $this->db->prepare($sql);

			$query->bindValue(":num", $num, PDO::PARAM_INT);
			$query->execute();

			$result = $query->fetchColumn();

			//지정된 레코드 삭제
			$query = $this->db->prepare("delete from gallery where num=:num");

			$query->bindValue(":num",$num,PDO::PARAM_INT);
			$query->execute();

		}catch(PDOException $e){
			exit($e->getMessage());
		}
		return $result;
	}

	public function deleteFileInfo($num){
		try{
			$sql = "insert into webhard (fname, ftime, fsize) values(:fname, :ftime, :fsize)";
			$query = $this->db->prepare($sql);

			$query->bindValue(":fname", $fname, PDO::PARAM_STR);
			$query->bindValue(":ftime", $ftime, PDO::PARAM_STR);
			$query->bindValue(":fsize", $fsize, PDO::PARAM_INT);
			$query->execute();

		}catch(PDOException $e){
			exit($e->getMessage());
		}
	}	

}

?>