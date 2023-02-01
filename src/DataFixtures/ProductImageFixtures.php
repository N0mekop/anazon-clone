<?php

namespace App\DataFixtures;

use App\Entity\ProductImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $productImage = new ProductImage();
        $productImage->setPath('ane-en-peluche.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_DONKEY_PELUCHE));
        $manager->persist($productImage);

        $productImage = new ProductImage();
        $productImage->setPath('bourricot.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_BOURRICOT));
        $manager->persist($productImage);

        $productImage = new ProductImage();
        $productImage->setPath('croque-carotte.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_CROQUE_CAROTTE));
        $manager->persist($productImage);

        $productImage = new ProductImage();
        $productImage->setPath('enfants-contre-parents.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_DONKEY_PELUCHE));
        $manager->persist($productImage);

        $productImage = new ProductImage();
        $productImage->setPath('mirogolo.jpg');
        $productImage->setPosition(1);
        $productImage->setProduct($this->getReference(ProductFixtures::PRODUCT_MIROGOLO));
        $manager->persist($productImage);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class,
        ];
    }
}
