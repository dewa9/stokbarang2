<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class detail_penerimaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
             'kode_barang'=>'required',
             'kode-barang2'=>'required',
            'jumlah_barang' =>'required',
            'rowIdx' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_barang.required' => 'silahkan isi',
            'kode-barang2.required' => 'silahkan isi',
            'jumlah_barang.required' => 'silahkan isi'
        ];
    }
}
