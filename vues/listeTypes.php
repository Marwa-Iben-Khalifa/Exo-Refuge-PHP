<div class="container">
    <div class="row pt3">
        <div class="col-9">
            <h2>Types des animaux</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=types&action=add" class="btn btn-success">Ajouter type <i class="fas fa-paw"></i> </a>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-md-2">Numero</th>
                <th scope="col" class="col-md-8">Libelé</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($types as $type) {
                echo "<tr>";
                echo "<td class='col-md-2'>".$type->getNum()."</td>";
                echo "<td class='col-md-8'> ".$type->getLibelle()."</td>";
                echo "<td class='col-md-2'> 
                            <a href='index.php?uc=types&action=update&num=".$type->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i> </a>
                            <a href='index.php?uc=types&action=delete&num=".$type->getNum()."' class='btn btn-danger'><i class='fas fa-trash'></i> </a>
                        </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>