php artisan make:model PasswordResetToken -m
Schema::create('password_reset_tokens', function (Blueprint $table) {
    $table->id();
    $table->string('email')->index();
    $table->string('token');
    $table->timestamp('created_at')->nullable();
});
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token',
    ];

    public $timestamps = false;
}
<!-- resources/views/auth/forgot-password.blade.php -->
<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Send Password Reset Link</button>
</form>
<!-- resources/views/auth/reset-password.blade.php -->
<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" placeholder="Enter your email" required>
    <input type="password" name="password" placeholder="Enter new password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm new password" required>
    <button type="submit">Reset Password</button>
</form>
php artisan make:controller PasswordResetController
namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $token = Str::random(60);

        PasswordResetToken::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        // Send email with the token (You need to set up email configuration)
        Mail::send('emails.password-reset', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Password Reset Link');
        });

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $reset = PasswordResetToken::where('email', $request->email)->where('token', $request->token)->first();

        if (!$reset) {
            return back()->withErrors(['email' => 'Invalid token!']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordResetToken::where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Password has been reset!');
    }
}
use App\Http\Controllers\PasswordResetController;

Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');
<!-- resources/views/emails/password-reset.blade.php -->
<p>Click the link below to reset your password:</p>
<a href="{{ route('password.reset', $token) }}">Reset Password</a>

