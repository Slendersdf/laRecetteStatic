<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" type="text/css"/>
    <title>Discover</title>
</head>
<body>
    <header class="min-header">
        <a href="../index.html"><img class="logo" src="../img/logo-la-recette-white.png" alt="logo"/></a>
        <nav>
            <ul>
                <li><a href="#">Annonces</a></li>
                <li><a href="#">Discover</a></li>
                <li><a href="../magazine.html">Magazine</a></li>
            </ul>
        </nav>
        <form action="search.php" id="searchthis" method="post">
                    <input id="search" name="requete" type="text" placeholder="UX Design" required />
                    <div></div>
                    <select id="select" name="region">
                        <option value="all">Ile-de-France</option>
                        <option value="paris">Paris</option>
                        <option value="seine-saint-denis">Seine-Saint-Denis</option>
                        <option value="val-de-marne">Val-de-Marne</option>
                        <option value="haut-de-seine">Haut-de-Seine</option>
                        <option value="val-d-oise">Val-d'Oise</option>
                        <option value="yvelines">Yvelines</option>
                        <option value="essonne">Essonne</option>
                        <option value="seine-et-marne">Seine-et-Marne</option>
                    </select>
                    <div></div>
                    <input id="valid" type="submit" value="Rechercher">
        </form>
    </header>
    <main>
<?php
/**
 * Created by PhpStorm.
 * User: simonboily
 * Date: 10/02/2018
 * Time: 12:59
 */

    $mysqli= new mysqli('db724376203.db.1and1.com','dbo724376203','Larecette@12', 'db724376203');
    mysqli_set_charset($mysqli,"utf8"); // on se connecte à MySQL. Je vous laisse remplacer les différentes informations pour adapter ce code à votre site.
    // on crée une variable $requete pour faciliter l'écriture de la requête SQL, mais aussi pour empêcher les éventuels malins qui utiliseraient du PHP ou du JS, avec la fonction htmlspecialchars().
    //$query = $mysqli->query("SELECT * FROM article WHERE contenu LIKE '%$requete%' ORDER BY id DESC") or die ($mysqli->error);
    $query = $mysqli->query("SELECT prenom,nom,statut,url_profil,url_img_profil,url_img_vignette,competence1,competence2,competence3,passion1,passion2,passion3 FROM profil") or die ($mysqli->error);// la requête, que vous devez maintenant comprendre ;)
    $nb_resultats = $query->num_rows; // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
   
// maintenant, on va afficher les résultats et la page qui les donne ainsi que leur nombre, avec un peu de code HTML pour faciliter la tâche.
        ?>
        <section class="results">
        <h1>Discover</h1>
            <br/>
            <section class="content">
            <?
            while($donnees = mysqli_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
            {
                ?>
                <article>
                    <img src="../img/<? echo $donnees['url_img_vignette']; ?>">
                    <div class="passion">
                        <a href="#"><? echo $donnees['competence1']; ?></a>
                        <a href="#"><? echo $donnees['passion1']; ?></a>
                        <a href="#"><? echo $donnees['competence2']; ?></a>
                        <a href="#"><? echo $donnees['passion2']; ?></a>
                        <a href="#"><? echo $donnees['competence3']; ?></a>
                        <a href="#"><? echo $donnees['passion3']; ?></a>
                    </div>
                    <div class="trait"></div>
                    <div class="nom_prenom">
                        <img src="../img/<? echo $donnees['url_img_profil']; ?>" class="profile">
                        <div>
                            <h2><? echo $donnees['prenom'];?> <?echo $donnees['nom']?></h2>
                            <h3><? echo $donnees['statut']; ?></h3>
                        </div>
                    </div>
                    <div class="trait2"></div>
                    <a href="<? echo $donnees['url_profil']; ?>" class="lien_profil">Voir le profil</a>
                </article>
                <?
            }
            ?>
            </section>
        </section>
                </main>
                <footer>
                    <section>
                        <nav>
                            <a href="#">Concept</a>
                            <a href="#">Équipe</a>
                            <img class="logo" src="../img/logo-la-recette-white.png" alt="logo"/>
                            <a href="#">CGU</a>
                            <a href="#">Contact</a>
                        </nav>
                        <p>2018, ©La Recette. Tous droits réservés</p>
                    </section>
                </footer>
            </body>
            </html>
        <?
     // Fini d'afficher les résultats ! Maintenant, nous allons afficher l'éventuelle erreur en cas d'échec de recherche et le formulaire.
    ?>
        <?// Fini d'afficher l'erreur ^^
    //mysql_close(); // on ferme mysql, on n'en a plus besoin


// et voilà, c'est fini !
?>