<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;


class RequestStoreSiswa extends FormRequest
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
            'nis'=>'required|numeric|unique:mastersiswa',
            'nama' =>'required',
            'alamat' =>'required'

        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'silahkan isi genk',
            'nis.numeric' => 'nis harus angka',
            'nis.unique' => 'nis sudah ada',
            'nama.required' => 'silahkan isi nama',
            'alamat.required' => 'silahkan isi alamat'
        ];
    }
}
