<?php include_once 'header.php';
      include_once 'includes/editProfile.inc.php';
 ?>
        <?php if (login_check($mysqli) == true) : ?>
		 <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
                method="post" 
                name="updateProfile_form">
             
            <div id="updateProfile">
            <?php

            $username = htmlentities($_SESSION['username']);
            $user_id = htmlentities($_SESSION['user_id']);
            $email = htmlentities($_SESSION['email']);
             
             ?>
        <div id="profileBasicInfo" class="col">
                
        <h3>Her kan <?php echo $username;?> redigere profilen sin</h3>
            
            <div id="updatePhoto">
                <p>Last opp bilde av deg selv</p>
                <input class="updatefield" type="file"
                            name="picture" 
                            id="picture"/>
            </div>
            
            <div id="updatePassword">
                <p>Oppdater passord</p>
                <input id="updatePasswordTxt" type="text" />
            </div>
            
            <div id="updateEmail">
                <p>Oppdater mailen din</p>
                <input id="updateEmailTxt" type="text" />
            </div>
        
        </div>
                
                <div id="" class="col">
                    <h3 id="aboutMe">Informasjon om deg</h3>
                    <textarea cols="80" rows="20" name="profileEditAboutMe" id="profileEditAboutMe"><?php echo $profileEditAboutMe; ?></textarea>
                    
                <div id="updateGrades">
                    <p id="updateGradesP">Last opp karakterkortet ditt</p>
                    <input class = "updatefield" name="grades" type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                    
                </div>

                    <div id="updateCV">
                        <p id="updateCVP">Last opp CV</p>
                        <input class = "updatefield" name="cv" type="file" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps" />
                    </div>
                    
                
                </div>

            </div>

        </form>

        <input id="UpdateBTN" class="col" type="button" 
                value="Oppdater profilen din" 
                onclick="return ProfileUpdateForms(
                                this.form,
                                this.form.picture,
                                this.form.profileEditAboutMe,
                                this.form.grades,
                                this.form.cv);" />  

            <p id="returnLogin" class="col">Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>

<?php include_once 'footer.php'; ?>
    <!--</body>
</html>