<?php

    namespace App\DataFixtures;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Persistence\ObjectManager;
    use Faker\Factory;
    use App\Entity\User;

    class UserFixtures extends Fixture {

        private $faker;

        public function __construct(){

            $this->faker=Factory::create("fr_FR");
        }

        public function load(ObjectManager $manager): void {

            for($i=0;$i<10;$i++){
                $user = new User();
                $user->setNom($this->faker->lastName())
                    ->setPrenom($this->faker->firstName())
                    ->setRoles(array('ROLE_USER'))
                    ->setEmail(strtolower($user->getPrenom()).'.'.strtolower($user->getNom()).'@'.$this->faker->freeEmailDomain())
                    ->setPassword(strtolower($user->getPrenom()))
                    ->setDateInscription($this->faker->dateTimeThisYear())
                    ->setPseudo($this->faker->userName());
                $this->addReference('user'.$i, $user);
                $manager->persist($user);
            }

            $manager->flush();
        }

    }