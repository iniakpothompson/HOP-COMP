<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Entity\BlogComment;
use App\Entity\Employees;
use App\Entity\GuestOrCustomer;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use phpDocumentor\Reflection\Types\Self_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     *
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var Faker\Factory
     * @param faker
     */
    private $faker;
    const USERS=[
        [
            'email'=>'oro@gmail.com',
            'password'=>'secrete1',
            'roles'=>[User::ROLE_ADMIN],
        ],
        [
            'email'=>'ok@gmail.com',
            'password'=>'secrete2',
            'roles'=>[User::ROLE_GUEST],
        ],
        [
            'email'=>'ola@gmail.com',
            'password'=>'secrete3',
            'roles'=>[User::ROLE_CM],
        ],
        [
            'email'=>'oto@gmail.com',
            'password'=>'secrete4',
            'roles'=>[User::ROLE_CC],
        ],
        [
            'email'=>'oyo@gmail.com',
            'password'=>'secrete5',
            'roles'=>[User::ROLE_ACCOUNTANT],
        ],
        [
            'email'=>'ojo@gmail.com',
            'password'=>'secrete6',
            'roles'=>[User::ROLE_HO],
        ],
        [
            'email'=>'odo@gmail.com',
            'password'=>'secrete1',
            'roles'=>[User::ROLE_HRM],
        ],
    ];

    public function __construct(UserPasswordEncoderInterface $passwordEncoder ){
    $this->passwordEncoder=$passwordEncoder;
    $this->faker=\Faker\Factory::create();

}
    public function load(ObjectManager $manager)
    {
//         $product = new Product();
//         $manager->persist($product);
        $this->loadGuestOrCustomer($manager);
        $this->loadUsers($manager);
        $this->loadEmployees($manager);
        $this->loadBlog($manager);
        $this->loadBlogComment($manager);
        //$manager->flush();
    }
    function loadUser(ObjectManager $manager){

        for ($i = 1; $i<10; $i++) {
            $user = new User();
            $user->setEmail($this->faker->email);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $this->faker->password(6, 20)));
            $user->setRoles($this->faker->shuffleArray(array("ROLE_ACCOUNTANT","ROLE_CONTENT_MANAGER")));
            $this->setReference("user_$i", $user);
            $manager->persist($user);
        }
        $manager->flush();

    }
    function loadGuestOrCustomer(ObjectManager $manager)
    {

        for ($j = 1; $j <10; $j++) {
            $guest = new GuestOrCustomer();
            $guest->setAddress($this->faker->address);
            $guest->setFirstName($this->faker->firstName);
            $guest->setLastName($this->faker->lastName);
            $guest->setCity($this->faker->city);
            $guest->setPhoneNumber($this->faker->phoneNumber);
            $guest->setCountry($this->faker->country);
            $guest->setEmailAddress($this->faker->email);
            $guest->setGender($this->faker->randomElement($array = array('male', 'female')));
            $guest->setState($this->faker->text);
            $guest->setZipcode($this->faker->postcode);
            $this->setReference("guest_$j", $guest);
            $manager->persist($guest);
        }

        $manager->flush();
}
function loadEmployees(ObjectManager $manager)
{

    for ($i = 1; $i <10; $i++) {
        $employee = new Employees();
        $employee->setLastName($this->faker->lastName);
        $employee->setFirstName($this->faker->firstName);
        $employee->setBirthDate($this->faker->dateTime);
        $employee->setMaritalStatus($this->faker->randomElement($array = array('Married', 'Single')));
        $employee->setNumberOfChildren($this->faker->numberBetween(1, 40));
        $employee->setImage($this->faker->text(20));
        $userRef=$this->getUserReference($employee);
        $employee->setUser($userRef);
        $this->setReference("employee_$i", $employee);
        $manager->persist($employee);
    }

    $manager->flush();

}
function loadBlog(ObjectManager $manager)
{


    // $author=$this->getReference('blog_author_id');
    for ($i = 1; $i <10; $i++) {
        $blog = new Blog();
        $userRef=$this->getUserReference($blog);
        $blog->setAuthor($userRef);
        $blog->setBlogContent($this->faker->realText(10, 5));
        $blog->setBlogTitle($this->faker->text(50));
        $blog->setPublishedDate($this->faker->dateTime('now'));
        $blog->setDateModified($this->faker->dateTime('now'));
        $this->setReference("blog_$i", $blog);

        $manager->persist($blog);
    }

        $manager->flush();
}
function loadBlogComment(ObjectManager $manager){
    for($i=1; $i<10; $i++) {
        for ($j = 1; $j <= rand(1, 5); $j++) {
            $blogComment = new BlogComment();
            $userRef=$this->getUserReference($blogComment);
            $blogComment->setAuthor($userRef);
            $blogComment->setBlog($this->getReference("blog_$i"));
            $blogComment->setName($this->faker->text(20));
            $blogComment->setContent($this->faker->realText(20, 5));
            $blogComment->setPublishedDate($this->faker->dateTime('now'));
            $manager->persist($blogComment);
        }
    }
        $manager->flush();
}
function loadUsers(ObjectManager $manager){
    foreach (self::USERS as $userFixtures){
        $user = new User();
        $user->setEmail($userFixtures['email']);
        $user->setPassword($this->passwordEncoder->encodePassword($user,$userFixtures['password']));
        $user->setRoles($userFixtures['roles']);
        $this->setReference('user_' . $userFixtures['email'], $user);
        $manager->persist($user);
    }
    $manager->flush();
}

    /**
     * @param $entity
     * @return string
     */
    public function getUserReference($entity): User
    {
//        $randomUser=self::USERS[rand(0, 3)];
//        if($entity instanceof BlogPost && !count(array_intersect($randomUser['roles'],[User::ROLE_CM,User::ROLE_ADMIN]))){
//            return $this->getReference($this->getUserReference($entity));
//        }
//        if($entity instanceof BlogComment && !count(array_intersect($randomUser['roles'],[User::ROLE_ADMIN,User::ROLE_CM,User::ROLE_GUEST]))){
//            return $this->getReference($this->getUserReference($entity));
//        }
//        if($entity instanceof Employees && !count(array_intersect($randomUser['roles'],[User::ROLE_ADMIN,User::ROLE_CM,User::ROLE_GUEST]))){
//            return $this->getReference($this->getUserReference($entity));
//        }
        return $this->getReference('user_' .self::USERS[rand(0, 3)]['email']);
    }
}
