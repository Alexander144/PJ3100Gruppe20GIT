<?php include_once 'header.php';
      $ID = (int)$_GET['ID'];
      $username = htmlentities($_SESSION['username']);
      include_once 'includes/oneProject.inc.php'; /* projectPage.inc.php */
 ?>
    <?php if (login_check($mysqli) == true) : ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="updateProfile_form">

            <div id="projectPage">
                <?php
            for($i=0; $i<count($VideoInProject); $i++){
                echo $VideoInProject[$i];
            }
            
            $user_id = htmlentities($_SESSION['user_id']);
            $email = htmlentities($_SESSION['email']);
             
             ?>
                    <div id="projectOne" class="col col-projectOne">


                        <h3>Tittel på prosjekt</h3>
                        <?php echo $Name ?>

                            <div id="photoProject">
                                <img src="#">
                                <?php// echo $projectPhoto ?>
                            </div>

                            <div id="yt_api"></div>

                            <div id="youtubeContainer">

                                    <div id="youTubeVideo"></div>
                                    <div id="youTubeVideo2"></div>
                                    <!-- <div id="projectPicture" style="height:360px; width:640px; background-color:rgb(20,20,20);"></div>-->

                                <script src="js/jquery.js"></script>
                      <!--          <script src="js/youTube.js"></script> -->

                                <script>
                                    var link = <?php echo json_encode($VideoInProject); ?>;
                                    var linkCount = <?php echo json_encode(count($VideoInProject)); ?>;

                                    document.write(link[0]);
                                    document.write(linkCount);

                                    //videospilleren
                                    var player;

                                    //start innhenting/klargjøring av YoutTube Iframe API
                                    var yt_api_script = document.createElement("script");
                                    yt_api_script.src = "https://www.youtube.com/iframe_api";
                                    $("#yt_api").html(yt_api_script);
                                    yt_api_script.onload = onYouTubeIframeAPIReady;
                                    //-- end innhenting av YouTube API

                                    //start konfigurering av videospiller       
                                    //https://developers.google.com/youtube/iframe_api_reference
                                    //https://developers.google.com/youtube/player_parameters?playerVersion=HTML5



                                    for (var i = 0; i < linkCount; i++) {


                                        var onYouTubeIframeAPIReady = function () {

                                            var videokonfigurasjon = {
                                                width: 640,
                                                height: 360,
                                                videoId: link[0],
                                                events: {
                                                    onReady: setVideoEvents
                                                },
                                                playerVars: {
                                                    //controls: 0
                                                }
                                            }; //--- end videokonfigurasjon

                                            player = new YT.Player("youTubeVideo", videokonfigurasjon);
                                            
                                            
                                            
                                            

                                        }; //--- end onYouTubeIframeAPIReady
                                      //  alert(link[i]);
                                        
                                    }
                                    var setVideoEvents = function () {
                                        $("#playVideoBtn").on("click", function () {
                                            player.playVideo();
                                        });


                                    }; //--- end setVideoEvents
                                </script>


                                <div id="commentField">
                                    <p>Kommentarfelt</p>
                                    <div id="commentDiv"></div>
                                </div>

                            </div>

                            <div id="projectTwo" class="col col-projectTwo">

                                <div id="emneProject">
                                    <p id="emneProjectP">Emne:</p>
                                    <?php echo $Subject ?>
                                </div>

                                <div id="studentsProject">
                                    <p id="studentsProjectP">Studenter:</p>
                                    <p id="getStudentsProject"></p>
                                    <?php
                            for($i = 0; $i<count($peopleInProject); $i++){
                               echo $peopleInProject[$i];
                               echo "\r\t";
                        }
                        ?>
                                </div>

                                <div id="tutorProject">
                                    <p id="tutorProjectP">Veileder/lærer:</p>
                                    <p id="getTutorProject"></p>
                                    <?php //echo $projectTutor ?>
                                </div>

                                <div id="projectDesc">
                                    <p id="projectDescP">Beskrivelse av prosjekt</p>
                                    <p id="getProjectDesc"></p>
                                    <?php echo $AboutProject ?>
                                </div>


                            </div>

                    </div>

        </form>
        <?php if($OwnProject) : ?>
            <?php $_SESSION["OwnProjectID"] = $ProjectID;
            $OwnProject = false;
        ?>
                <input class="buttonDesign" type="button" value="Endre prosjekt" onclick="location.href ='editproject_page.php';" />
                <?php endif; ?>

                    <p id="returnLogin" class="col">Return to <a href="login.php" class="linkerStyle">login page</a></p>
                    <?php else : ?>
                        <p>
                            <span class="error">You are not authorized to access this page.</span> Please <a href="login.php" class="linkerStyle">login</a>.
                        </p>
                        <?php endif; ?>

                            <?php include_once 'footer.php'; ?>
                                <!--</body>
</html>