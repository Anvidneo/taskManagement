<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function project(): HasMany{
        return $this->hasMany(Projects::class);
    }

    public function validateCredential($request){
        $validate = true;
        $email = $request->post('email');
        $password = $request->post('password');
        
        $user = User::where(['email' => $email])->get();
        if (!$user && !Hash::check($password, $this->user()->password)) {
            $validate = false;
        }

        return $validate;
    } 

    public function createUser(array $data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user ? true : false;
    } 

    public function allUsers(){
        $users =  User::all();

        return $users;
    } 
}
