<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenerimaanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'tanggal_penerimaan'=>'required',
            'allItemPenerimaan'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'tanggal_penerimaan.required' => 'silahkan isi tanggal',
            'allItemPenerimaan.required' => 'silahkan isi'
        ];
    }
}
