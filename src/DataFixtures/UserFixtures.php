<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $superAdmin = new User();

        $superAdmin->setEmail('presidentasf@gmail.com');
        $superAdmin->setRoles(['ROLE_SUPERADMIN']);
        $superAdmin->setPassword($this->passwordEncoder->encodePassword(
            $superAdmin,
            'ASF2021'
        ));

        $manager->persist($superAdmin);

        $manager->flush();
    }
}
