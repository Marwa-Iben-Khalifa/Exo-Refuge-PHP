<?php
class Type 
{
    /**
     * numéro de type
     *
     * @var int
     */
    private $num;
    /**
     * libellé de type
     *
     * @var string
     * 
     */
    private $libelle;

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * Set numéro de type
     *
     * @param  int  $num  numéro de type
     *
     * @return  self
     */
    public function setNum(int $num):self
    {
        $this->num = $num;

        return $this;
    }

    /**
     * lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string
    {
        return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle( string $libelle) :self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * retourne tous le types des animaux
     *
     * @return array :Type[] tab d'obj type
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("select * from type");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Type');
        $req->execute();
        $resultats=$req->fetchAll();
        return $resultats;
    }

    /**
     * trouve un type avec son num
     *
     * @param integer $id numéro du type
     * @return Type objet type trouvé
     */
    public static function findById(int $id) :Type
    {
        $req = MonPdo::getInstance()->prepare("select * from type where num=:id");
        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Type');
        $req->bindParam(':id', $id);
        $req->execute();
        $resultat = $req->fetch();
        return $resultat;
    }

    /**
     * Ajouter un type
     *
     * @param type $type à ajouter
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function add(type $type) :int
    {
        $req = MonPdo::getInstance()->prepare("insert into type(libelle) values(:libelle)");
        $req->bindParam(':libelle', $type->getLibelle());
        $nb= $req->execute();
        return $nb;
    }

    /**
     * modifier un type
     *
     * @param Type $type  à modifier
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function update(Type $type) :int
    {
        $req = MonPdo::getInstance()->prepare("update type set libelle= :libelle where num= :id");
        $num=$type->getNum();
        $libelle=$type->getLibelle();
        $req->bindParam(':id',$num );
        $req->bindParam(':libelle', $libelle);
        $nb = $req->execute();
        return $nb;
    }

    /**
     * supprimer un type
     *
     * @param Type $type le type à supprimer
     * @return integer resultat (1 si tt est OK sinon 0)
     */
    public static function delete(Type $type) :int
    {
        $req =MonPdo::getInstance()->prepare("delete from type where num= :id");
        $num = $type->getNum();
        $req->bindParam(':id', $num);
        $nb = $req->execute();
        return $nb;
    }

    
}