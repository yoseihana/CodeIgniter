<div id="container">
	<h1>Adopte un prof!</h1>

	<div id="body">
        <h1>Liste des profs</h1>
	</div>
    <?php if(count($profs)): ?>
    <?php foreach($profs as $prof): ?>
        <li>
            <h3><a href="#" title="<?php echo $prof->nom.' '. $prof->prenom ?>"><?php echo $prof->nom ?></a></h3>
            <div class="image">
               <a href="#" title="<?php echo $prof->nom.' '. $prof->prenom ?>"><img src="<?= site_url().THUMBS_DIR.$prof->photo ?>" alt="<?php echo $prof->nom.' '. $prof->prenom ?>"></a>
            </div>
            <p class="caractere"><?php echo $prof->caractere ?></p>
            <p class="specialite">
                Bosse en:
                <a href="#" title="<?php echo $prof->specialite ?>"><?php echo $prof->specialite ?></a>
            </p>
            <p>
                <a href="#">J'adopte ce prof!</a>
            </p>
        </li> <!-- Permet d'utiliser des caractéristiques de l'objet $prof (avec la requete SQL) -->
     <?php endforeach; ?>
    <?php endif ?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
