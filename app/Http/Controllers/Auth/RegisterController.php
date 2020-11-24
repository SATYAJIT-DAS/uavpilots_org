<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
 
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     // return User::create([
    //     //     // 'name' => $data['name'],
    //     //     'email' => $data['email'],
    //     //     'password' => Hash::make($data['password']),
    //     // ]);
    //       // dd($data);

    //     DB::beginTransaction();

    //             try {
    //                 // Validate, then create if valid
    //                 $user = User::create([           
    //                     'email' => $data['email'],
    //                     'password' => Hash::make($data['password']),
    //                     'username' => $data['username']
    //                     // 'username' => $data['username'],


    //                 ]);

    //                 // $user->save();

                    
    //                 // dd($user);


    //             } 
    //             catch(ValidationException $e)
    //             {
    //                 // Rollback and then redirect
    //                 // back to form with errors
    //                 DB::rollback();
    //                 return Redirect::to('/register')
    //                     ->withErrors( $e->getErrors() )
    //                     ->withInput();
    //             } 
    //             catch(\Exception $e)
    //             {
    //                 DB::rollback();
    //                 throw $e;
    //             }

    //             try {


    //                 // $user_data = UserData::find(10);

                    




                    

                    


    //                 $user_data = UserData::create([
    //                     // 'user_id' => 1,           
    //                     'first_name' => $data['first_name'],
    //                     'last_name' => $data['last_name'],
    //                     'description' => $data['description'],
    //                     'state' => $data['state'],
    //                     'country' => $data['country'],
    //                     'industry' => $data['industry']
                        
                        
    //                 ]);

    //                 // $user->userData()->associate($user_data);

    //                 // $user->save();

    //                 $user->userData()->save($user_data);




    //                 // $user_data = App\Models\UserData::find(10);

    //                 // $user->userData()->associate($user_data);

    //                 // $user->save();

    //                 // $user = User::find(10);

    //                 // $user_data->user()->associate($user);

    //                 // $user_data->save();


    //                 // $user->address()->associate($address);
    //                 // $user->save();




                    

                    
    //             } 
    //             catch(ValidationException $e)
    //             {
    //                 // Rollback and then redirect
    //                 // back to form with errors
    //                 DB::rollback();
    //                 return Redirect::to('/register')
    //                     ->withErrors( $e->getErrors() )
    //                     ->withInput();
    //             } 
    //             catch(\Exception $e)
    //             {
    //                 DB::rollback();
    //                 throw $e;
    //             }

    //             // If we reach here, then
    //             // data is valid and working.
    //             // Commit the queries!
    //             DB::commit();


    //             return $user;









    // }






        public function create(array $data)
    {
        try {

            // $user = $this->user->fill([
            //     'name' => $request->name,
            //     'email' => $request->email,
            //     'phone_number' => $request->phone_number,
            //     'accept_term' => $request->accept_term,
            //     'password' => Hash::make($request->password),
            // ]);


                $user = User::create([           
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                    'username' => $data['username']
                    // 'username' => $data['username'],


                ]);

                $user_data = UserData::create([
                        // 'user_id' => 1,           
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'description' => $data['description'],
                        'state' => $data['state'],
                        'country' => $data['country'],
                        'industry' => $data['industry']
                        
                        
                    ]);

                $user->userData()->save($user_data);

            return $user;
            
        } catch (\RuntimeException $exception) {
            return ['error' => $exception->getMessage()];
        }
    }





}
