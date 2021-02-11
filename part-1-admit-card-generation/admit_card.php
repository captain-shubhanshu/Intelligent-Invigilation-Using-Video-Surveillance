<?php 
    
    $link_roll=mysqli_connect("sql105.epizy.com","epiz_25182485","dl5JGNt7Lp4","epiz_25182485_roll_no");
    if (mysqli_connect_error())
        {
            die("kuch error h");
        }
    $reg_roll="SELECT * FROM `Roll`";
    $req=mysqli_query($link_roll,$reg_roll);
    $row=mysqli_fetch_array($req);
    $a=$row["entry"];
    ##########
    $link=mysqli_connect("sql105.epizy.com","epiz_25182485","dl5JGNt7Lp4","epiz_25182485_shreya");
    if (mysqli_connect_error())
        {
            die("kuch error h");
        }
    $reg="SELECT * FROM `seat` where Roll_no = '$a'";
    $req=mysqli_query($link,$reg);
    $row=mysqli_fetch_array($req);
    $name=$row["Name"];
?>
<html>
    <head>
        <style>
            #customers {
                border-collapse: collapse;
                width: 50%;
            }
            #customers td, #customers th {
                border: 1px solid black;
            }
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
            #jss{
                margin-top: -70px;
            }
            .details{
                margin-top:20px;
                margin-bottom:40px;
                border: 3px solid black;
            }
            .photo{
                border: 1px solid black;
                height:120px;
                width:120px;
                float:right;
                margin-top:-120px;
                margin-right:50px;
            }
                #controller{
                margin-left:100px;
                margin-top:100px;
            }
        </style>
    </head>
<body>
    <h1 align="center"> Admit card </h1>
    <h1 align="center"> 2020-21 </h1><br>
    <div id="jss">
        <img src="https://tse1.mm.bing.net/th?id=OIP.6oKej2_Ymo6wmvSiahI2bQAAAA&pid=Api&rs=1&c=1&qlt=95&w=137&h=117">
    </div>
    <div class="photo">
    <?php 
            // Include the qrlib file 
            include 'phpqrcode/qrlib.php'; 
            $text = $a."\nYour room no is 201 in block AB_3"; 
            
            // $path variable store the location where to  
            // store image and $file creates directory name 
            // of the QR code file by using 'uniqid' 
            // uniqid creates unique id based on microtime 
            $path = 'images/'; 
            $file = $path.uniqid().".png"; 
            
            // $ecc stores error correction capability('L') 
            $ecc = 'L'; 
            $pixel_Size = 5; 
            $frame_Size = 10; 
            
            // Generates QR Code and Stores it in directory given 
            QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size); 
            
            // Displaying the stored QR code from directory 
            echo "<center><img src='".$file."'></center>";
            $reg_roll="TRUNCATE TABLE Roll";
            $req=mysqli_query($link_roll,$reg_roll);
    ?> 

    </div>
    <div class="details">
        <pre>
            <b>STUDENT'S NAME</b>: <?php echo($name) ?>
            <b>STUDENT ENROLLMENT NUMBER</b>: <?php echo($a) ?>
            <b>GENDER</b> : Female
            <b>EXAM CENTER </b>: JSS ACADEMY OF TECHNICAL EDUCATION , NOIDA
            <b>EXAM CENTER CODE</b>: 151
            <b>SESSION</b>: 2020-21
            <b>BRANCH</b>: ECE
        </pre>
    </div>

    <table id="customers" align="center">
        <tr>
            <th>SUBJECT CODE </th>
            <th>SUBJECT</th>
            <th>DATE</th>
            <th>TIME</th>
        </tr>
        <tr>
            <td>REC 701</td>
            <td>Data Communication</td>
            <td>12-12-2020</td>
            <td>8.30-11.30 am</td>
        </tr>
        <tr>
            <td>REC 702</td>
            <td>VLSI</td>
            <td>14-12-2020</td>
            <td>8.30-11.30 am</td>
        </tr>
        <tr>
            <td>REC 703</td>
            <td>Cloud Computing</td>
            <td>16-12-2020</td>
            <td>8.30-11.30 am</td>
        </tr>
        <tr>
            <td>REC 704</td>
            <td>Data Management</td>
            <td>18-12-2020</td>
            <td>8.30-11.30 am</td>
        </tr>
    </table>

    <div id="controller">
        Controller's signature><BR>
        <img src ="https://tse1.mm.bing.net/th?id=OIP.iG72zRFqu3CQwhF24OHmxwHaDI&pid=Api&P=0&w=368&h=156" height="50px" width="50px">
    </div>
     <script type="text/javascript">
       
        </script>
</body>
</html>