<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public const PRODUCT_DONKEY_PELUCHE = 'PRODUCT_DONKEY_PELUCHE';
    public const PRODUCT_BOURRICOT = 'PRODUCT_BOURRICOT';
    public const PRODUCT_CROQUE_CAROTTE = 'PRODUCT_CROQUE_CAROTTE';
    public const PRODUCT_ENFANTS_CONTRE_PARENTS = 'PRODUCT_ENFANTS_CONTRE_PARENTS';
    public const PRODUCT_MIROGOLO = 'PRODUCT_MIROGOLO';

    public function load(ObjectManager $manager): void
    {
        $product = new Product();
        $product->setName('Super peluche de donkey');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_PELUCHES));
        $product->setPrice(12.23);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_DONKEY_PELUCHE, $product);

        $product = new Product();
        $product->setName('Bourricot');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_JEUX_DE_SOCIETE));
        $product->setPrice(33.99);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_BOURRICOT, $product);

        $product = new Product();
        $product->setName('Croque Carotte');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_JEUX_DE_SOCIETE));
        $product->setPrice(19.50);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_CROQUE_CAROTTE, $product);

        $product = new Product();
        $product->setName('Enfants contre parents');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_JEUX_DE_SOCIETE));
        $product->setPrice(19.50);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_ENFANTS_CONTRE_PARENTS, $product);

        $product = new Product();
        $product->setName('Mirogolo');
        $product->setCategory($this->getReference(CategoryFixtures::CATEGORY_JEUX_DE_SOCIETE));
        $product->setPrice(16.49);
        $manager->persist($product);
        $this->addReference(self::PRODUCT_MIROGOLO, $product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
