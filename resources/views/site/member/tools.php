<?php
/**
 * Created by PhpStorm.
 * User: LeeSJ
 * Date: 2018-09-13
 * Time: 오후 1:24
 */
//공통적으로 쓰는 함수들을 저장하기 위한 파일

// 상수 설정
define("LOGIN_PAGE", "login_form.php");
define("MAIN_PAGE", "mainpage.php");

//설정이 되었는지 안되었는지
function requestValue($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : "";
}

//에러가 발생하는 상황에서 출력할 메시지를 띄우고, 다시 이전페이지(history.back)을 하기위한 함수
function errorBack($msg)
{
    ?>
    <!doctype html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <script>
        alert("<?=$msg?>");
        history.back();
    </script>
    </body>
    </html>
    <?php
    exit();
}
?>

<?php

//전페이지로 돌아갈 상황이 아닐 떄(성공해서 다른 페이지로 이동하거나, 메인페이지에서 이동할 떄)
function goNow($url)
{
    ?>
    <!doctype html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <script>
        location.href = "<?= $url ?>";
    </script>
    </body>
    </html>
    <?php
}

    function okGo($msg, $url){
        ?>
        <script>
            alert('<?= $msg ?>');
            location.href = '<?= $url ?>';
            
        </script>
<?php
    }

    function readSessionVar($key){
        if(session_status() == PHP_SESSION_NONE){  //session이 실행되어 있는지 확인하는 내장함수 

            session_start(); // 세션이 실행되어 있지 않으면 세션 시작 
            $value = isset($_SESSION['$key'])?$_SESSION['$key']:"";  // value 값에 매개변수 $key값의 이름을 가진 SESSION 이 있으면 그 값을 넣고 없으면 공백 반환 
        }
        return $value; // $value 값 리턴

    }


function returnToMP($msg, $url)
{
    ?>
    <!doctype html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <script>
        alert("<?=$msg?>");
        location.href = "<?= $url ?>";
    </script>
    </body>
    </html>
    <?php
}
?>
