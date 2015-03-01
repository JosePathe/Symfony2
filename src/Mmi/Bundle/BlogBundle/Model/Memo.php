<?php

namespace Mmi\Bundle\BlogBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Contact
 *
 * @author Johann Berthet
 */
class Memo {
    
    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $subject;
    
    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $message;
    
    public function getSubject() {
        return $this->subject;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}

?>
