<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Réfuge Adopt Yours!</h1>
        <p class="col-md-8 fs-4">Nous les soignons, les vaccinons, les stérilisons et les identifions avant de leur rechercher une famille d’adoption qui correspondra à leurs besoins et saura les rendre heureux. </p>
    </div>
</div>


<div class="container">
    <div class="row">
        

        <?php
        /**
         * construire une date référence avant 30 jour pour la comparer avec la date d'inscription
         */
        $date= new DateTime();
        date_sub($date, date_interval_create_from_date_string('30 days'));
        /**
         * afficher des cartes pour chaque animale
         */
        foreach ($animaux as $animale) {
            /**
             * comparer à chaque fois la date d'inscription et la date courrante pour n'afficher que les animaux qui ont 
             * été inscrits depuis moins de 30 jours
             */
            $dateInscrit= new DateTime($animale->created_at);
            if ($date <=  $dateInscrit )
            {
                echo '<div class="col-md-4">';
                echo '<div class="card mb-3">';
                echo '<h3 class="card-header">Adopt Yours!</h3>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $animale->nom . '</h5>';
                echo '</div>';
                echo '<img  class="d-block user-select-none" width="100%" height="200" src="' . $animale->image . '" alt=""  style="font-size:1.125rem;text-anchor:middle"/>';
                echo '<div class="card-body">';
                echo '</div>';
                echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item">' . $animale->libelle . '</li>';
                echo '</ul>';
                echo '<div class="card-footer text-muted">
                            ' . $animale->created_at . '
                        </div>';
                echo '</div>';
                echo '</div>';
            }
            
        }
        ?>


    </div>
</div>