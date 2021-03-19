<nav>
<div class="wrap ">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="recherche">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"> <img src="assets/images/search-icon.png" /></i>
                </button>
            </div>
        </div>

          <!--
<form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>
!-->
    <div class="link">
            <ul class = "link_nav">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">A Propos</a></li>
                <li><a href="searchEntreprise">Entreprise</a></li>              
                <li><a href="searchOffer">Offre</a></li> 
            </ul>
    </div>
</nav>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("nav");
var stickyNav = navbar.offsetTop;



function myFunction() {
  if (window.pageYOffset >= stickyNav) {
    navbar.classList.add("stickyNav")
  } else {
    navbar.classList.remove("stickyNav");
  }
}
</script>