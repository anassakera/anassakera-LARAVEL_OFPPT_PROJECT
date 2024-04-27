// app/Http/Requests/UsersStoreUserRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreUserRequest extends FormRequest
{
    public function authorize()
    {
        // تأكد من أن الشخص الذي يقدم الطلب مخول للقيام بهذا الإجراء
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            // أضف قواعد التحقق الأخرى حسب الحاجة
        ];
    }
}
