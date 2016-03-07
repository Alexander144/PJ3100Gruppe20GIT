<div id="sortingMenu" class="sort-container col"> <!-- start sorting content-->
    <ul>
        <li class="sort-workBy sortMenu"><a href="#" <?php $sortProject; ?>>Arbeid av</a>
            <ul>
                <li><a href="allProjects.php" <?php $sortProjectStudent; ?>>Student</a></li>
                <li><a href="allProjects.php" <?php $sortProjectAlumni; ?>>Alumni</a></li>
            </ul>
        </li>

        <li class="sort-program sortMenu" <?php $sortProgram; ?>><a id="avd" href="#">Avdeling</a>
            <ul>
                <li><a id="teknologi" href="#" <?php $sortProgramTeknologi; ?>>Teknologi/IT</a></li>
                <li><a id="ledelse" href="#" <?php $sortProgramLedelse; ?>>Ledelse</a></li>
                <li><a id="kommunikasjon" href="#" <?php $sortProgramKommunikasjon; ?>>Kommunikasjon</a></li>
                <li><a id="kunstfag" href="#" <?php $sortProgramKunstfag; ?>>Kunstfag</a></li>
                <li><a id="filmTVSpill" href="#" <?php $sortProgramFilmTVSpill; ?>>Film, TV og Spill</a></li>
            </ul>
        </li>

        <li class="sort-orderBy sortMenu" <?php $sortBy; ?>><a href="#">Rekkefølge</a>
            <ul>
                <li><a href="#" <?php $sortByMostPopular; ?>>Mest Populære</a></li>
                <li><a href="#" <?php $sortByNewest; ?>>Nyeste</a></li>
            </ul>
        </li>
        
        <div id="searchField">
    <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"
                method="post"
                name="updateProfile_form">
            <input type="text" name="searchOnUser" id="searchOnUser" placeholder="Søk" />
          <input type="button" id="UpdateBTN" onclick="SearchOnProfile(this.form,this.form.searchOnUser);" value="Søk etter bruker"/>
         </form>
    </div>
    </ul>
    
</div>
