<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;



}
body{
 background-image: url(bk.png);
  background-size: cover;
  color: white;
font-family:'poppins' sans-serif;
width:100%;
min-height:100vh;
display:grid;
place-items:center;



}
.row{
width:80%
max-width:1170;
display:grid;
grid-template-columns:repeat(2,1fr);
grid-gap:50px 30px;

}

.row .left{

    overflow:hidden;
    
}


.row .left img{



    width: 100%;
    height: 100%;
    object-fit:cover;

}

.row .right{


    display:flex;
align-items:center;

}

.row .right .contant {
    padding-right:20px;



}
.row .right .content p{
font-size: 16px;
line-height:26px;
padding



}
@media (max-width:991px){

.row .right .content p{
    padding-left:0;
}

@media (max-width:768px){

    .row{
        grid-template-columns:1fr;
    

        width:90%;
        
    }
}


</style>

<body>
    <div class="row">
        <div class="left">
            <img src="stu.jpg" alt="">
        </div>


        <div class="right">
            <div class="content">
                <p> <b>OUR VISION</b> for the online examination system is to create a seamless and efficient platform that revolutionizes the way exams are conducted. We aim to provide a user-friendly and secure environment that caters to the needs of both students and educators.

Our vision is to eliminate the traditional paper-based examination process and replace it with an online system that offers convenience, flexibility, and accessibility. Students will be able to take exams from anywhere, at any time, using their own devices. This will not only save time and resources but also reduce the stress associated with physical exam venues.

We envision a system that ensures fairness and integrity in the examination process. Our platform will incorporate advanced security measures to prevent cheating or any form of malpractice. It will include features such as remote proctoring, plagiarism detection, and randomized question banks to maintain the authenticity of exams.

Furthermore, our vision includes providing real-time feedback and performance analysis to both students and educators. Students will receive immediate results upon completion of their exams, allowing them to track their progress and identify areas for improvement. Educators will have access to comprehensive analytics that enable them to assess student performance on an individual or group level.

We strive to create a collaborative learning environment where educators can easily create, manage, and grade exams. Our platform will offer a range of question types, including multiple-choice, essay-based, or interactive questions, ensuring diverse assessment methods.

</p>
             </div>
        
        
        
        </div>
    </div>
</body>
</html>