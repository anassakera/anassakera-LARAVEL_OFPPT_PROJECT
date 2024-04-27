// app/Http/Requests/UsersUpdateUserRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        // تأكد من أن الشخص الذي يقدم الطلب مخول للقيام بهذا الإجراء
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'password' => 'sometimes|string|min:8|confirmed',
            // أضف قواعد التحقق الأخرى حسب الحاجة وتأكد من التحقق من الحالات الخاصة مثل تحديث البريد الإلكتروني
        ];
    }
}
