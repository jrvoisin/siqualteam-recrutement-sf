<?php

namespace App\Form;

use App\Entity\Config;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('moderationLevel', ChoiceType::class, ['choices' => $this->getModerationChoices()])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Config::class,
        ]);
    }

    public function getModerationChoices(): array {

        $choices = Config::MODERATION_LEVEL;
        
        $list = [];
        
        foreach($choices as $key => $value) {

            $list[$value] = $key;

        }

        return $list;

    }
}
