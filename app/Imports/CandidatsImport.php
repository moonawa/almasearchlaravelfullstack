<?php

namespace App\Imports;

use App\Models\Candidat;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CandidatsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      
        $birthday = $row['birthday'];
        if (is_numeric($birthday)) {
            // Convertir la date Excel au format Y-m-d
            $birthday = Date::excelToDateTimeObject($birthday)->format('Y-m-d');
        }
        // Créer d'abord l'utilisateur
        $user = User::create([
            'name' => $row['nom'] . ' ' . $row['prenom'],
            'email' => $row['email'],
            'password' => Hash::make('A#w!88a32'), 
            'alma' => 0,
            'status' => 1,
        ]);
       
        // Ensuite, créer le candidat en liant le user_id
        return  Candidat::create([
            'user_id' => $user->id,
            'fonction' => $row['fonction'],
            'birthday' => $birthday,
            'secteuractivitecandidat' => $row['secteuractivitecandidat'],
            'trancheanneeexpeience' => $row['trancheanneeexpeience'],
            'disponibilite' => $row['disponibilite'],
        ]);
       
    }
    }

