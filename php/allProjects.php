 <?php include_once 'header.php';
        $row;
        include_once 'includes/allProjects.inc.php';
        include_once 'menu.php';
       
 ?>

<?php if (login_check($mysqli) == true) : ?>

<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
      method="post"
      name="updateProfile_form">
<!-- Entry of body content field for index below -->

    <section id="mainContent"> <!-- start Main Content -->
        <!-- start projects -->
        <div id="projects">
            
            <p id="nameProj"></p>
            <?php 
            $username = htmlentities($_SESSION['username']);

            $likeValueSort = true;
                 //echo $Name[1];
             ?>
            

        </div><!--end projects-->
        
    </section><!--end Main Content-->

    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script>
        var allProjects = <?php echo json_encode($count);?>; //Get value here
        var projectName = <?php echo json_encode($Name); ?>;
        var projectSubject = <?php echo json_encode($Subject); ?>;
        var projectAbout = <?php echo json_encode($AboutProject); ?>;
        var projectID = <?php echo json_encode($ProjectID); ?>;
        var Username = <?php echo json_encode($username); ?>;
        var LikeValue = <?php echo json_encode($likeValue); ?>;
        var $newProject = $("<div>");
        var $newBox = $("<div>");
        var $dislike = $("<div>");
        var AllValues = {projectName, projectSubject, projectAbout, projectID, LikeValue };
        var LikevalueSort = <?php echo json_encode($likeValueSort); ?>;
  


        function bubbleSort() {
          var length = LikeValue.length;
          for (var i = 0; projectID[i] < length; i++) { //Number of passes
            for (var j = 0; projectID[j] < (length - projectID[i] - 1); j++) { //Notice that j < (length - i)
              //Compare the adjacent positions
              if(Likevalue[projectID[j]] > LikeValue[projectID[j+1]]) {
                //Swap the numbers
                var tmp = LikeValue[projectID[j]];  //Temporary variable to hold the current number
                LikeValue[projectID[j]] = LikeValue[projectID[j+1]]; //Replace current number with adjacent number
                LikeValue[projectID[j+1]] = tmp; //Replace adjacent number with current number

                var tmpName = projectName[j];  //Temporary variable to hold the current number
                projectName[j] = projectName[j+1]; //Replace current number with adjacent number
                projectName[j+1] = tmpName; //Replace adjacent number with current number
              }
            }        
          }
        }

        if(LikevalueSort == true){
           //var $AllValues = QuickSort($AllValues, 0, LikeValue.length - 1);
        //bubbleSort();


           //var LikeValue = QuickSort($Likevalue, 0, Likevalue.length - 1);
        }

        for(var i = 0; i < allProjects; i++){
            

            if(LikeValue[projectID[i]] == undefined){
                LikeValue[projectID[i]] = 0;
            }
            
                var $newProject = $("<div>")
                    .addClass("col col-3 projectBoxes");
                     
                $("#projects").append($newProject);

                var $newBox = $("<div>")
                    .addClass("col col-3 likeBoxes");
                
                var $dislike = $("<div>")
                    .addClass("col col-3 likeboxes");
                    
                     //$("#projects").append($newBox.html("hei"));

                
            
               $newProject
                   .html("<h1>" + projectName[i]+ "</h1>" + "<br>" + "<p>" + "Emne: " + projectSubject[i] + "</p>" + "<br>" + "<p>" +  "Likes: " + LikeValue[projectID[i]] + "</p>" + "<br>" + "<article>" + projectAbout[i] + "</article>" + "<br>");
                
                $newProject.append($newBox, $dislike);
            
            $newBox
                .html("Like");

                

                $newBox
                    .css({
                        "position": "relative",
                        "top": "0px",
                        "z-index": "0",
                        "width": "50px",
                        "height": "50px",
                        "background-color": "",
                        "float": "right",
                        'background-image':'url(heart.png)',
                       // "margin-top": "25%"
                    });
            
                $dislike
                    .css({
                        "position": "relative",
                        "top": "0px",
                        "z-index": "-1",
                        "width": "50px",
                        "height": "50px",
                        "background-color": "",
                        "float": "right",
                        "background-image": "url(dislikeHeart.png)",
                    });
            
                
                
                 
                
                //$newProject.append($ID);
          
            
            $newProject
                .css({
                    "padding-top": "10px",
                    "z-index": "1",
                    "text-align": "center",
                    //"position": "relative"
                });
            
            $("article").mouseover(function(){
                $(this)
                    .stop().fadeTo(500, 0.7);
                
                $(this)
                    .css({
                        "z-index": "10000",
                        "font-size": "1em",
                        "text-align": "center", 
                        "display": "inline",
                        "top": "100px",
                        //"border": "1px solid black"
                    
                    });

            });
            
            $("#projects article").mouseleave(function(){
                $(this)
                    .stop().fadeTo(500, 0);

            });
            
            $("h1")
                .css({
                    "text-align": "center", 
                    "font-size": "1.3em",
                    "font-weight": "700",
                    "display": "inline",
                    "top": "100px",
                    "border-bottom": "1px solid black"
                   }); 
            
            $("article")
                .css({
                    "margin-top": "10px",
                    "font-size": "1em",                       
                    "height": "100%",
                    "text-align": "center", 
                    "display": "inline",
                    "top": "100px",
            });
            
            $("p")
                .css({
                    "text-align": "center", 
                    "font-size": "0.8em",
                    "font-style": "italic",
                    "display": "inline"
                   }); 
            /*
                $newBox.click(function(){
                    
                    $newBox(SendLike);
                    
                });
            
                    $newBox.data("ID", projectID[i]);
                    $newBox.data("Username", Username);
            
            
               /* $newProject.click(function(){
                    $newProject(SendData);
                
                });
            
                $newProject.data("ID", projectID[i]);*/
            
            
            $newProject.on('click', function(e) {
                if (e.target !== this)
                return;
                
                    $.ajax({
						url: 'projectPage.php',
						data: 'ID='+$(this).data("ID"),
						method: 'GET',
						success: function (data) {
                             window.location.href = this.url;
                            console.log(data);

						 // er er resultatet fra sql-spørringen
						}
						});
                
                
                
            });
            
            $newBox.on('click', function(f){
                if(f.target !== this)
                return;
                
                    $.ajax({
                        url: 'includes/Like.inc.php',
                        data: 'ID='+$(this).data("ID")+'&Username=' +$(this).data("Username"),
                        method: 'GET',
                        success: function (data) {
                            
                            
                            console.log(data);
                         // er er resultatet fra sql-spørringen
                        }
                        });
                window.location.href = "index.php";    
            });
            
            $dislike.on('click', function(f){
                if(f.target !== this)
                return;
                
                    $.ajax({
                        url: 'includes/Like.inc.php',
                        data: 'ID='+$(this).data("ID")+'&Username=' +$(this).data("Username"),
                        method: 'GET',
                        success: function (data) {
                            
                            
                            console.log(data);
                         // er er resultatet fra sql-spørringen
                        }
                        });
                window.location.href = "index.php";    
            });
            
            

                $newBox.data("ID", projectID[i]);
                $newBox.data("Username", Username);
                $newProject.data("ID", projectID[i]);
        
        };
        
        
        /* EN ANNEN VERSJON SOM IKKE HELT FUNKER NÅ
        
         $.each($projectName, function( index, value ) {
            
                var $newName = $("#nameProj");
                
                for (var i = 0; i < $projectName; i ++){
                    
                    var $newP = $("<p>")
                        .addClass("projectNameP")
                        .css({
                        "font-size": "2em",
                        "font-color": "blue"
                        });
                    
                    $newName.append($newP);
                }
                $newName.html($projectName);
            });
        
*/
  //sorteringsalgoritme, bruke mergesort
   
    </script><!--end script-->
    <!-- End of body content field -->
    <!-- Knapp funkjsonen-->
     <div id ="content"></div>
    <input class="smallUploadBtn" type="button"
           value="Update"
           onclick="return SearchOnProject(
                    this.form,
                    this.form.;" />
    </form>

    <p>Return to <a href="login.php" class="linkerStyle">login page</a></p>

    <?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="login.php" class="linkerStyle">login</a>.
    </p>
    <?php endif; ?>
    <?php include_once 'footer.php'; ?>
