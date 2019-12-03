<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class UsersRequest extends FormRequest

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
   
    public function rules(Request $request)
    {
     
        return [
            'mobile' => 'required|regex:/[0-9]/|unique:users,mobile,'.$request->id ,
            'name' => 'required',
            'password'=> 'required'
        
        ];
    }

    public function messages()
    {
        return [
        
           
            'name.required' => 'Please enter your name',
            'mobile.required' => 'Please enter mobile',
            'password.required' => 'Please enter password',
           

        ]; 
    }

    
    protected function failedValidation(Validator $validator) {
        $result = ['status' => false ,'data' => implode(PHP_EOL ,$validator->errors()->all())];
        throw new HttpResponseException(response()->json($result, 200));
    }
}
