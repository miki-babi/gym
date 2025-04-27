<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create');
    }

    // Store a newly created user in storage
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string',
            'password' => 'required|string|min:8',
            'role' => 'required|in:Admin,Customer,Employee,Trainer',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
        // dd($validatedData);
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        // Generate QR code using gym ID
        $gymid = 'member' . $user->id;
        $directoryPath = storage_path("app/public/qrcodes");
        $filePath = $directoryPath . "/$gymid-qrcode.png";

        // Check if the directory exists, if not, create it
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        QrCode::format('png')->size(300)->generate("https://example.com?$gymid", $filePath);

        // Set the QR code path
        $qrCodePath = "public/qrcodes/$gymid-qrcode.png";

        // Update user with QR code path
        User::where('id', $user->id)->update(['QRCodePath' => $qrCodePath]);

        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phoneNumber' => 'nullable|string|max:15',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified user from storage
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
