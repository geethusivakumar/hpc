<?php
session_start();
include 'includes/__dbconnect.php';
$chapters=mysqli_query($conn01,"select * from coursedetails where courseid=".$_GET['cid']."");
?>
<label class="form-label fw-bold">Select Chapter</label>
                                                <select class="form-select" aria-label="Default select example" name="chapter_id">
                                                        <?php
                                                        while($chapterdetails=mysqli_fetch_array($chapters))
                                                        {
                                                        ?>
                                                      <option value="<?php echo $chapterdetails['chapter_id'] ?>"><?php echo $chapterdetails['chaptername'] ?></option>
                                                      <?php
                                                        }
                                                        ?>
                                                </select>