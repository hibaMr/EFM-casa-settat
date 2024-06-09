

<header class="header">
        <?php if(isset($_SESSION['employe'])){ ?>
        <h1 class="h1"><?php echo 'bienvenu ' . $_SESSION['employe']['nom'] . ' ' . $_SESSION['employe']['fonction'] ?> </h1>
        <?php } ?>
        <nav>
            <ul>
                <li><a href="Sinscrire.php">S'inscrire</a></li>
                <li><a href="listIns.php">liste de voyage</a></li>
                <li><a href="deconnecter.php" onclick="return confirm('voler vous deconnecter?')">se deconnecter</a></li>
            </ul>
        </nav>
    </header>