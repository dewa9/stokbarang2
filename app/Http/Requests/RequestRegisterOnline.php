<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegisterOnline extends FormRequest
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
            
            'nama_lengkap' =>'required',
            'tempat_lahir' =>'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat_lengkap'=>'required',
            'tinggi_badan' => 'required',
            'berat_badan'=> 'required',
            'no_telepon' => 'required|numeric',
            'email' => 'required',
            //data sekolah
            'asal_sekolah' => 'required',
            'alamat_sekolah' => 'required',
            'jurusan_sekolah' => 'required',
            'tahun_kelulusan' => 'require',
            //data orang tua
            'nama_orang_tua' => 'required',
            'alamat_orang_tua' => 'required',
            'kota_orang_tua' => 'required',
            'pekerjaan_orang_tua' => 'required'


        ];
    }

    public function messages()
    {
        return [
            'nama_lengkap.required' => 'Tidak boleh kosong',
            'tempat_lahir.required' => 'Tidak boleh kosong',
            'tanggal_lahir.required' => 'Tidak boleh kosong',
             'jenis_kelamin.required' => 'Tidak boleh kosong',
             'agama.required' => 'Tidak boleh kosong',
             'alamat_lengkap.required' => 'Tidak boleh kosong',
             'tinggi_badan.required' => 'Tidak boleh kosong',
            'berat_badan.required'=> 'Tidak boleh kosong',
             'no_telepon.required' => 'Tidak boleh kosong',
            'no_telepon.numeric' => 'Tidak boleh kosong',

              //data sekolah
            'asal_sekolah.required' => 'Tidak boleh kosong',
            'alamat_sekolah.required' => 'Tidak boleh kosong',
            'jurusan_sekolah.required' => 'Tidak boleh kosong',
            'tahun_kelulusan.required' => 'Tidak boleh kosong',
            //data orang tua
            'nama_orang_tua.required' => 'Tidak boleh kosong',
            'alamat_orang_tua.required' => 'Tidak boleh kosong',
            'kota_orang_tua.required' => 'Tidak boleh kosong',
            'pekerjaan_orang_tua.required' => 'Tidak boleh kosong',
            
        ];
    }
}
