<?php

namespace frontend\repositories;

use app\models\Certificate;

class CertificateRepository
{
    public function save(Certificate $certificate) : void
    {
        if(!$certificate->save(false)){
            throw new \DomainException('Saving error.');
        }
    }
}