
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about us</title>
</head>
<link rel="stylesheet" href="new/css/all.css">


<style>
*{

margin: 0px;
 padding: 0px;
 box-sizing:border-box;
 font-family:sans-serif;
}
body{
width: 100%;
background: url(bk.png);

}
.title h1{

    text-align:center;
    padding-top: 50px;
    font-size: 42px;
    text-decoration:underline;


}
.title h1::after{
content:"";
height: 4px;
width: 230px;
background: color #000;
display:block;
margin:auto;



}

.services{

    width:85%;
    display:flex;
    justify-content: space-between;
    align-items:center;
    margin: 75px auto;
    text-align:center;
}
.card{
width:100%;
display:flex;
justify-content: space-between;
align-items:center;
flex-direction:column;
margin:0px 20px;
padding: 20px 20px;
background-color: #efefef;
border-radius 10px;
cursor: pointer;

}

.card:hover{

    background-color:#b8d4de;
transition:0.4s ease; 
}

.card .icon{
font-size:50px;
margin: bottom 10px;
color:blue;
}
.card h2{
font-size:28px;
margin-bottom:30px;
line-height:1.5;
color:red;



}

.button{
font-size:15px;
text-decoration:none;
color:#fff;
background-color: #2c677c;
padding:8px 12px;
border-radius:5px;
letter-spacing:1px;




}
.button:hover{
background-color:#c94f4f;
transition:0.4s ease;


}

@media screen and (max-width:940px){
.services{
display:flex;
flex-direction:column;

    
}
.card{
width:85%;
display:flex;
margin: 20px 0px;

}


    
}

p{

    font-family:sans-serif;

}


</style>
<body>

<div class="section">
    <div class="title">
    <h1 style="color:brown";>ABOUT US</h1>

</div>
<div class="services">
    <div class="card">
        <div class="icon">
            <i class="fa fa-book"></i>
        </div>
        <h2>OUR MISSION</h2>
       <p >Our mission is to provide a user-friendly and efficient online examination system that caters to the needs of educational institutions, businesses, and individuals. We aim to revolutionize the way exams are conducted by offering a seamless and secure platform that -</p>

       <a href="mession.php" class="button">Read more</a>
    </div>
    <div class="card">
        <div class="icon">
            <i class="fa fa-globe"></i>
        </div>
        <h2>OUR VISION</h2>
       <p>Our vision for the online examination system is to create a seamless and efficient platform that revolutionizes the way exams are conducted. We aim to provide a user-friendly and secure environment that caters to the needs of both students and educators.</p>
        <a href="vision.php" class="button">Read more</a>
    </div>
    <div class="card">
        <div class="icon">
            <i class="fa fa-pencil"></i>
        </div>
        <h2>OUR ACHIEVEMENTS</h2>
       <p>1. Increased accessibility: The online examination system has made it possible for students from remote areas or those with physical disabilities to participate in exams without any hindrance. This achievement has ensured equal opportunities for all students,.</p>
       <a href="achieve.php" class="button">Read more</a>
    </div>
    
</div>
</div>









</body>
</html>