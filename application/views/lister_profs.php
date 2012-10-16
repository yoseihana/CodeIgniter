<div id="container">
	<h1>Adopte un prof!</h1>

	<div id="body">
        <h1>Liste des profs</h1>
	</div>
    <?php if(count($profs)): ?>
    <?php foreach($profs as $prof): ?>
        <li>
            <h3>
                <?php echo anchor('prof/voir/'.$prof->prof_id, $prof->prenom, array('title'=>'voir la fiche de '.$prof->prenom.' '.$prof->nom, 'hreflang'=>'fr')); ?>
            </h3>
            <div class="image">
                <?php echo anchor('prof/voir/'.$prof->prof_id, '<img src="'.site_url().THUMBS_DIR.$prof->photo.'" alt="'.$prof->nom.' '. $prof->prenom.'">', array('title'=>'voir la fiche de '.$prof->prenom.' '.$prof->nom, 'hreflang'=>'fr')); ?>
            </div>
            <p class="caractere"><?php echo $prof->caractere ?></p>
            <p class="specialite">
                Bosse en:
                <?php echo anchor('prof/lister/spec/'.$prof->spec_id, $prof->specialite, array('title'=>'voir les profs de '.$prof->specialite, 'hreflang'=>'fr')); ?>
            </p>
            <p>
                <?php echo anchor('prof/adopte/'.$prof->prof_id, "J'adopte ce prof!", array('title'=>'J\'adopte '.$prof->prenom, 'hreflang'=>'fr')); ?>
            </p>
        </li> <!-- Permet d'utiliser des caractéristiques de l'objet $prof (avec la requete SQL) -->
     <?php endforeach; ?>
    <?php endif ?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
