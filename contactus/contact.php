
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact us page</title>
</head>
    <link rel="stylesheet" href="new/css/all.css">

<style>
body{

    padding: 0%;
    margin: 0%;
    font-family: sans-serif;
}
.container{


    width: 90%;
    margin: auto;
    overflow: hidden;
}
#contact-section{

    background: linear-gradient(rgba(82, 16, 204, 0.6),rgba(0,0,0,0.9)),url(bk.png);
    background-size: cover;
    background-position: center;
    height: 100%;
    width: 100%;
    padding: 2%;

}
#contact-section .container h2{
text-align: center;
text-decoration: underline;
text-underline-position: under;
color: rgb(238,235,235);
letter-spacing: 2px;

}
#contact-section .container p{


    text-align: center;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    padding-bottom: 3px;
    color: #fff;
    letter-spacing: 3px;

}
.contact-form i.fa{

font-size: 22px;
padding: 2%;
background-color: none;
margin: 2%;
border-radius: 80%;
cursor: pointer;
border: 2px solid ;
color: rgb(190, 190, 190);


}
.contact-form i.fa:hover{


    cursor: pointer;
    border: 2px solid #fff;
    color: #fff;
}

.contact-form{

display: grid;
grid-template-columns: auto auto;
grid-gap: 5px;


}


.font-info{

font-size: 16px;
font-style: italic;
color: #fff;
letter-spacing: 2px;



}
input{
padding: 10px;
margin: 10px;
width: 70%;
background-color: rgba(136, 133, 133, 0.5);
color: #fff;
border: none;
outline: none;

}
input::placeholder{

    color: #fff;

}
textarea{
padding: 10px;
margin: 10px;
width: 70%;
background-color: rgba(136, 133, 133, 0.5);
color: #fff;
border: none;
outline: none;

}


textarea::placeholder{
color: #fff;


}

.submit{

width: 40%;
background: none;
padding: 4px;
outline: none;
font-size: 13px;
font-weight: bold;
letter-spacing: 2px;
height: 33px;
text-align: center;
cursor: pointer;
letter-spacing: 2px;
margin-left: 3%;
border: 2px solid rgb(190, 190, 190);
color:rgb(190, 190, 190);



}
.submit:hover{

border: 1px;
color: #fff;
cursor: pointer;

}



@media (max-width: 768px){

#contact-section .contact-form{


    display: block;
    width: 100%;
    text-align: center;
}

a{


    color: #fff;
}






}


</style>
<body><?php
// require '../nav.php'; ?>
    <section id="contact-section">
<div class="container">
    <h2>Contact us</h2>
    <p>Email us and keep upto date with our latest news</p>
    <div class="contact-form">


        <div>
<a href="#"><i style="color:red"; class="fa fa-map-marker"></i></a><span style="color:#fff;" class="form-info"><a style="color:#fff "; href="map.php">Arbaminch University</a> </span><br>
<a href="+251942413838"><i style="color:red"; class="fa fa-phone"></i></a><span style="color:#fff;" class="form-info"><a style="color: #fff;" href="+251942413868">Phone No:+251942413868</a> </span><br>
<a href="amanueltafesse421@gmail.com"><i style="color:#fff"; class="fa fa-envelope"></i></a><span style="color:#fff;" class="form-info">amanueltafesse421@gmail.com</span><br>


        </div>
        <div>
        <form method="post">
            <input type="text" name="firstN" placeholder="First name" required>
            <input type="text" name="secondN" placeholder="Last name" required>
            <input type="Email" name="email" placeholder="email" required>
            <textarea name="message" id="" rows="10" required></textarea>
            <input type="submit" name="submit" value="Send" class="submit"></input>
        </form>
<?php
if (isset($_POST["submit"])) {
    $firstname = $_POST['firstN'];
    $seondname = $_POST['secondN'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    require_once '../database.php';

    $database = new Database();
    $database->addContactMessage($firstname, $seondname, $email, $message);
    $database->closeConnection();

}
?>
        </div>
    </div>
</div>



    </section>
</body>
</html>