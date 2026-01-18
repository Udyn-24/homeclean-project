namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->role === 'admin';
    }
    
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_hour' => 'required|numeric|min:0',
            'duration_hours' => 'required|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ];
    }
}