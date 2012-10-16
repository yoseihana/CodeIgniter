<h1>
    Adopte un prof <?php echo $prof->prenom.' '.$prof->nom ?>
</h1>
    <h2>
        La fiche de <?php echo $prof->prenom.' '.$prof->nom ?>
    </h2>
<div class="image">
<a href="" title="<?php echo $prof->nom.' '. $prof->prenom ?>"><img src="<?= site_url().THUMBS_DIR.$prof->photo ?>" alt="<?php echo $prof->nom.' '. $prof->prenom ?>"></a>
</div>
    <p>
        Bosse en <?php echo anchor('prof/lister/spec/'.$prof->spec_id, $prof->specialite, array('title'=>'voir les profs de '.$prof->specialite, 'hreflang'=>'fr')); ?>
    </p>
    <div class="cv">
        <?php echo $prof->cv?>
    </div>
        <p class="adopte">
            <?php echo anchor('prof/adopte/'.$prof->prof_id, "J'adopte ce prof!", array('title'=>'J\'adopte '.$prof->prenom, 'hreflang'=>'fr')); ?>
        </p>
<p id="voirliste">
    <?php echo anchor('prof/', "Retour à la liste des profs", array('title'=>'retour aux fiches', 'hreflang'=>'fr')); ?>
</p>