                <?php
                session_start();
                $connect = mysqli_connect("localhost","root","","cityplan");
                $message = '';



                
                

                require('libs/rtables.php');

                


                

                    
                $pdf = new PDF_MC_Table('L','mm','A4');




                $pdf->AddPage();
            
                $pdf->SetFont('Times','B',9);
              
                
                
        //cell(width,heigh,text,border,endline,[align]);
                
                $pdf->ln(1);
                $pdf->SetWidths(Array(7,25,10,10,15,15,15,20,15,13,15,17,20,23,23,21,22));
                $pdf->SetLineHeight(12);
                
                //$qr = "SELECT customerID,CONCAT(Fname,' ',Lname,' ',midname)as jina,gender,Utambuzi,idno,CONCAT(0,phone)as namba,CONCAT('images/multimedia/',picture)as picha,picture,birthdate,north,south,west,east FROM customer inner join neighbor where customerID = idneighbor ORDER BY customerID ASC";
                $qr = "SELECT *FROM registry inner join plot where customerID = plotno";
                $result = mysqli_query($connect,$qr);
                $count = mysqli_num_rows($result);
                
                $pdf->Cell(7,15,'ID',1,0,false); // First header column 
                $pdf->Cell(25,15,'Jina la Miliki',1,0,false); // Second header column
              //  $pdf->Cell(30,10,'Jina la kati',1,0,true); // Third header column 
               // $pdf->Cell(30,10,'Jina la mwisho',1,0,true);
                $pdf->Cell(10,15,'Jinsia',1,0,false); // Second header column
                $pdf->Cell(10,15,'Umri',1,0,false); 
                $pdf->Cell(15,15,'Utambuzi',1,0,false); // Third header column 
                $pdf->Cell(15,15,'Ukubwa',1,0,false); // Third header column 
                $pdf->Cell(15,15,'matumizi',1,0,false); // Third header column
                $pdf->Cell(20,15,'mapendekezo',1,0,false); // Third header column 
 


                $pdf->Cell(15,15,'Kaskazini',1,0,false);
                $pdf->Cell(13,15,'Kusini',1,0,false);
                $pdf->Cell(15,15,'Mashariki',1,0,false);
                $pdf->Cell(17,15,'Mangharibi',1,0,false);
              //  $pdf->Cell(45,10,'Aina ya kitambulisho',1,0,true);
                $pdf->Cell(20,15,'kitambulisho',1,0,false); // Second header column
                $pdf->Cell(23,15,'Namba ya simu',1,0,false); // Third header column 
                $pdf->Cell(23,15,'Picha',1,0,false);
                $pdf->Cell(21,15,'Sahihi(mteja)',1,0,false);
                $pdf->Cell(22,15,'Sahihi(M/kiti)',1,1,false);
            
               
            
       
     
$n = 0;
            
            foreach($result as $row){ 

            $ui ;
            $n =$n+1;
          
            
            $dob = $row["birthdate"];
            $today = date("Y-m-d");
            $diff = date_diff(date_create($dob),date_create($today));
            
            $i;
            
                $i =  $row['picture'];
            
            if(file_exists($row['picha'])){
                $ui = $row['picha'];
                
               $pdf->setImageKey([14]);

            }
           
            if($i == ''){
                
               
               if($i== null|| $i==0){
             $i = "0.jpg";
               }else{
                $i=$i;
            }
                $pdf->setImageKey([14]);
 


            }
            
        
           
            $dbdata=array($n,
            // $row['Fname'],
            $row['jina'],
             //$row['Lname'],
       //  $row['midname'],
         $row['gender'],
         $diff->format('%y'),
          $row['Utambuzi'], 
          $row['plotsize'],
          $row['existingUse'],
          $row['proposedUse'],
          $row['north'],
          $row['south'],
          $row['east'],
          $row['west'],
         
       //  $row['idtype'],
         $row['idno'],
         $row['namba'],
        // $row['picha']
        "images/multimedia/$i",
    
     
     '',
     ''
             #$pdf ->ln();
         );
     
         
            
        $pdf->Row( $dbdata);    
    }  
           
            // $item['phone']

            
            
            
    
        for($i=1;$i<=40;$i++)
        $pdf->Cell(20,20,'Printing line number '.$i,0,1);
            $pdf->Output();
                
                ?>