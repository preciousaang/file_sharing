<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
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
            'name' => 'required|max:150',
            'description'=>'required|max:500',
            'course_code'=>'required|size:6',
            'file'=>'required|file'//mimes:jpeg,gif,jpg,3gpp,amr,png,mp3,bmp,mkv,flv,wav,avi,pdf,docx,xlsx,rtf,csv,3gp,mp4,txt,mpg,mpeg,zip,rar'
        ];
    }
}
