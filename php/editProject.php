<?php include_once 'header.php';
    $ProjectID = 1;
      include_once 'includes/editProject.inc.php';
 ?>
    <?php if (login_check($mysqli) == true) : ?>
        <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="updateProfile_form">

            <div id="createProjectContainer">

                <section id="mainCreateProject">
                    <!-- start Main Content -->

                    <!-- CP = SHORT FOR CREATE PROJECT -->

                    <!-- start upload project -->
                    <div id="uploadCreateProject" class="test321">
                        <!-- upload file -->
                        <input id="uploadCPBtn" class="upload" type="button" value="Last opp fil" name="Upload Btn">

                        <!--<?php echo $uploadFile; ?>-->


                        <!-- link to file -->
                        <a id="linkCreateProjectFile" class="upload" href="http://www.aftenposten.no">
                            <p>Eller link til andre medier</p>
                        </a>
                    </div>


                    <div id="nameFileCreateProject" class="test321">
                        <p id="nameProjectCP" class="col-floatleft">Navn på prosjekt:</p>
                        <input id="nameProjectCPTxt" class="col-floatright" type="text" name="Name Project">
                    </div>
                    <?php echo $projectName; ?>
                  <div id="studyTopic" class="test321">
                        <p id="studyTopicCP" class="col-floatleft">Emne:</p>
                        <input id="studyTopicCPTxt" class="col-floatright" type="text" name="Choose Study Topic">
                    </div>
                        <?php echo $projectSubject; ?>

                    <div id="description" class="col-floatleft">
                        <p id="descProjCP" class="">Beskrivelse:</p>
                        <textarea id="descProjCPTxt"></textarea>
                        <?php echo $projectEditInfotext; ?>
                    </div>

                    <div class="clearfix"></div>

                    <div id="addStudents" class="test321">
                        <p id="addStudentCP" class="col-floatleft">Legg til andre studenter:</p>
                        <input id="addStudentCPTxt" class="col-floatright" type="text" name="Add Students">
                    </div>
                    <!--<?php echo $chooseStudent; ?>-->

                    <div class="clearfix"></div>


                    <div id="addTeacher" class="test321">
                        <p id="addTeacherCP" class="col-floatleft">Legg til lærer:</p>
                        <input id="addTeacherCPTxt" class="col-floatright" type="text" name="Add Teacher">
                    </div>
                    <!--<?php echo $chooseTeacher; ?>-->



                    <div id="studyTopic" class="test321">
                        <p id="studyTopicCP" class="col-floatleft">Emne:</p>
                        <input id="studyTopicCPTxt" class="col-floatright" type="text" name="Choose Study Topic">
                    </div>
                        <!-- <?php echo $chooseTopic; ?>-->


                    <div id="publish" class="test321">
                        <!-- publish file -->
                        <input id="publishCPBtn" class="publishBtn" type="button" value="Publiser" name="Publish Button" <!-- preview file -->
                        <input id="previewCPBtn" class="publishBtn" type="button" value="Forhåndsvisning" name="Preview Button">
                    </div>
                    <!-- <?php echo $uploadProject; ?>>
        <?php echo $previewFile; ?> -->


            </div>

            <!-- end upload project -->


            </section>
            <!-- end Main Content -->
            </div>
            <!-- end container -->


            <!-- Knapp funkjsonen-->
            <input id="UpdateBTN" type="button" value="Update" onclick="return ProfileUpdateForms(
                                    this.form,
                                   this.form.picture,
                                   this.form.profileEditAboutMe,
                                   this.form.grades,
                                   this.form.cv);" />

        </form>
        <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="login.php">login</a>.
            </p>
            <?php endif; ?>
                </body>

                </html>
