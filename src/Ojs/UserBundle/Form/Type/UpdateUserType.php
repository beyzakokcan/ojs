<?php

namespace Ojs\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use OkulBilisim\LocationBundle\Form\EventListener\AddCountryFieldSubscriber;
use OkulBilisim\LocationBundle\Form\EventListener\AddProvinceFieldSubscriber;

class UpdateUserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', ['label' => 'user'])
            ->add(
                'firstName',
                'text',
                [
                    'attr' => [
                        'label' => 'firstname',
                        'class' => 'validate[required,minSize[2]]',
                    ],
                ]
            )
            ->add(
                'lastName',
                'text',
                [
                    'attr' => [
                        'label' => 'lastname',
                        'class' => 'validate[required,minSize[2]]',
                    ],
                ]
            )
            ->add('about')
            ->add('url')
            ->add(
                'subjects',
                'entity',
                array(
                    'label' => 'subjects',
                    'class' => 'Ojs\JournalBundle\Entity\Subject',
                    'multiple' => true,
                    'expanded' => false,
                    'attr' => array('class' => 'select2-element', 'style' => 'width:100%'),
                    'required' => false,
                )
            )
            ->add('avatar', 'jb_crop_image_ajax', array(
                'endpoint' => 'user',
                'img_width' => 200,
                'img_height' => 200,
                'crop_options' => array(
                    'aspect-ratio' => 200 / 200,
                    'maxSize' => "[200, 200]"
                )
            ))
            ->add(
                'privacy',
                'checkbox',
                [
                    'label' => 'user.hide_account',
                    'required' => false,
                ]
            )
            ->add('country', 'entity', array(
                'class'         => 'OkulBilisim\LocationBundle\Entity\Country',
                'required'      => false,
                'label'         => 'Country',
                'empty_value'   => 'Select Country',
                'attr'          => array(
                    'class' => 'select2-element',
                ),
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'Ojs\UserBundle\Entity\User',
                'cascade_validation' => true,
                'attr' => [
                    'class' => 'validate-form',
                    'novalidate' => 'novalidate',
                ],
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ojs_userbundle_updateuser';
    }
}
