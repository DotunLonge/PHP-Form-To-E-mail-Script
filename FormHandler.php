<?


//create a class, so it can be used by anyone
//regardless of if the method is a form or post, extract data
//create a way to extract form data regardless of what is being sent
// create a function that sends the data to the email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
class FormHandler {
    
    protected $yourEmail;
    protected $SendToEmail;
    protected $yourPassword;
    protected $data;
    protected  $subject;
    protected $mail;

    public function __construct(){
      
        $this->mail = new PHPMailer(true);
    }

    public function setYourEmail($value){
        $this->yourEmail= $value;
    }

    public function setSendToEmail($value){
        $this->SendToEmail= $value;
    }
    public function setYourPassword($value){
        $this->yourPassword= $value;
    }
    
    public function setFormData($data){
        $this->data = $data;
    }

     public function setFromEmail($value){
        $this->data = $value;
    }

    public function setSubject($value){
        $this->subject = $value;
    }

    protected function mergedData(){
    $endResult = "";
        foreach ( $this->data as $key => $value) {
            $endResult = $endResult. "$key" . " : " . "$value" . "<br>";
            echo $value;

        }
        return $endResult;
    }

    public function send(){
        echo $this->yourEmail."<br>";
echo $this->yourPassword;
        
                            // Passing `true` enables exceptions
try {
    //Server settings
    $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $this->mail->isSMTP();                                      // Set mailer to use SMTP
    $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
    $this->mail->Username = $this->yourEmail;                 // SMTP username
    $this->mail->Password = $this->yourPassword;                           // SMTP password
    $this->mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $this->mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $this->mail->setFrom($this->yourEmail, 'Mailer');
    $this->mail->addAddress($this->SendToEmail);               // Name is optional

    //Content
    $this->mail->isHTML(true);                                  // Set email format to HTML
    $this->mail->Subject = 'Data From Form For '.$this->subject;
    $this->mail->Body    = $this->mergedData();;
    $this->mail->AltBody = $this->mergedData();

    $this->mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $this->mail->ErrorInfo;
}
    }
}