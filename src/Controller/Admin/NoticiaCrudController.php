<?php

namespace App\Controller\Admin;

use App\Entity\Noticia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class NoticiaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Noticia::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('titulo'),
            TextField::new('subtitulo'),
            TextareaField::new('conteudo'),
            DateTimeField::new('data'),
            BooleanField::new('premium'),
            AssociationField::new("autor_id")
        ];
    }
}
