<?php

namespace App\Http\Controllers;

use App\Models\PersonalAssignment1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PersonalAssignmentController extends Controller
{
    public function index(Request $request, string $id)
    {
        if (!view()->exists("personal.$id")) {
            return abort(404);
        }

        return view("personal.$id");
    }

    public function submit(Request $request, string $id)
    {
        switch ($id) {
            case '1':
                $validatedData = $request->validate([
                    'fullName' => ['required', 'string', 'min:3'],
                    'gender' => ['required', 'string', 'in:male,female,other'],
                    'placeOfBirth' => ['required', 'string', 'min:3'],
                    'dateOfBirth' => ['required', 'date'],
                    'profilePicture' => ['required', 'image'],
                    'certificates' => ['nullable', 'file', 'mimetypes:application/vnd.rar,application/zip'],
                    'resume' => ['nullable', 'file', 'mimetypes:application/pdf'],
                ]);

                $personalAssignment = PersonalAssignment1::create([
                    'fullName' => $validatedData['fullName'],
                    'gender' => $validatedData['gender'],
                    'placeOfBirth' => $validatedData['gender'],
                    'dateOfBirth' => $validatedData['dateOfBirth'],
                ]);

                $attachments = [];

                if (array_key_exists('profilePicture', $validatedData)) {
                    $profilePictureFileName = $validatedData['profilePicture']->hashName();

                    Storage::disk('tmp')->put(
                        $profilePictureFileName,
                        File::get($validatedData['profilePicture']),
                        'public',
                    );

                    $attachments[] = [
                        'name' => 'profilePicture',
                        'path' => Storage::disk('tmp')->path($profilePictureFileName),
                    ];
                }

                if (array_key_exists('certificates', $validatedData)) {
                    $certificatesFileName = $validatedData['certificates']->hashName();

                    Storage::disk('tmp')->put(
                        $certificatesFileName,
                        File::get($validatedData['certificates']),
                        'public',
                    );

                    $attachments[] = [
                        'name' => 'certificates',
                        'path' => Storage::disk('tmp')->path($certificatesFileName),
                    ];
                }

                if (array_key_exists('resume', $validatedData)) {
                    $resumeFileName = $validatedData['resume']->hashName();

                    Storage::disk('tmp')->put(
                        $resumeFileName,
                        File::get($validatedData['resume']),
                        'public',
                    );

                    $attachments[] = [
                        'name' => 'resume',
                        'path' => Storage::disk('tmp')->path($resumeFileName),
                    ];
                }

                $personalAssignment->attachments()->createMany($attachments);
                $personalAssignment->save();

                return back()->with('status', 'Data submitted!');

                break;

            default:
                return abort(404);
                break;
        }
    }
}
