<?php

namespace Pages\PagesBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class constraintsCheckUrl extends Constraint {
    
    public $message = 'Le champ contient des liens non valides';
    
    public function validatedBy() {
        return 'validatorCheckUrl';
    }
}
