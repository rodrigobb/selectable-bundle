<?php 

namespace RBBusiness\SelectableBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SelectionAdmin extends Admin
{
    /**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'sel_key' // name of the ordered field (default = the model id field, if any)
        // the '_sort_by' key can be of the form 'mySubModel.mySubSubModel.myField'.
    );

    public function initialize()
    {
		parent::initialize();
		$this->selections = $this->getConfigurationPool()->getContainer()->get('rbbusiness.selectable');
    		
            $this->locales = $this->getConfigurationPool()->getContainer()->getParameter('available_languages');
            $this->locales = array_combine( $this->locales, $this->locales);
	}

    protected function configureFormFields(FormMapper $formMapper)
    {
        if (!$this->getSubject()->getId()) {
            $formMapper->add('sel_key', 'choice', array('choices' => $this->selections->getKeys()));
        } else {
            $formMapper->add('sel_key', 'hidden');
        }

        $formMapper
            ->add('sel_value')
            ->add('sel_label')
            ->add('locale', 'choice', array('choices' => $this->locales, 'required' => true))
            ->add('idx', 'number')
            ->add('description')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('sel_key',             'doctrine_orm_choice', array(), 
                                'choice' , array('choices' => $this->selections->getKeys()))
            ->add('locale',                'doctrine_orm_choice', array(), 
                                'choice' , array('choices' => $this->locales))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
//        $fields = $this->getExportFields();
//
//        foreach ($fields as $field) {
//            $listMapper->add($field);
//        }

        $listMapper
            ->add('sel_key')
            ->add('sel_value')
            ->add('locale')
            ->add('sel_label')
        ;

        $listMapper->add( '_action', 'actions', array ( 'actions' => array ( 'edit' => array(), 'delete' => array ()),
          ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getExportFormats()
    {
        return array();
    }
}