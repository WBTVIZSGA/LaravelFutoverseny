<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Versenyzok;
use App\Http\Requests\StoreVersenyzokRequest;
use App\Http\Requests\UpdateVersenyzokRequest;
use App\Http\Resources\VersenyzoResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class VersenyzokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Versenyzok::all();
    }

    public function showByRajtszam($rajtszam)
    {
        $versenyzo = Versenyzok::where('rajtszam', $rajtszam)->first();
        if ($versenyzo == null){
            return response()->json(['message' => 'Nem létezik ilyen verenyző'], 404);
        }
        return $versenyzo;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVersenyzokRequest $request)
    {
        $validator = Validator::make($request->all(),[
            'rajtszam' => 'required|int',
            'nev' => 'required|string',
            'nem' => 'required|string',
            'tavokId' => 'required'
        ], $messages= [
            'required' => "A(z) :attribute kötelező mező"
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $runner = Versenyzok::create([
            'rajtszam' => $request->rajtszam,
            'nev' => $request->nev,
            'szuldatum' => $request->szuldatum,
            'nem' => $request->nem,
            'tavokId' => $request->tavokId,
            'korosztaly' => $request->korosztaly
        ]);

        return "OK";
    }

    public function register(RegisterUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return response()->json($user);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        if (!Auth::attempt($request->only(['email','password']))){
            return response()->json(['message' => 'Credentials do not match'], 401);
        }

        $user = User::where('email', $request->email)->first();

        $user['token'] = $user->createToken('API Token')->plainTextToken;
        return response()->json($user);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return response()->json(['message' => "You have logged out successfully and your token has been removed"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Versenyzok $versenyzok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Versenyzok $versenyzok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Versenyzok $versenyzo)
    {
        $versenyzo->update($request->all());
        return $versenyzo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Versenyzok $versenyzo)
    {
        $versenyzo->delete();
        return response(null, 204);
    }
}
