<?php
// src/Form/QuestionType.php
namespace App\Form;

use App\Entity\Assessment\Group;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class QuestionType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('question_group', TextType::class)
            ->add('text', TextType::class)
            ->add('users', EntityType::class, [
                'class' => Group::class,
                'choice_label' => 'title'
            ])
            ->add('save', SubmitType::class, array('label' => 'Add question'));
    }
}