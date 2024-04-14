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



</style>

<body>
    <div class="row">
        <div class="left">
            <img src="stud.jpg" alt="">
        </div>


        <div class="right">
            <div class="content">
        <p><b>OUR ACHIEVEMENTS ARE</b>
1. Increased accessibility: The online examination system has made it possible for students from remote areas or those with physical disabilities to participate in exams without any hindrance. This achievement has ensured equal opportunities for all students, regardless of their geographical location or physical limitations.

2. Enhanced efficiency: The online examination system has significantly improved the efficiency of the examination process. It has eliminated the need for manual paper checking, reducing the time and effort required by teachers and examiners. This achievement has allowed for faster result processing and timely feedback to students.

3. Reduced costs: By eliminating the need for printing question papers, answer sheets, and other exam-related materials, the online examination system has helped educational institutions save a significant amount of money. This achievement has allowed schools and colleges to allocate their resources more effectively towards other educational initiatives.

4. Improved security: The online examination system has implemented robust security measures to prevent cheating or malpractice during exams. Features such as randomized question order, time limits, and anti-cheating algorithms have ensured a fair evaluation process. This achievement has instilled confidence in both students and educational institutions regarding the integrity of the examination system.

5. Real-time analytics: The online examination system provides real-time analytics on student performance, allowing teachers to identify areas where students are struggling or excelling. This achievement has enabled personalized learning experiences and targeted interventions to improve overall academic outcomes.

</p>        
        
        </div>
        
        
        
        </div>
    </div>
</body>
</html>