<?php

namespace Mmi\Bundle\BlogBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Memo
 *
 * @author Johann Berthet
 */
class Memo {
    
    /**
     * @Assert\Type(type="string")
     */  
    protected $id;

    /**
     * @Assert\Type(type="string")
     * @Assert\NotBlank()
     */
    protected $message;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}

?>
