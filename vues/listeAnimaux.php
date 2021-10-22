<div class="container">
    <div class="row pt3">
        <div class="col-9">
            <h2>Liste des animaux</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=animaux&action=add" class="btn btn-success">Ajouter animale <i class="fas fa-paw"></i> </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Numero</th>
                <th scope="col">Nom</th>
                <th scope="col">Situation</th>
                <th scope="col">Type</th>
                <th scope="col">Data d'adoption</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($animaux as $animale) {
                echo "<tr>";
                echo "<td> $animale->num</td>";
                echo "<td> $animale->nom</td>";
                echo $resultat = ($animale->situation == 0 ? "<td> Pas adopté </td>" :  "<td> Adopté </td>");
                echo "<td> $animale->libelle</td>";
                echo "<td> $animale->created_at</td>";
                echo "<td> 
                            <a href='index.php?uc=animaux&action=update&num=$animale->num' class='btn btn-primary'><i class='fas fa-pen'></i> </a>
                            <a href='index.php?uc=animaux&action=delete&num=$animale->num' class='btn btn-danger'><i class='fas fa-trash'></i> </a>
                        </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>