<?php
include("recursive.php");

function init()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aule";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

//perform login
function login($user, $pass)
{
    $sql = "SELECT username, password FROM utenti where username=? and password=? and attivo='si'";

    $conn = init();

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ss", $user, $pass);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($user, $pass);

        /* fetch value */
        if ($stmt->fetch()) {
            $_SESSION['user'] = $user;
            echo "Logged";
            header("location: ../index");
        } else {
            echo "Wrong password";
            header("location: ../login");
        }

        /* close statement */
        $stmt->close();
    }

    close($conn);
}

//am i an admin
function admin()
{
    $sql = "SELECT admin FROM utenti where username=?";

    $conn = init();

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("s", $_SESSION['user']);

        /* execute query */
        $stmt->execute();

        /* bind result variables */
        $stmt->bind_result($admin);

        /* fetch value */
        $stmt->fetch();

        /* close statement */
        $stmt->close();
    }

    close($conn);

    if ($admin == "si") return true;
    return false;
}

//look for my prenotazioni
function booking($all)
{
    $sql = "SELECT numero, nome, type, data 
			FROM prenotazioni p inner join aula a on p.aula=a.numero ";

    if (!$all)
        $sql = $sql . "where utente=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        if (!$all)
            $stmt->bind_param("s", $_SESSION['user']);

        /* execute query */
        $stmt->execute();

        /* instead of bind_result: */
        $result = $stmt->get_result();
    }

    close($conn);

    return $result;
}

//look for booking
function bookings($inizio, $fine, $type)
{
    $sql = "SELECT * 
			FROM prenotazioni p inner join aula a on p.aula=a.numero 
			inner join utenti u on p.utente=u.username 
			where a.type=? and p.inizio>=? and p.fine<=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("sss", $type, $inizio, $fine);

        /* execute query */
        $stmt->execute();

        /* instead of bind_result: */
        $result = $stmt->get_result();
    }

    close($conn);

    return $result;
}

//user list
function users()
{
    $sql = "SELECT * 
			FROM utenti
			where username<>?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("s", $_SESSION['user']);

        /* execute query */
        $stmt->execute();

        /* instead of bind_result: */
        $result = $stmt->get_result();
    }

    close($conn);

    return $result;
}

//room list
function rooms()
{
    $sql = "SELECT * 
			FROM aula";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* execute query */
        $stmt->execute();

        /* instead of bind_result: */
        $result = $stmt->get_result();
    }

    close($conn);

    return $result;
}

//messages list
function messages()
{
    $sql = "SELECT * 
			FROM messages
			where primo=? || secondo=?
			order by secondo, timestamp";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ss", $_SESSION['user'], $_SESSION['user']);

        /* execute query */
        $stmt->execute();

        /* instead of bind_result: */
        $result = $stmt->get_result();
    }

    close($conn);

    return $result;
}

//send message
function sendMessage($user, $messaggio)
{
    $sql = "insert into messages 
				values(?,?,?,?)";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ssss", $_SESSION['user'], $user, $messaggio, date("Y-m-d H:i:s"));

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//add user
function addUser($user, $pass, $name, $admin, $attivo)
{
    $sql = "insert into utenti 
				values(?,?,?,?,?)";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("sssss", $user, $pass, $admin, $name, $attivo);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//add room
function addRoom($nr, $name, $descrizione, $type)
{
    $sql = "insert into aula 
				values(?,?,?,?)";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ssss", $nr, $name, $descrizione, $type);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//delete message
function deleteMessage($id)
{
    $sql = "delete from messages 
				where id=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("s", $id);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//delete room
function deleteRoom($nr)
{
    $sql = "delete from aula 
				where numero=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("s", $nr);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//delete user
function deleteUser($user)
{
    $sql = "delete from utenti 
				where username=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("s", $user);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//delete booking
function deleteBooking($user, $aula)
{
    $sql = "delete from prenotazioni 
				where aula=? and utente=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ss", $user, $aula);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//change booking
function changeBooking($user, $aula, $stato)
{
    $sql = "update prenotazioni 
                set attiva=?
				where aula=? and utente=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("sss", $stato, $user, $aula);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//change user
function changeUser($user, $stato)
{
    $sql = "update utenti 
                set attivo=?
				where username=?";

    $conn = init();

    $result = null;

    if ($stmt = $conn->prepare($sql)) {

        /* bind parameters for markers */
        $stmt->bind_param("ss", $stato, $user);

        /* execute query */
        $stmt->execute();
    }

    close($conn);
}

//close sql
function close($conn)
{
    $conn->close();
}

?>