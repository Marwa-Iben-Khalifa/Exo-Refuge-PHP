
<div class="container mt-5">

    <h2 class="pt-3 text-center"><?php echo $mode ?> Type Animale</h2>

    <form action="index.php?uc=types&action=valideForm" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control mb-2" id="libelle" placeholder="Saisir le libellé" name='libelle'  value=" <?php if($mode == 'Modifier')  {echo $type->getLibelle();}    ?>" >
        </div>
        <input type="hidden" id='num' name='num' value="<?php if ($mode == 'Modifier') {
                                                            echo $type->getNum();
                                                        } ?>">
        <div class="row">
            <div class="col"><a href="index.php?uc=types&action=list" class="btn btn-warning ">Revenir à la liste</a></div>
            <div class="col"><button type="submit" class="btn btn-success "> <?php echo $mode ?> </button></div>
        </div>
    </form>

</div>