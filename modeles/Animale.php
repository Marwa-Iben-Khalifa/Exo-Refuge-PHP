<?php
class Animale
{
    /**
     * numéro d'animale'
     *
     * @var int
     */
    private $num;
    /**
     * nom de l'animale
     *
     * @var string
     * 
     */
    private $nom;

    /**
     * Adopté ou pas encore
     *
     * @var boolean soit 0 ou 1
     */
    private $situation;

    /**
     * numero de type d'animal cle etrangère de table type
     *
     * @var  int
     */
    private $int_type;


    /**
     * la photo à uploader
     *
     * @var _file
     */
    private $fichier;

    

    /**
     * Get the value of num
     */
    public function getNum()
    {
        return $this->num;
    }


    /**
     * Set numéro d'animale'
     *
     * @param  int  $num  numéro d'animale'
     *
     * @return  self
     */
    public function setNum(int $num)
    {
        $this->num = $num;

        return $this;
    }

    /**
     * lit le nom
     *
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * ecrit dans le champ nom
     *
     * @param string $nom
     * @return self
     */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * Get the value of int_type => l'objet Type
     */
    public function getInt_type() :Type
    {
        return Type::findById($this->int_type);
    }

    /**
     * Set the value of int_type
     *
     * @return  self
     */
    public function setInt_type(Type $type) :self
    {
        $this->int_type = $type->getNum();

        return $this;
    }

    /**
     * Get the value of situation
     */
    public function getSituation()
    {
        return $this->situation;
    }

    /**
     * Set the value of situation
     *
     * @return  self
     */
    public function setSituation($situation)
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getFichier() 
    {
        return $this->fichier;
    }

    /**
     * Set the value of file image
     *
     * @return  self
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }



    /**
     * retourne tous le types des animaux
     *
     * @return array :Type[] tab d'obj animale
     */
    public static function findAll(): array
    {
        $req = MonPdo::getInstance()->prepare("select a.num, a.nom,a.image, a.situation, r.libelle, a.created_at from  animale a, type r where a.int_type=r.num ");
        $req->setFetchMode(PDO::FETCH_OBJ );
        $req->execute();
        $resultats = $req->fetchAll();
        return $resultats;
    }

    /**
     * trouve un animale avec son num
     *
     * @param integer $id numéro du type
     * @return Animale objet animale trouvé
     */
    public static function findById(int $id): Animale
    {
        $req = MonPdo::getInstance()->prepare("select * from animale where num=:id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Animale');
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch();
        return $resultat;
    }

    /**
     * Ajouter un animale
     *
     * @param Animale $animale à ajouter
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function add(animale $animale): int
    {
        // File name
        $filename = $_FILES['fichier']['name'];

        // Location
        $target_file = 'images/' . $filename;

        // file extension
        $file_extension = pathinfo(
            $target_file,
            PATHINFO_EXTENSION
        );

        $fichierInfo = pathinfo($_FILES['fichier']['name']);
        // extraire l'extension de fichier pour le comparer
        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array(
            "png", "jpeg", "jpg", "gif"
        );

        if (in_array(
            $file_extension,
            $valid_extension
        ) && !empty($file_extension)) {

            // Upload file
            move_uploaded_file(
                $_FILES['fichier']['tmp_name'],
                $target_file
            );
        } else {
            $target_file='images/images.jpg';
            echo 'Vous devez envoyer une image!';
        }
        $req = MonPdo::getInstance()->prepare("insert into animale (nom, situation, int_type, image) values(:nom, :situation, :int_type, :image)");
        $nom=$animale->getNom();
        $situation= $animale->getSituation();
        $req->bindParam(':nom', $nom);
        $req->bindParam(':situation', $situation);
        $req->bindParam(':int_type', $animale->int_type);
        $req->bindParam(':image', $target_file);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * modifier un animale
     *
     * @param Animale $animale  à modifier
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function update(Animale $animale): int
    {
        // File name
        $filename = $_FILES['fichier']['name'];

        // Location
        $target_file = 'images/' . $filename;

        // file extension
        $file_extension = pathinfo(
            $target_file,
            PATHINFO_EXTENSION
        );

        $fichierInfo = pathinfo($_FILES['fichier']['name']);
        // extraire l'extension de fichier pour le comparer
        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array(
            "png", "jpeg", "jpg", "gif"
        );

        if (in_array(
            $file_extension,
            $valid_extension
        ) && !empty($file_extension)) {

            // Upload file
            move_uploaded_file(
                $_FILES['fichier']['tmp_name'],
                $target_file
            );
        } else {
            $target_file = 'images/images.jpg';
            echo 'Vous devez envoyer une image!';
        }

        $req = MonPdo::getInstance()->prepare("update  animale set nom= :nom, situation= :situation, int_type= :int_type, image= :image where num= :id");
        $num= $animale->getNum();
        $nom = $animale->getNom();
        $situation = $animale->getSituation();
        $int_type = $animale->getInt_type();
        
        $req->bindParam(':id', $num );
        $req->bindParam(':nom', $nom);
        $req->bindParam(':situation', $situation);
        $req->bindParam(':int_type', $animale->int_type);
        $req->bindParam(':image', $target_file);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * supprimer un animale
     *
     * @param Animale $animale l'animale à supprimer
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function delete(Animale $animale): int
    {
        $req = MonPdo::getInstance()->prepare("delete from animale where num= :id");
        $req->bindParam(':id', $animale->getNum());
        $nb = $req->execute();
        return $nb;
    }


    

    
}
?>