<div class="w3-top">
  <div class="w3-bar w3-light-grey">
		<img src="img/logo.png" class="w3-bar-item" width="300px" height="44px">
    <a href="index.php" class="w3-bar-item w3-button w3-green">Home</a>

    <div class="search-container">
      <form action="/search.php">
        <input type="text" placeholder="Cerca.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <!--<a href="manage.php" class="w3-bar-item w3-button w3-hide-small">Gestisci Viaggi</a>-->
    <div class="w3-dropdown-hover w3-right">
      <button class="w3-button">
        <?php echo $_SESSION["nome"] . " " . $_SESSION["cognome"]; ?> <i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <a href="logout.php" class="w3-bar-item w3-button w3-text-black">Logout <i class="fa fa-sign-out"></i></a>
      </div>
    </div>
  </div>
</div>