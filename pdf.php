<?php
session_start();
$conect = mysqli_connect("mwgmw3rs78pvwk4e.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","h7l9ehepp73f4lp6","qn81i2ospadx0b5v","jvkaflsb5i15egxa");


$message = '';
$pic = $_SESSION['src'];


$namba = $_SESSION["nam"];


 
 require('libs/fpdf/fpdf.php');
class PDF extends fpdf{


  function  setwatermark($txt1="",$txt2 = ""){

    $this->_outerText1 =$txt1;
    $this->_outerText2 = $txt2;


    
  }



}


		
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
$pdf->Image("images/alama.PNG",10,60,189);
$pdf->SetFont('Times','B',13);
$pdf->Cell(12);

$pdf->Image("images/utambuzi.PNG",5,10,200,45);
$pdf->ln(48);


//cell(width,heigh,text,border,endline,[align]);
$pdf->SetTextColor(50,50,90);
$pdf->Cell(190,8,'Taarifa za mmiliki wa kiwanja',1,1,'C',false);
$pdf->ln(1);
$qry = "SELECT * FROM customer WHERE customerID =  '$namba' ";
$resul = mysqli_query($connect,$qry);

while($row = mysqli_fetch_array($resul))
{
  $ui = $row['picture']; 
  $dob = $row["birthdate"];
							$today = date("Y-m-d");
							$diff = date_diff(date_create($dob),date_create($today));

$pdf->SetFont('Times','',12);
$pdf->Cell(60,7,'Jina la kwanza',0,0);
$pdf->Cell(87,7,$row['Fname'],1,1);
$pdf->Image("images/multimedia/$ui",160,68,40,38);
$pdf->ln(1);
$pdf->Cell(60,7,'Jina la kati',0,0);
$pdf->Cell(87,7,$row['Lname'],1,1);
$pdf->ln(1);
$pdf->Cell(60,7,'Jina la mwisho',0,0);
$pdf->Cell(87,7, $row['midname'],1,1);
$pdf->ln(1);
$pdf->Cell(25,7,'Jinsia',0,0);
$pdf->Cell(45,7,$row['gender'],1,0);
$pdf->Cell(30,7,'Umri',0,0,'C',false);
$pdf->Cell(47,7,$diff->format('%y'),1,1);
$pdf->ln(1);

$pdf->Cell(45,7,'Namba ya simu',0,0);
$pdf->Cell(20,7,'+255',1,0);
$pdf->Cell(82,7, $row['phone'],1,1);
$pdf->ln(2);
$pdf->Cell(25,7,'Uraia',0,0);
$pdf->Cell(50,7,$row['citizenship'],1,0);
$pdf->Cell(55,7,'Aina ya kitambulisho',0,0,'C',false);
$pdf->Cell(60,7,$row['idtype'],1,1);
$pdf->ln(1);
$pdf->Cell(55,7,'Namba ya kitambulisho',0,0);
$pdf->Cell(60,7,$row['idno'],1,1);
}


$pdf->SetFont('Times','B',13);
$pdf->ln(5);
$pdf->Cell(190,8,'Taarifa za kiwanja',1,1,'C',false);
$pdf->ln(1);
$pdf->SetFont('Times','',12);
$qry = "SELECT * FROM nyingine WHERE plotid = '$namba'";
$resul = mysqli_query($connect,$qry);

while($row = mysqli_fetch_array($resul))
{
$pdf->Cell(50,7,'Namba ya Utambuzi',0,0);
$pdf->Cell(100,7,$row['utambuzina'],1,1);
$pdf->ln(1);
}
$qry = "SELECT * FROM plot WHERE plotno = '$namba'";
$resul = mysqli_query($connect,$qry);

while($row = mysqli_fetch_array($resul))
{
$pdf->Cell(70,7,'Ukubwa wa kiwanja (mita za mraba)',0,0);
$pdf->Cell(80,7,$row['plotsize'],1,1);
$pdf->ln(1);
$pdf->Image($pic,163,138,35,50,'JPEG');
$pdf->ln(1);
$pdf->Cell(25,7,'Latitudo',0,0);
$pdf->Cell(40,7, $row['plotcoordinatesx'],1,0);

$pdf->Cell(25,7,'Longitudo',0,0,'C',false);
$pdf->Cell(50,7, $row['plotcoordinatesy'],1,1);
$pdf->ln(1);
}
$qryi = "SELECT * FROM neighbor WHERE plotnu = '$namba'";
$resulu = mysqli_query($connect,$qryi);

while($row = mysqli_fetch_array($resulu))
{
                      

$pdf->Cell(30,7,'Jirani Kaskazini',0,0);
$pdf->Cell(40,7,$row['north'],1,0);


$pdf->Cell(30,7,'Jirani Kusini',0,0);
$pdf->Cell(50,7,$row['south'],1,1);
$pdf->ln(1);
$pdf->Cell(30,7,'Jirani Mashariki',0,0);
$pdf->Cell(40,7,$row['east'],1,0);

$pdf->Cell(30,7,'Jirani Magharibi',0,0,'C',false);
$pdf->Cell(50,7,$row['west'],1,1);
$pdf->ln(1);

$qry = "SELECT * FROM nyingine WHERE plotid = '$namba'";
$resul = mysqli_query($connect,$qry);

while($row = mysqli_fetch_array($resul))
{
$pdf->Cell(35,7,'Matummizi ya sasa',0,0);
$pdf->Cell(35,7,$row['existuse'],1,0);

$pdf->Cell(35,7,'Mapendekezo',0,0,'C',false);
$pdf->Cell(35,7,$row['proposeduse'],1,1);
$pdf->ln(1);



$pdf->SetFont('Times','B',13);
$pdf->ln(5);
$pdf->Cell(190,8,'Taarifa zinginezo',1,1,'C',false);
$pdf->ln(1);
$pdf->SetFont('Times','',12);
$pdf->Cell(50,7,'Mjumbe / Balozi',0,0);
$pdf->Cell(100,7,$row['mjumbe1name'],1,1);
$pdf->ln(1);
$pdf->Cell(60,7,'mjumbe / balozi  ',0,0);
$pdf->Cell(90,7,$row['mjumbe2name'],1,1);
$pdf->ln(1);
$pdf->Cell(65,7,'Tarehe ya ukusanywaji taarifa',0,0);
$pdf->Cell(85,7,$row['daterecord'],1,1);
$pdf->ln(4);
$pdf->Cell(32,7,'Sahihi ya mmiliki',0,0);
$pdf->Cell(45,7,'.............................',0,0);
$pdf->Cell(34,7,'Sahihi ya mwenyekiti',0,0,'C',FALSE);
$pdf->Cell(45,7,'.............................',0,0);
$pdf->Cell(30,7,'Muhuri',0,1,'C',FALSE);

}
$pdf->SetFont('Times','B',13);
$pdf->ln(2);
$pdf->Cell(190,8,'Taarifa za kampuni ya mipango miji',1,1,'C',false);
$pdf->ln(1);
$pdf->SetFont('Times','',12);
$pdf->Cell(50,7,'Jina la kampuni',0,0);
$pdf->Cell(89,7,'CityPlan Consultants (t) Limited',1,1);
$pdf->ln(1);
$pdf->Cell(40,7,'S.L.P',0,0);
$pdf->Cell(55,7,'72235',1,1);
$pdf->ln(1);
$pdf->Cell(40,7,'Simu namba',0,0);
$pdf->Cell(55,7,'+255 22 2775312',1,1);
$pdf->ln(1);
$pdf->Cell(40,7,'Namba ya usajili',0,0);
$pdf->Cell(55,7,'56667',1,1);
$pdf->ln(1);
$pdf->Image("images/logo.PNG",160,260,40,20);


}





$pdf->Output();
  

   





    
  
       

     



     
    $qry = "SELECT * FROM customer WHERE customerID = '$namba'";
    $resul = mysqli_query($connect,$qry);



  while($row = mysqli_fetch_array($resul))
  {
    
    $dob = $row["birthdate"];
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dob),date_create($today));
      
      
      $ui = $row['picture']; 
       





require('libs/fpdf/fpdf.php');



		
$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont('Times','B',15);
$pdf->Cell(12);

$pdf->Image("images/utambuzi.PNG",5,10,200,45);
$pdf->ln(48);


//cell(width,heigh,text,border,endline,[align]);
$pdf->SetTextColor(50,50,90);
$pdf->Cell(190,8,'Taarifa za mmiliki wa kiwanja',1,1,'C',false);
$pdf->ln(2);

$pdf->SetFont('Times','',14);
$pdf->Cell(60,7,'Jina la kwanza',0,0);
$pdf->Cell(87,7,$row['Fname'],1,1);
$pdf->Image("images/multimedia/$ui",160,70,40,40);
$pdf->ln(2);
$pdf->Cell(60,7,'Jina la kati',0,0);
$pdf->Cell(87,7,$row['Lname'],1,1);
$pdf->ln(2);
$pdf->Cell(60,7,'Jina la mwisho',0,0);
$pdf->Cell(87,7, $row['midname'],1,1);
$pdf->ln(2);
$pdf->Cell(25,7,'Jinsia',0,0);
$pdf->Cell(45,7,$row['gender'],1,0);
$pdf->Cell(30,7,'Umri',0,0,'C',false);
$pdf->Cell(47,7,$diff->format('%y'),1,1);
$pdf->ln(2);

$pdf->Cell(45,7,'Namba ya simu',0,0);
$pdf->Cell(20,7,'+255',1,0);
$pdf->Cell(82,7,$row['phone'],1,1);
$pdf->ln(2);
$pdf->Cell(25,7,'Uraia',0,0);
$pdf->Cell(50,7,$row['citizenship'],1,0);
$pdf->Cell(55,7,'Aina ya kitambulisho',0,0,'C',false);
$pdf->Cell(60,7,$row['idtype'],1,1);
$pdf->ln(1);
$pdf->Cell(55,7,'Namba ya kitambulisho',0,0);
$pdf->Cell(60,7,$row['idno'],1,1);
  }

$pdf->SetFont('Times','B',15);
$pdf->ln(5);
$pdf->Cell(190,8,'Taarifa za kiwanja',1,1,'C',false);
$pdf->ln(2);
$pdf->SetFont('Times','',13);

$qryi = "SELECT * FROM plot WHERE plotno = '$namba'  ";
						$resulu = mysqli_query($connect,$qryi);
 
						   while($row = mysqli_fetch_array($resulu))
						   {
$pdf->Cell(70,7,'Ukubwa wa kiwanja (mita za mraba)',0,0);
$pdf->Cell(80,7,$row['plotsize'],1,1);
$pdf->ln(2);
$pdf->Cell(40,7,'Latitudo',0,0);
$pdf->Cell(50,7,$row['plotcoordinatesx'],1,0);
$pdf->Cell(5,7,'',0,0);
$pdf->Cell(40,7,'Longitudo',0,0);
$pdf->Cell(55,7,$row['plotcoordinatesy'],1,1);
$pdf->ln(2);
                           }
$qryi = "SELECT * FROM neighbor WHERE plotnu = '$namba'";
$resulu = mysqli_query($connect,$qryi);

while($row = mysqli_fetch_array($resulu))
{
$pdf->Cell(40,7,'Jirani Kaskazini',0,0);
$pdf->Cell(50,7,$row['north'],1,0);
$pdf->Cell(5,7,'',0,0);

$pdf->Cell(40,7,'Jirani Kusini',0,0);
$pdf->Cell(55,7,$row['south'],1,1);
$pdf->ln(2);
$pdf->Cell(40,7,'Jirani Mashariki',0,0);
$pdf->Cell(50,7,$row['east'],1,0);
$pdf->Cell(5,7,'',0,0);
$pdf->Cell(40,7,'Jirani Magharibi',0,0);
$pdf->Cell(55,7,$row['west'],1,1);
$pdf->ln(2);
$pdf->Cell(50,7,'Namba ya Utambuzi',0,0);
$pdf->Cell(100,7,$row['plotnu'],1,1);

$pdf->SetFont('Times','B',15);
$pdf->ln(5);
$pdf->Cell(190,8,'Taarifa zinginezo',1,1,'C',false);
$pdf->ln(2);
$pdf->SetFont('Times','',14);
$pdf->Cell(50,7,'Mjumbe / Balozi',0,0);
$pdf->Cell(100,7,'GEORGE MNAGAMBA',1,1);
$pdf->ln(2);
$pdf->Cell(60,7,'Jina la mkusanyaji taarifa ',0,0);
$pdf->Cell(90,7,'119246',1,1);
$pdf->ln(2);
$pdf->Cell(65,7,'Tarehe ya ukusanywaji taarifa',0,0);
$pdf->Cell(85,7,'18-7-2019',1,1);

$pdf->SetFont('Times','B',15);
$pdf->ln(5);
$pdf->Cell(190,8,'Taarifa za kampuni ya mipango miji',1,1,'C',false);
$pdf->ln(2);
$pdf->SetFont('Times','',14);

$pdf->ln(2);
$pdf->Image("images/logo.PNG",10,255,30);





}


$pdf->Output();
  

?> 
