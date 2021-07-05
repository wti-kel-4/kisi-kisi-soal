<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        try{
            $teachers_id = Teacher::where('nip', $row['nip'])->first();
            if($teachers_id){
                return new User([
                    'username' => $row['username'],
                    'password' => Hash::make($row['password']),
                    'teachers_id' => $teachers_id->id
                ]);
            }else{
                return null;
            }
        }catch(\Exception $ex){
            return null;
        }        
    }
}
