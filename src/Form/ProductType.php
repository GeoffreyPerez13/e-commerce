<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Nom', 'attr' => ['placeholder' => 'Nom']])
            ->add('description', TextType::class, ['label' => 'Description', 'attr' => ['placeholder' => 'Description']])
            ->add('price', NumberType::class, ['label' => 'Prix', 'attr' => ['placeholder' => 'Prix']])
            ->add('currency', TextType::class, ['label' => 'Devise', 'attr' => ['placeholder' => 'Devise']])
            ->add('image', TextType::class, ['label' => 'Image', 'attr' => ['placeholder' => 'Image']])
            ->add('imageFile', VichFileType::class, [
                'required' => false,
                'label' => 'Télécharger une nouvelle image',
                'download_label' => 'Télécharger', // Définit le libellé du lien de téléchargement
                'allow_delete' => false, // Enlever la case cochable
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
