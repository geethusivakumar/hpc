<?php
session_start();
include 'includes/__dbconnect.php';
$sel2=mysqli_query($conn01,"select user_id  from userlogin where username='".$_SESSION['username']."'");
$row2=mysqli_fetch_array($sel2); 
if(isset($_POST['submitquiz'])){
    $y=explode(",",@$_SESSION['qn']);
    $right=0;
    $wrong=0;
    $no_attempt=0;
    for($i=0;$i<$_SESSION['totalqn'];$i++)
    {
    $query=mysqli_query($conn01,"SELECT * FROM questions WHERE qn_id=".$y[$i]);
    $res=mysqli_fetch_array($query);
  
    if($_POST[$res['qn_id']]==$res['answer']){
      $right++;
    }else if(@$_POST[$res['qn_id']]=='none'){
      $no_attempt++;
    }else{
      $wrong++;
    }
  
}
  $total=$right+$wrong+$no_attempt;
  $score=($right*100)/($total);
  $ins=mysqli_query($conn01,"INSERT INTO test_result(test_id, user_id, right_ans, wrong_ans, no_attempt, score) VALUES(".$res['quiz_id'].",".$row2['user_id'].",".$right.",".$wrong.",".$no_attempt.",".$score.")" );
  if($ins)
  {
  echo "<script>
		alert('Submitted successfully');
		document.location='employeedashboard';
		</script>";
	}
    else
	{
		echo "<script>
		alert('Database Error');
		document.location='employeedashboard';
		</script>";
	}
}