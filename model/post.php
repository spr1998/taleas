<?php

   require 'vendor/autoload.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;


    class Post {
      // we define 3 attributes
      // they are public so that we can access them using $post->author directly
      public $id;
      public $name;
      public $content;
      public $titull;
      public $data;

      public function __construct($id, $name, $content, $titull, $data) {
        $this->id      = $id;
        $this->name  = $name;
        $this->content = $content;
        $this->titull = $titull;
        $this->data = $data;
      }

      public static function all() {
        $list = [];
        $db = Db::getInstance();
        $result = $db->query('SELECT id, name, content, titull,data FROM post ORDER BY id DESC');

        
        foreach($result->fetchAll() as $post) {
          $list[] = new Post($post['id'], $post['name'], $post['content'], $post['titull'], $post['data']);
        }

        return $list;
      }



      public function add($title,$content,$id){
         $db = Db::getInstance();

        $result = $db->prepare("SELECT email,name FROM user WHERE id = ?");
        $result->execute([$id]);
        $user = $result->fetch();

        $result1 = $db->prepare("SELECT email,fname,lname FROM prof WHERE id = ?");
        $result1->execute([$id]);
        $user1 = $result1->fetch();

        $result2 = $db->prepare("SELECT email,fname,lname FROM store WHERE id = ?");
        $result2->execute([$id]);
        $user2 = $result2->fetch();

        if($user != ''){

          $email = $user["email"];
        $name = $user["name"];

        } else if($user1 != ''){
         
         $email = $user1["email"];
        $name = $user1["fname"].' '.$user1["lname"];
        

        }
         else if(user2 != ''){
         $email = $user2["email"];
        $name = $user2["fname"].' '.$user2["lname"];
        

         }

      
      
        $data =  date('Y-m-d h:m');

          $result = $db->prepare("INSERT INTO post(titull,content,email,name,data) VALUES (:title, :content, :email, :name, :data)");

            $result->execute(array('title' => $title,'content' => $content , 'email' => $email , 'name' =>$name ,'data'=> $data ));
           
        $result = $db->prepare("SELECT id FROM post ORDER BY id DESC");
        $result->execute([$id]);
        $user = $result->fetch();

        return $user["id"];



      }


      public function sendSubscribeMail($id){

        $db = Db::getInstance();

        $result = $db->prepare("SELECT email FROM subscribe");
        $result->execute();
        $user = $result->fetchAll();
      
        foreach ($user as $key => $email) {

        $mail = new PHPMailer(true);                              
              try {
                  //Server settings
                  $mail->SMTPDebug = 0;                                 
                  $mail->isSMTP();                                      
                  $mail->Host = 'smtp.gmail.com';  
                  $mail->SMTPAuth = true;                               
                  $mail->Username = 'petprojecttaleas@gmail.com';                
                  $mail->Password = 'Serena1234';                           
                  $mail->SMTPSecure = 'tls';                            
                  $mail->Port = 587;                                    

                  
                  $mail->setFrom('petprojecttaleas@gmail.com', '4 Paw Friends');
                  $mail->addAddress($email['email']);    

                
                  $mail->isHTML(true);                                  
                  $mail->Subject = 'New post';
                  $mail->Body    = "Hey there! Look at this amazing new post <a href='http://localhost/taleas/index.php?controller=posts&action=showPost&id=$id' >Click here</a>";

                  $mail->send();
                
                 
               
              }

              catch (Exception $e) {
                  echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
              }
                    
              return true;
          }

        


      }

      public static function lastPost($id){

          $list = [];
          $db = Db::getInstance();
          $result = $db->query('SELECT id, name, content, titull,data FROM post ORDER BY id DESC');

        
        foreach($result->fetchAll() as $post) {

            $list[] = new Post($post['id'], $post['name'], $post['content'], $post['titull'], $post['data']);
        }

            return $list;
        
        

      }


      public function findAndSubscribe($id){

            $result = $db->prepare("SELECT email,name FROM user WHERE id = ?");
            $result->execute([$id]);
            $user = $result->fetch();

            $result1 = $db->prepare("SELECT email,name FROM prof WHERE id = ?");
            $result1->execute([$id]);
            $user1 = $result1->fetch();

            $result2 = $db->prepare("SELECT email,name FROM store WHERE id = ?");
            $result2->execute([$id]);
            $user2 = $result2->fetch();




      }

    }
  ?>