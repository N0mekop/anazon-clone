<?php

namespace App\Controller\Admin;

use App\Admin\Field\VichFileField;
use App\Admin\Field\VichImageField;
use App\Entity\Product;
use App\Form\ProductImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield FormField::addTab('Informations générales');
        yield AssociationField::new('category')->autocomplete();
        yield Field::new('name');
        yield VichImageField::new('imageFile');
        yield MoneyField::new('price')->setCurrency('EUR')->setStoredAsCents(false);
        yield TextEditorField::new('description')->hideOnIndex();

        yield FormField::addPanel('Doc');
        yield VichFileField::new('manualFile');

        yield FormField::addTab('Images');
        yield CollectionField::new('productImages')
            ->hideOnIndex()
            ->setEntryType(ProductImageType::class);
    }
}
