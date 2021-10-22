<div class="container mt-5">

    <h2 class="pt-3 text-center"><?php echo $mode ?> un Animale</h2>

    <form action="index.php?uc=animaux&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded" enctype="multipart/form-data">
        <div class="form-group">
            <label for="libelle">libellé</label>
            <input type="text" class="form-control mb-2" id="nom" placeholder="Saisir le nom" name='nom' value="<?php echo $res = ($mode == 'Modifier' ? $animale->getNom() : "") ?>">
        </div>
        <div class="form-group">
            <label for="situation" class="form-label mt-4">Situation</label>
            <select class="form-select" name="situation">
                <option <?php echo $res = ($mode == 'Modifier' && $animale->getSituation() == '0'  ? 'selected' : '') ?> value="0">Non adopté</option>
                <option <?php echo $res = ($mode == 'Modifier' && $animale->getSituation() == '1' ? 'selected' : '') ?> value="1">Adopté</option>
            </select>
        </div>
        <div class="form-group">
            <label for="int_type" class="form-label mt-4">Type</label>
            <select class="form-select" name="int_type">
                <?php
                foreach ($types as $type) {
                    if ($mode == 'Modifier')
                    {
                        $selection = $type->getNum() == $animale->getInt_type()->getNum() ?  'selected' : '';
                    }
                    
                    echo "<option $selection value='" . $type->getNum() . "'>" . $type->getLibelle() . "</option>";
                }

                ?>
            </select>
        </div>
        <input type="hidden" id='num' name='num' value="<?php echo $res = ($mode == 'Modifier' ? $animale->getNum() : "") ?>">

        <div class="form-group">
            <label for="fichier" class="form-label mt-4">Choisir une photo</label>
            <input class="form-control" name="fichier" type="file" id="fichier" value="">
        </div>
        <div class="row">
            <div class="col"><a href="index.php?uc=animaux&action=list" class="btn btn-warning ">Revenir à la liste</a></div>
            <div class="col"><button type="submit" class="btn btn-success "> <?php echo $action ?> </button></div>
        </div>
    </form>

</div>