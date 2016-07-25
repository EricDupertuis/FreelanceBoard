<?php

namespace WebRobot\FreelanceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WebRobot\FreelanceBundle\Entity\Client;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName')
            ->add('phone')
            ->add('email')
            ->add('language')
            ->add('notes', TextareaType::class, [

            ])
            ->add('client', 'genemu_jqueryselect2_entity', [
                'class' => 'WebRobot\FreelanceBundle\Entity\Client',
                'property' => 'name',
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebRobot\FreelanceBundle\Entity\Contact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webrobot_freelancebundle_contact';
    }
}
