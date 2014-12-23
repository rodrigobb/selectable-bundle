<?php

namespace RBBusiness\SelectableBundle\Twig;

use RBBusiness\SelectableBundle\Service\Selectable;

class SelectableExtension extends \Twig_Extension
{
    protected $selectable;

    public function __construct(Selectable $selectable)
    {
        $this->selectable = $selectable;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('selection', array($this, 'selectionFilter')),
        );
    }

    public function selectionFilter($fieldvalue, $fieldname = null)
    {
        if ((false === $fieldvalue) || (null === $fieldvalue))
             return '';

        return $this->selectable->getLabel($fieldname, $fieldvalue);
    }

    public function getName()
    {
        return 'selectable_extension';
    }
}