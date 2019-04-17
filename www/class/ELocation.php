<?php
/**
 * @brief	Objet Location
 * @remark  Cet objet est utilisé comme conteneur
 * 
 */
class ELocation {
	/**
	 * @brief	Le Constructor appelé au moment de la création de l'objet. ex: new ELocation();
     * @param InIdLocation	L'identifiant de la location. (Optionel) Defaut ""
	 * @param InDateStart	La date de début de la location. (Optionel) Defaut ""
	 * @param InDateStop	La date de fin de la location. (Optionel) Defaut ""
	  */
    public function __construct($InIdLocation = "", $InDateStart = "", $InDateStop = "")
    {
        $this->idLocation = $InIdLocation;
		$this->DateStart = $InDateStart;
		$this->DateStop = $InDateStop;
    }
    /**
	 * @var string Identifiant location
	 */
	public $idLocation;
	/**
	 * @var string Date de début 
	 */
	public $DateStart;
	/**
	 * @var string Date de fin
	 */
	public $DateStop;
}

?>