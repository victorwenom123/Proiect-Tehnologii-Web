<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat)
{
    $result = false;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    return $result;
}

function invalidUid($name)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    }
    return $result;
}


function pwdMatch($pwd, $pwdRepeat)
{
    $result = false;
    if ($pwd !== $pwdRepeat) {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $name, $email)
{
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /MVC-Project/public/login?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $pwd)
{
    $sql = "INSERT INTo users (usersName, usersEmail, usersPwd) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: /MVC-Project/public/login?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: /MVC-Project/public/login?error=none");
    exit();
}

function emptyInputLogin($username, $pwd)
{
    $result = false;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("location: /MVC-Project/public/login?error=wronglogin");
        exit();
    } else {
        $pwdHashed = $uidExists["usersPwd"];
        $UID = $uidExists["usersId"];
        $UNAME = $uidExists["usersName"];
        $checkPwd = password_verify($pwd, $pwdHashed);
        if ($checkPwd === false) {
            header("location: /MVC-Project/public/login?error=wronglogin");
            exit();
        } else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $UID;
            $_SESSION["username"] = $UNAME;
            header("location: /MVC-Project/public/home?error=loginsuceed");
            exit();
        }
    }
}