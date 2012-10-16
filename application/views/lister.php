<div id="container">
	<h1>Adopte un prof!</h1>

	<div id="body">
        <h1><?php echo $titre; ?></h1>
	</div>
    <?php if(count($profs)): ?>
    <?php foreach($profs as $prof): ?>
        <li>
            <h3>
                <?php echo anchor('prof/voir/'.$prof->prof_id, $prof->prenom.' '.$prof->nom, array('title'=>'voir la fiche de '.$prof->prenom.' '.$prof->nom, 'hreflang'=>'fr')); ?>
            </h3>
            <div class="image">
                <?php echo anchor('prof/voir/'.$prof->prof_id, '<img src="'.site_url().THUMBS_DIR.$prof->photo.'" alt="'.$prof->nom.' '. $prof->prenom.'">', array('title'=>'voir la fiche de '.$prof->prenom.' '.$prof->nom, 'hreflang'=>'fr')); ?>
            </div>
            <p class="caractere"><?php echo $prof->caractere ?></p>
            <p class="specialite">
                Bosse en:
                <?php echo anchor('prof/lister/spec/'.$prof->spec_id, $prof->specialite, array('title'=>'voir les profs de '.$prof->specialite, 'hreflang'=>'fr')); ?>
            </p>
            <?php if(!isset($deja_adoptes[$prof->prof_id])): ?>
            <p class="adopte">
                <?php echo anchor('prof/adopte/'.$prof->prof_id, "J'adopte ce prof!", array('title'=>'J\'adopte '.$prof->prenom, 'hreflang'=>'fr')); ?>
            </p>
            <?php else: ?>
            <p class="adopte">
                <?php echo anchor('prof/libere/'.$prof->prof_id, "Je libère ce prof!", array('title'=>'Je libère '.$prof->prenom, 'hreflang'=>'fr')); ?>
            </p>
            <?php endif; ?>
        </li> <!-- Permet d'utiliser des caractéristiques de l'objet $prof (avec la requete SQL) -->
     <?php endforeach; ?>
    <?php endif ?>
    <!-- On compte si il y a déjà un prof dans le tableau -->
    <?php if($deja_adoptes): ?>
    <div id="panier">
         <ul>
        <?php foreach($deja_adoptes as $prof): ?>
             <li><?php echo $prof->nom.' '.$prof->prenom ?> -  <?php echo anchor('prof/libere/'.$prof->prof_id, "Je le libère", array('title'=>'Je libère '.$prof->prenom, 'hreflang'=>'fr')); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
