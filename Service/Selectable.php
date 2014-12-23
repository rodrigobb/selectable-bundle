<?php

namespace RBBusiness\SelectableBundle\Service;

use \Doctrine\ORM\EntityManager;
use \Symfony\Component\HttpFoundation\RequestStack;

/**
 * Description of Selectable
 *
 * @author rodrigo
 */
class Selectable {
	private $em;
    private $locale;
    private $values;

	public function __construct(EntityManager $em, RequestStack $requestStack, $locale) {
		$this->em = $em;
        $this->values = array();

        if ($requestStack && ($request = $requestStack->getCurrentRequest())) {
            $this->locale = $request->getLocale();
        } else {
            $this->locale = $locale;
        }
	}


	public function getKeys () {
		$q = $this->em
			->createQuery("SELECT DISTINCT s.sel_key FROM RBBusinessSelectableBundle:Selection s ORDER BY s.sel_key");

		foreach  ($q->getArrayResult() as $option) {
			$result[$option['sel_key']] = $option['sel_key'];
		}

		return $result;
	}

    public function getValues ($selection_key, $with_empty = false) {

        if (
            array_key_exists($selection_key, $this->values) &&
            array_key_exists($with_empty ? 'with_empty' : 'no_empty', $this->values[ $selection_key ])
        ) {
            return $this->values[ $selection_key ][ $with_empty ? 'with_empty' : 'no_empty'];
        }

		$q = $this->em
			->createQuery("SELECT s.sel_value, s.sel_label FROM RBBusinessSelectableBundle:Selection s WHERE s.locale='$this->locale' AND s.sel_key = '$selection_key' ORDER BY s.idx ASC");

		$result = $with_empty? array ('' => '') : array ();
		
		foreach  ($q->getArrayResult() as $option) {
			$result[$option['sel_value']] = $option['sel_label'];
		}

        //Cache
        $this->values[ $selection_key ][ $with_empty ? 'with_empty' : 'no_empty'] = $result;

		return $result;
	}

	public function getLabel ($selection_key, $selection_value) {

		$result =  $this->em->getRepository('RBBusinessSelectableBundle:Selection')
							->findOneBy( array ('sel_key' => $selection_key, 'sel_value' => $selection_value));

		if ($result)
			return $result->getSelLabel();
		else
			return $selection_value;
	}
}
