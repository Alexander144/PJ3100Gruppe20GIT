<?php include_once 'header.php';
    $ID = (int)$_GET['ID'];

    $projectImage = 'defaultBilde.png';
    $username = htmlentities($_SESSION['username']);
    $LikeUp= false;
   
    include_once 'includes/oneProject.inc.php'; /* projectPage.inc.php */
 ?>
    <?php if (login_check($mysqli) == true) : ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']) . "?ID=" . $ID; ?>" method="post" name="updateProfile_form">

            <div id="projectPage">
                <?php
            for($i=0; $i<count($VideoInProject); $i++){
            }
             $_SESSION['i'] = null;
            $user_id = htmlentities($_SESSION['user_id']);
            $email = htmlentities($_SESSION['email']);
             
             ?>
                    <div id="projectOne" class="col-projectOne">


                        <h3 id="prosjektTittel"><?php echo $Name ?></h3>

                        <!--Start show projectImage-->

                        <div id="imgContainer">

                          
                            <?php for($i=0; $i<count($projectImage); $i++){
                                echo '<img src="./' . $projectImage[$i] . '"/>';
                            } ?>

                        
                            <!--Forsøk på å vise fleire bilder i ett prosjekt-->
                            <!--<img id="imgUrlPath" src="./ "/>

                            <script src="js/jquery.js"></script>
                            
                            <script>
                                var imgUrl = <?php //echo json_encode($projectImage); ?>
                                var imgCount = <?php //echo json_encode(count($projectImage)); ?>

                                document.write(imgUrl[0]);
                                document.write(imgCount);
                                
                                var getImgUrlPath = document.getElementById(imgUrlPath);
                                
                                for (var i = 0; i < imgUrl; i++) {
                                    <?php //echo $getImgUrlPath + $projectImage ?>;
                                }
                            </script>-->

                        </div>


                            <!-- Start youtubescript og youtube html-->
                            <div id="yt_api"></div>

                            <div id="youtubeContainer">

                                <div id="youTubeVideo"></div>
                                <!-- <div id="projectPicture" style="height:360px; width:640px; background-color:rgb(20,20,20);"></div>-->


                                <script src="js/jquery.js"></script>

                                <script>
                                    var link = <?php echo json_encode($VideoInProject); ?>;
                                    var linkCount = <?php echo json_encode(count($VideoInProject)); ?>;



                                for (var i = 0; i < linkCount; i++) {
                                    

                                    var ytVid = "ytVid" + i;

                                    $("#youtubeContainer").append('<div><iframe width="560" height="315" left="50px src=mySrc frameborder="0" id="ytVid" allowfullscreen></iframe></div>')
                                    $("#youtubeContainer").append('<iframe src="http://www.youtube.com/embed/>' + link[i])

                                    var mySrc = "https://www.youtube.com/embed/" + link[i];

                                    document.getElementById('ytVid').src = mySrc;
                                    
                                    document.getElementById('ytVid').id = "ytVid" + i;

                                    //alert(link[i]);
                                }

                                </script>


                                <!--<div id="commentField">
                                    <p>Kommentarfelt</p>
                                    <div id="commentDiv"></div>
                                </div>-->

                            </div>

                            <!-- end youtubescript og youtube html-->
                        
                        <div id="projectDocument">
                            <h3>Prosjekt Dokumentasjon</h3>   
                                <?php
                            
                                for($i=0; $i<count($projectFile); $i++){
                                    
                                    
                                    $fileMinusFilepath = $fileFileName[$i];
                                    $fileNameString = "project/" . $ID . "/";
                                    $trimmed = str_replace($fileNameString, "", $fileMinusFilepath);

                                    echo '<a href="./' . $projectFile[$i] . '"/>' . $trimmed . '</a></br>';
                                    
                                } ?>
                            
                        </div>
                    </div>
                
                    <div id="projectTwo" class="col col-projectTwo">

                        <div id="emneProject">
                            <h3 id="emneProjectP">Emne:</h3>
                            <?php echo $Subject ?>
                        </div>

                        <div id="studentsProject">
                            <h3 id="studentsProjectP">Studenter:</h3>
                            <p id="getStudentsProject"></p>
                            <?php
                            for($i = 0; $i<count($peopleInProject); $i++){
                               echo $peopleInProject[$i];
                               echo "\r\t";
                        }
                        ?>
                        </div>

                        <div id="projectDesc">
                            <h3 id="projectDescP">Beskrivelse av prosjekt</h3>
                            <p id="getProjectDesc"></p>
                            <?php echo $AboutProject ?>
                        </div>
                        
                        <!-- Like container -->
                        <div id="likeContainerPPage">
                          

                        </div>
                        <p>Prosjektet har <?php echo $count6; ?> likes</p>
                        <!-- Like container end -->

                        
                        

                       <?php  if($OwnProject) { ?>
                        <input id="editProjectBtn" class="buttonDesign" type="button" value="Endre prosjekt" onclick="location.href ='editproject_page.php';" />
                                      
                        <input id="Delete" name="Delete" class="buttonDesign" type="submit" value="Slett prosjekt"/> 
                                    
                                 
                        <?php } ?>
                        <?php endif; ?>

                    </div>

        
        <?php if($OwnProject) : ?>
            <?php $_SESSION["OwnProjectID"] = $ProjectID;
            $OwnProject = false;
        ?>


               <p id="returnLogin" class="col"><!--Return to <a href="login.php" class="linkerStyle">login page</a>--></p>
                <?php else : ?>
                    <p>
                        <span class="error">You are not authorized to access this page.</span> Please <a href="login.php" class="linkerStyle">login</a>.
                    </p> 
                    <?php endif; ?>
                   

                        <?php include_once 'footer.php'; ?>
                
                <script src="js/jquery.js"></script>
<script>

        $("#Delete").click(function(){
            alert("Prosjektet er nå slettet.");
        });

</script>
                            <!--</body>
</html>