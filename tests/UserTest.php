<?php

<<<<<<< HEAD
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */
    require_once 'src/User.php';

    $server = 'mysql:host=localhost;dbname=discogs_test';
    $user = 'root';
    $password = 'root';
    $DB = new PDO($server, $user, $password);

    class UserTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            User::deleteAll();
        }

        function test_getUserName()
        {
            // Arrange
            $username = 'user';
            $password = 'user';
            $new_user = new User($username, $password);

            // Act
            $result = $new_user->getUserName();

            // Assert
            $this->assertEquals('user', $result);
        }

        function test_save()
        {
            // Arrange
            $username = 'user';
            $password = 'user';
            $new_user = new User($username, $password);


            // Act
            $new_user->save();

            // Arrange
            $result = User::getAll();
            $this->assertEquals($new_user, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $username1 = 'user';
            $password1 = 'user';
            $new_user1 = new User($username1, $password1);
            $new_user1->save();

            $username2 = 'user2';
            $password2 = 'user2';
            $new_user2 = new User($username2, $password2);
            $new_user2->save();

            // Act
            $result = User::getAll();
            $this->assertEquals([$new_user1, $new_user2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $username = 'user';
            $password = 'user';
            $new_user = new User($username, $password);
            $new_user->save();

            // Act
            User::deleteAll();
            $result = User::getAll();

            // Assert
            $this->assertEquals([], $result);
        }

    }
=======
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

require_once "src/User.php";
require_once "src/Record.php";

$server = 'mysql:host=localhost;dbname=discogs_test';
$username = 'root';
$password = 'root';
$DB = new PDO($server, $username, $password);

class UserTest extends PHPUnit_Framework_TestCase
{
    protected function TearDown()
    {
        User::deleteAll();
        Record::deleteAll();
    }

    function test_getUserName()
    {
        //Arrange
        $name = "Jeff";
        $id = null;
        $test_name = new User($name, $id);

        //Act
        $result = $test_name->getUserName();

        //Assert
        $this->assertEquals($name, $result);
    }

    function test_getPassword()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_password = new User($name, $password, $id);

        //Act
        $result = $test_password->getPassword();

        //Assert
        $this->assertEquals($password, $result);
    }

    function test_getId()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_id = new User($name, $password, $id);

        //Act
        $result = $test_id->getId();

        $this->assertEquals($id, $result);
    }

    function test_save()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_user = new User($name, $password, $id);
        $test_user->save();

        //Act
        $result = User::getAll();

        //Assert
        $this->assertEquals([$test_user], $result);
    }

    function test_getAll()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_user = new User($name, $password, $id);
        $test_user->save();

        $name2 = "Steve";
        $password2 = "poot";
        $id2 = 2;
        $test_user2 = new User($name2, $password2, $id2);
        $test_user2->save();

        //Act
        $result = User::getAll();

        //Assert
        $this->assertEquals([$test_user, $test_user2], $result);
    }

    function test_addRecords()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_user = new User($name, $password, $id);
        $test_user->save();

        $title = "Awesome";
        $artist = "Erik T";
        $genre = "Jazz";
        $track = "Good";
        $release_date = "2000-01-01";
        $id = 1;
        $test_record = new Record($title, $artist, $genre, $track, $release_date, $id);
        $test_record->save();

        //Act
        $test_user->addRecord($test_record);
        $result = $test_user->getRecords();

        //Assert
        $this->assertEquals([$test_record], $result);
    }

    function test_getRecords()
    {
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_user = new User($name, $password, $id);
        $test_user->save();

        $title = "Awesome";
        $artist = "Erik T";
        $genre = "Jazz";
        $track = "Good";
        $release_date = "2000-01-01";
        $image = null;
        $id = 1;
        $test_record = new Record($title, $artist, $genre, $track, $release_date, $image,$id);
        $test_record->save();

        $title2 = "Yeah";
        $artist2 = "Berik B";
        $genre2 = "Rock";
        $track2 = "Great";
        $release_date2 = "2000-02-02";
        $image = null;
        $id2 = 1;
        $test_record2 = new Record($title2, $artist2, $genre2, $track2, $release_date2, $image, $id2);
        $test_record2->save();

        //Act
        $test_user->addRecord($test_record);
        $test_user->addRecord($test_record2);
        $result = $test_user->getRecords();

        //Assert
        $this->assertEquals([$test_record, $test_record2], $result);
    }

    function test_find()
    {
        //Arrange
        $name = "Jeff";
        $password = "root";
        $id = 1;
        $test_user = new User($name, $password, $id);
        $test_user->save();

        //Act
        $result = User::find($test_user->getId());

        //Assert
        $this->assertEquals($test_user, $result);
    }
}

>>>>>>> master
?>