<?php

namespace App\Enums;

enum UserRole: string{

    case ADMIN = 'admin';
    case ENSEIGNANT = 'enseignant';
    case ETUDIANT = 'etudiant';
}
