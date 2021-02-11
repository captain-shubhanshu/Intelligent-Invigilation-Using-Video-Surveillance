<?php 

    $roll= $_POST['roll'];
    $name=$_POST['name'];
    $link_roll=mysqli_connect("sql105.epizy.com","epiz_25182485","dl5JGNt7Lp4","epiz_25182485_roll_no");
    if (mysqli_connect_error())
        {
            die("kuch error h");
        }
    $reg_roll="INSERT INTO Roll (entry)VALUES ('$roll');";
    mysqli_query($link_roll,$reg_roll);


    $link=mysqli_connect("sql105.epizy.com","epiz_25182485","dl5JGNt7Lp4","epiz_25182485_shreya");
    if (mysqli_connect_error())
        {
            die("kuch error h");
        }
    $reg="INSERT INTO seat (Roll_no,Name)VALUES ('$roll','$name');";
    mysqli_query($link,$reg);
    
?>

<html>
    <head>
        <title>smart_card</title>
    <head>
        <style>
            body{
                background-color:00FFFF;
            }
            h1,h2{
                text-align:center;
            }
            #c{
                text-align:center;
            }

            .hi{
                height:50px;
                width:400px;

            }
            #bi{
                margin-top:50px;
                width:100px;
                height:50px;
            }
            #images{
                display: block;
                margin-left: 600px;;
                margin-right: auto;
                width: 40%;
            }

        </style>
    </head>

    <body>
        <div id="images">
            <img src="https://jssaten.ac.in/img/JSS_Logo.png" height="300px" width="300px"></img>
        </div>

        <h1> !!!WELCOME TO JSS EXAMINATION PORTAL!!!</h1>
        <h1> GENERATE YOUR ADMIT CARD HERE </h1>
        <h2>Enter your university Roll number:</h2>
        <div id="c">
            <form method="POST">
                <input type="text" class="hi" id="ROLL" name="roll" placeholder="Enter your 10 digit roll number"> </input>
                <br>
                <br>
                <input type="text" class="hi" id="NAME"  name= "name" placeholder="Enter your Name" > </input>
                <br>
                <input type="submit"  id="bi"  value="Generate"></input>
            </form>
        </div>

        <script type="text/javascript">
        
        document.getElementById("bi").onclick=function() {
            //window.open("http://smartcard.epizy.com/admit_card.php");
        }
        </script>

    </body>
</html>
