<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new User([
            'nombre' => $row['Nombre'],
            'apellido' => $row['Apellido'],
            'documento' => $row['NIF/CIF'],
            'direccion' => $row['Dirección'],
            'cp' => $row['Código Postal'],
            'provincia_id' => $row['Población'],
            'localidad_id' => 1,
            'telefono' => $row['Teléfono'],
            'movil' => $row['Móvil'],
            'email' => $row['Correo Electrónico'],
            'documento_id' => $row['Tipo De Documento'],
            'tipocliente_id' => $row['Tipo Cliente'],
            'delegacion_id' => 1,
            'estadocivil_id' => $row['Estado Civil'],
            'user_id' => 1,
            'alta' => $row['Fecha Alta'],




            'category_id' => $this->categories[$row['categoria']],



            'cp' => $row['cp'],
            'cp' => $row['cp'],
            'cp' => $row['cp'],
            'cp' => $row['cp'],
            'cp' => $row['cp'],
        ]);
    }
}
