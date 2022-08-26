<?php
$font="Arial.ttf";
$image=imagecreatefromjpeg("certificate.jpg");
$color=imagecolorallocate($image,81,86,190);
$name="Roshan";
$course="Web Designing";
imagettftext($image,100,0,1600,1600,$color,$font,$name);
imagettftext($image,60,0,1230,2000,$color,$font,$course);
imagejpeg($image,"Certificates/Roshan.jpg");
//$pdf=new FPDF('L','in',[11.7,8.27]);
//$pdf->AddPage();
//$pdf->Image("Certificates/".$join_id.".jpg",0,0,11.7,8.27);
//$pdf->Output("Certificates/".$join_id.".pdf","F");
imagedestroy($image);
?>