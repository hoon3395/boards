<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>
<body>
    <fieldset>
        <legend>회원가입양식</legend>
        <table>
            <tr>
                <th>이름</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>아이디</th>
                <td><input type="text"></td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><input type="password"></td>
            </tr>
            <tr>
                <th>연락처</th>
                <td><input type="tel"></td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><input type="email"></td>
            </tr>
            <tr>
                <th>별명</th>
                <td><input type="nickname"></td> 
            </tr>
            <tr>
                <th></th>
                <td><input type="button" onclick="location.href='register.php'" value="가입"></td>
            </tr>
        </table>
    </fieldset>
</body>
</html>