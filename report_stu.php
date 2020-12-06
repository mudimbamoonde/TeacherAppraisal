<?php include "includes/hearder.php"; ?>
<!-- Start feature Area -->
<br xmlns="http://www.w3.org/1999/html">
<br>
<br>
<?php
if (isset($_POST["teacher"])) {
    header('location:report_stu.php?tid='.$_POST["teacher"].'& uid='.$_POST["user"]);
} ?>
<?php if ($_GET["uid"]=='pupil'){ ?>
<section class="feature-area" id="service">
    <div class="container">
        <img src="img/coat.png" width="150" height="150" style="margin-left: 454px"/>
        <h1 style="margin-left: 350px; color:blue">Learners Evaluated Sheet</h1>
        <hr>
        <div class="row justify-content-between">
            <!-- Enrolment Form -->
            <div  class="col-lg-12 col-md-12 booking-right" id="cat">
                <?php
                //Get teacher ID


                $id = $_GET["tid"];
                $user = $_GET['uid'];

                $sql ='SELECT*FROM sysuser WHERE sysID=?';
                $mysql = $connect->prepare($sql);
                $mysql->bindValue(1,$id);
                $mysql->execute();

                $row = $mysql->fetch(PDO::FETCH_OBJ);
                $name = $row->firstName;
                $sname = $row->surname;
                $position = $row->position;

                if ( $position == 'standOffice' || $position == 'hod' || $position == 'learner' ){
                    header("location:report_t.php");
                }

                ?>
                <h2 class="mb-20 text-uppercase"><?php echo $name." ".$sname; ?></h2>
                <?php
                if (isset($_POST["sbt_sign"])){
                    $comment = $_POST["comment"];
                    $ti  = $_GET["tid"];
                    /*
                     * commentID
                     * commentText
                     * userid
                     * */
                    $sql = "INSERT INTO comments(commentID,commentText,userid) VALUES(?,?,?)";
                    $mq = $connect->prepare($sql);
                    $mq->bindValue(1,null);
                    $mq->bindValue(2,$comment);
                    $mq->bindValue(3,$ti);
                    if ($mq->execute()) {
                        echo "<div class='alert alert-success'>Recorded Successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Failed to record</div>" . $mq->errorInfo();
                    }
                }
                ?>
                <form method="post">
                    <table class="table table-bordered">
                        <thead class="bg-dark text-white">
                        <tr>
                            <th>Variables <?php if ($_SESSION["position"]=='master' OR $_SESSION["position"]=='standOffice'){?><a href="print.php?tid=<?php echo $_GET["tid"]?> & uid=pupil" class="btn btn-danger fa fa-print"> Print</a> |
                                <a href='#'  class="btn btn-danger fa fa-comment" id='moreD' data-toggle="modal" data-target="#moreDatails">Add Comment</a> <?php }?>
                            </th>
                            <th>Marks</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $sql1 = "SELECT es.Mark, es.userid,catID,VariableName FROM evaluationsheet AS es
                                  INNER JOIN learnerssheet AS ls ON ls.sheetID = es.catID  WHERE userid=:tid AND Byuser=:uid";
                        $mysql2 = $connect->prepare($sql1);
                        $mysql2->bindParam(":tid",$_GET['tid']);
                        $mysql2->bindParam(":uid",$user);
                        $mysql2->execute();
                        $total = 0;
                        $ro = 0;
                        while($row= $mysql2->fetch(PDO::FETCH_OBJ)){
                            $ro++;
                            $Mark = $row->Mark;
                            $VariableName = $row->VariableName;
                            $total += $row->Mark;
                            echo "<tr>
                               <td>$VariableName</td>
                               <td>$Mark</td>
                            </tr>";

                        }

                        ?>
                        <tr class="bg-danger text-uppercase text-white">
                            <td></td>
                            <td><b class="text-black">Total: </b><?php echo $total ?>  Marks</td>
                        </tr>

                        </tbody>

                    </table>
                    <h1>Comments</h1>
                    <?php
                      $sele = $connect->prepare("SELECT*FROM comments WHERE userid=?");
                      $sele->bindValue(1,$_GET["tid"]);
                      $sele->execute();
                      if ($sele->rowCount()>0) {
                          while ($r = $sele->fetch(PDO::FETCH_OBJ)) {
                              echo "<div class='alert alert-warning'><b>CommentID:</b> <b>$r->commentID</b> <br> $r->commentText</div>";
                          }
                      }else{
                          echo "<div class='alert alert-info'>No comments</div>";
                      }
                    ?>
                    <!--    Modal Display-->
                    <div class="modal fade" id="moreDatails" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="firefoxModalLabel">ADD COMMENT: <?php echo  $name." ".$sname; ?> </h4>
                                </div>
                                <div class="modal-body">

                                    <form action="report_stu.php" method="post">
                                        <textarea name="comment" cols="60" rows="10"></textarea>
                                        <input type="submit" class="btn btn-primary" name="sbt_sign" value="Submit">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--    End of Display Modal-->
                </form>

            </div>

        </div>


    </div>
</section>
<!-- End feature Area -->
<?php }?>

<!--Supper model-->
<?php if ($_GET["uid"]=='super'){ ?>
    <section class="feature-area" id="service">
        <div class="container">
            <img src="img/coat.png" width="150" height="150" style="margin-left: 454px"/>
            <h1 style="margin-left: 350px; color:blue">Departmental Evaluation Sheet</h1>
            <hr>
            <div class="row justify-content-between">
                <!-- Enrolment Form -->
                <div  class="col-lg-12 col-md-12 booking-right" id="cat">
                    <?php
                    //Get teacher ID


                    $id = $_GET["tid"];
                    $user = $_GET['uid'];

                    $sql ='SELECT*FROM sysuser WHERE sysID=?';
                    $mysql = $connect->prepare($sql);
                    $mysql->bindValue(1,$id);
                    $mysql->execute();

                    $row = $mysql->fetch(PDO::FETCH_OBJ);
                    $name = $row->firstName;
                    $sname = $row->surname;
                    $position = $row->position;

                    if ( $position == 'standOffice' || $position == 'hod' || $position == 'learner' ){
                        header("location:report_t.php");
                    }


                    $op = $connect->prepare("SELECT*FROM hodform WHERE ");

                    ?>
                    <h2 class="mb-20 text-uppercase"><?php echo $name." ".$sname; ?></h2>
                    <?php
                    if (isset($_POST["sbt_sign"])){
                        $comment = $_POST["comment"];
                        $ti  = $_GET["tid"];
                        /*
                         * commentID
                         * commentText
                         * userid
                         * */
                        $sql = "INSERT INTO comments(commentID,commentText,userid) VALUES(?,?,?)";
                        $mq = $connect->prepare($sql);
                        $mq->bindValue(1,null);
                        $mq->bindValue(2,$comment);
                        $mq->bindValue(3,$ti);
                        if ($mq->execute()) {
                            echo "<div class='alert alert-success'>Recorded Successfully</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Failed to record</div>" . $mq->errorInfo();
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                            <tr>
                                <th>Variables
                                    <?php if ($_SESSION["position"]=='master' OR $_SESSION["position"]=='standOffice'){?>
                                        <a href="print.php?tid=<?php echo $_GET["tid"]?> & uid=super" class="btn btn-danger fa fa-print"> Print</a> |
                                    <a href='#'  class="btn btn-danger fa fa-comment" id='moreD' data-toggle="modal" data-target="#moreDatails">Add Comment</a>
                                    <?php } ?>
                                </th>
                                <th>Marks</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql1 = "SELECT es.Mark, es.userid,es.catID,VariableName FROM evaluationsheet AS es
                                  INNER JOIN questionsheet AS ls ON ls.catID = es.catID  WHERE es.userid=:tid AND es.Byuser=:uid";
                            $mysql2 = $connect->prepare($sql1);
                            $mysql2->bindParam(":tid",$_GET['tid']);
                            $mysql2->bindParam(":uid",$user);
                            $mysql2->execute();
                            $total = 0;
                            $ro = 0;
                            while($row= $mysql2->fetch(PDO::FETCH_OBJ)){
                                $ro++;
                                $Mark = $row->Mark;
                                $VariableName = $row->VariableName;
                                $total += $row->Mark;
                                echo "<tr>
                               <td>$VariableName</td>
                               <td>$Mark</td>
                            </tr>";

                            }

                            ?>
                            <tr class="bg-danger text-uppercase text-white">
                                <td></td>
                                <td><b class="text-black">Total: </b><?php echo $total ?>  Marks</td>
                            </tr>

                            </tbody>

                        </table>
                        <h1>Comments</h1>
                        <?php
                        $sele = $connect->prepare("SELECT*FROM comments WHERE userid=?");
                        $sele->bindValue(1,$_GET["tid"]);
                        $sele->execute();
                        if ($sele->rowCount()>0) {
                            while ($r = $sele->fetch(PDO::FETCH_OBJ)) {
                                echo "<div class='alert alert-warning'><b>CommentID:</b> <b>$r->commentID</b> <br> $r->commentText</div>";
                            }
                        }else{
                            echo "<div class='alert alert-info'>No comments</div>";
                        }
                        ?>
                        <!--    Modal Display-->
                        <div class="modal fade" id="moreDatails" tabindex="-1" role="dialog" aria-labelledby="firefoxModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="firefoxModalLabel">ADD COMMENT: <?php echo  $name." ".$sname; ?> </h4>
                                    </div>
                                    <div class="modal-body">

                                        <form action="report_stu.php" method="post">
                                            <textarea name="comment" cols="60" rows="10"></textarea>
                                            <input type="submit" class="btn btn-primary" name="sbt_sign" value="Submit">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--    End of Display Modal-->
                    </form>

                </div>

            </div>


        </div>
    </section>
    <!-- End feature Area -->
<?php }?>
<!--End of supper model-->
<!-- start footer Area -->
<?php include "includes/footer.php"; ?>
<!-- End footer Area -->