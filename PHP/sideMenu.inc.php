

<div class="sidebar1 full-height nopadding">
    <div class="logo">
        <a class="img-responsive center-block">
            <img src="../HTML/CSS/default.png" class="img-responsive center-block" alt="Logo"><br />
            <div style="text-align: center;"><?php echo @$_SESSION['email']; ?></div>
        </a>
    </div>

    <div class="left-navigation">
        <ul class="list">
            <h5><strong>Menu</strong></h5>
            <li><a href="page_principale.php">Accueil</a></li>
            <li><a href="Page_creation_evenement.php">Créer un évènement</a></li>
            <li><a href="page_ami.php">Amis</a></li>
            <li><a href="Page_invit_evenement_prive.php">Invitation événement privé</a></li>
            <li><a href="#">Guide d'utilisation</a></li>
        </ul>

        <div class="bouton">
            <a href="deconnexion.php" class="button" type="submit">Déconnexion</a>
        </div>
    </div>
</div>
