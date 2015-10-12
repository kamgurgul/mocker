<?php
/**
 * Created by PhpStorm.
 * User: kgurgul
 * Date: 2015-10-12
 * Time: 21:26
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MockType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*        $builder
                    ->add('task')
                    ->add('dueDate', null, array('widget' => 'single_text'))
                    ->add('save', 'submit');*/
    }

    public function getName()
    {
        return 'mock';
    }
}