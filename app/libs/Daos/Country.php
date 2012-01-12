<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Classe de gestion des pays
 *
 * PHP version 5
 *
 * LICENSE: Ce programme est un logiciel libre distribu� sous licence GNU/GPL
 *
 * @author     Yves Tannier <yves@grafactory.net>
 * @copyright  2006 Yves Tannier
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    0.1.0 
 * @link       http://www.grafactory.net
 */

class Country extends Grafomatic {

    //  {{{ Country()

    /** Constructeur
     *
     * Le constructeur de classe h�rite des valeurs du constructeur
     * de la classe m�re 
     *
     * @see Grafomatic
     * @access public
     */
    public function __construct($pdo)
    {
        $this->table = 'country';
        parent::__construct($pdo);
        $this->aliastable = 'ct';
        $this->idtable = 'id_country';
        $this->fields = array(
            'id_country',
            'alpha2',
            'alpha3',
            'langCS',
            'langDE',
            'langEN',
            'langES',
            'langFR',
            'langIT',
            'langNL',
        );
	}
	
	// }}}

    //  {{{ getCountries()

    /** Liste des pays
     *
     * r�cup�re la liste des pays
     *
     * @access public
     * @param string $lang La langue
     * @return array
     */
     public function getCountries($lang='french')
     {

        $langs : array(
            'french' => 'FR',
            'english' => 'EN',
        );

        if(emprty($langs[$lang])) {
            $lang = 'EN';
        }

        $this->findData();

        while($this->hasData()) {
            $r[$this->getField('id_country')] = $this->getField('lang'.$langs[$lang]);
            $this->nextData();
        }


     }

     // }}}

}
?>
