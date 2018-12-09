<?php
/**
 *
 */
class Database
{
  private $db;
  function __construct(){
    try{
      $this->db = new PDO("mysql:host=localhost;port=3307;dbname=test",'root','0000');
      $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      exit($e->getMessage());
    }
  }//end
  function select(){
    try {
      $sql = "select * from board2";
      $pstmt = $this->db->prepare($sql);
      $pstmt->execute();
      $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e.getMessage());
    }
    return $result;
  }//end
  function selectPageNumber(){
    try {
      $sql = "select count(*) as count from board2";
      $pstmt = $this->db->prepare($sql);
      $pstmt->execute();
      $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    return $result;
  }//end
  function selectPageMsg($startPage){
    try {
      $sql = "select * from board2 order by num desc limit :startPage, 10";
      $pstmt = $this->db->prepare($sql);
      $pstmt->bindValue(':startPage',$startPage,PDO::PARAM_INT);
      $pstmt->execute();
      $result = $pstmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      exit($e->getMessage());
    }
    return $result;
  }//end
  function insert(){
    try {
      $sql = "insert into board2() values()";
      $pstmt = $this->db->preapre($sql);
      $pstmt->execute();
    } catch (PDOException $e) {
      eixt($e->getMessage());
    }
  }//end
  function update(){
    try {
      $sql = "update bard2 set where";
      $pstmt = $this->db->prepare($sql);
      $pstmt->execute();
    } catch (PDOException $e) {
      exit($e->getMessage());
    }

  }//end
  function delete(){
    try {
      $sql = "delete from board2 where";
      $pstmt = $this->db->prepare($sql);
      $pstmt->execute();
    } catch (PDOException $e) {
      exit($e->getMessage());
    }

  }//end
}//end
?>