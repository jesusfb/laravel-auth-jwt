<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatModel;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ApiHelpers;
use Illuminate\Support\Facades\Storage;
use App\Helpers\JWTHelpers;
use Exception;

/**
 * 
 * @OA\Post(
 * path="/api/login",
 * summary="Sign in",
 * description="Login by username and password result jwt token",
 * operationId="authLogin",
 * tags={"Auth"},
 * @OA\RequestBody(
 *    required=true,
 *    description="Pass user credentials",
 *    @OA\JsonContent(
 *       required={"string","password"},
 *       @OA\Property(property="username", type="string", format="string", example="yourname"),
 *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
 *    ),
 * ),
 * @OA\Response(
 *    response=200,
 *    description="Success login",
 *    @OA\JsonContent(
 *       @OA\Property(property="status", type="int", example="200"),
 *       @OA\Property(property="message", type="string", example="Success"),
 *       @OA\Property(property="data", type="string", example="Token"),
 *        )
 *     )
 * )
 * 
 * @OA\GET(
 * path="/api/candidat",
 * summary="getAllData",
 * description="Get All Data Candidat",
 * operationId="getAllData",
 * tags={"Candidat"},
 * security={ {"bearerAuth": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="status", type="int", example="200"),
 *       @OA\Property(property="message", type="string", example="Success"),
 *       @OA\Property(property="data", type="array", @OA\Items(type="object", example="...")),
 *        )
 *     )
 * ),
 * 
 * @OA\GET(
 * path="/api/candidat/{id}",
 * summary="showDetail",
 * description="Show Detail Data",
 * operationId="showDetail",
 * tags={"Candidat"},
 * @OA\Parameter(
 *   description="Parameter id candidat",
 *   in="path",
 *   name="id",
 *   required=true,
 *   @OA\Schema(type="integer"),
 *   @OA\Examples(example="int", value="1", summary="An int value."),
 *  ),
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="status", type="int", example="200"),
 *       @OA\Property(property="message", type="string", example="Success"),
 *       @OA\Property(property="data", type="object", example="...")),
 *        )
 *     )
 * )
 * 
 *  @OA\Post(
 *  path="/api/candidat/create",
 *  summary="createCandidat",
 *  description="Create new candidat",
 *  operationId="createCandidat",
 *  tags={"Candidat"},
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="education",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="birthday",
 *                     type="date"
 *                 ),
 *                 @OA\Property(
 *                     property="experience",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                     property="last_position",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="applied_position",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="skills",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="phone",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                     property="resume",
 *                     type="file"
 *                 ),
 *                 example={"name": "Jessica Smith", "education": "SMK Bandung", "birthday": "2000-04-12", "experience": 5, "last_position": "CEO", "applied_position": "Senior Developer", "skills": "PHP,Java,Mysql,Javascript", "email": "andrian@gmail.com", "phone": 08123456789, "resume": "file.pdf"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *       @OA\JsonContent(
 *          @OA\Property(property="status", type="int", example="200"),
 *          @OA\Property(property="message", type="string", example="Success created candidat"),
 *          @OA\Property(property="data", type="object", example="...")),
 *        )
 *     )
 * )
 * 
 * 
 *  @OA\Post(
 *  path="/api/candidat/{id}",
 *  summary="editCandidat",
 *  description="Edit data candidat",
 *  operationId="editCandidat",
 *  tags={"Candidat"},
 *  @OA\Parameter(
 *   description="Parameter id candidat",
 *   in="path",
 *   name="id",
 *   required=true,
 *   @OA\Schema(type="integer"),
 *   @OA\Examples(example="int", value="1", summary="An int value."),
 *  ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="name",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="education",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="birthday",
 *                     type="date"
 *                 ),
 *                 @OA\Property(
 *                     property="experience",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                     property="last_position",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="applied_position",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="skills",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="email",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="phone",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                     property="resume",
 *                     type="file"
 *                 ),
 *                 example={"name": "Jessica Smith", "education": "SMK Bandung", "birthday": "2000-04-12", "experience": 5, "last_position": "CEO", "applied_position": "Senior Developer", "skills": "PHP,Java,Mysql,Javascript", "email": "andrian@gmail.com", "phone": 08123456789, "resume": "file.pdf"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *       @OA\JsonContent(
 *          @OA\Property(property="status", type="int", example="200"),
 *          @OA\Property(property="message", type="string", example="Success updated candidat"),
 *          @OA\Property(property="data", type="string", example="null")),
 *        )
 *     )
 * )
 * 
 * @OA\DELETE(
 * path="/api/candidat/{id}",
 * summary="deleteCandidat",
 * description="Delete Data Candidat",
 * operationId="deleteCandidat",
 * tags={"Candidat"},
 * @OA\Parameter(
 *   description="Parameter id candidat",
 *   in="path",
 *   name="id",
 *   required=true,
 *   @OA\Schema(type="integer"),
 *   @OA\Examples(example="int", value="1", summary="An int value."),
 *  ),
 * @OA\Response(
 *    response=200,
 *    description="Success",
 *    @OA\JsonContent(
 *       @OA\Property(property="status", type="int", example="200"),
 *       @OA\Property(property="message", type="string", example="Success deleted candidat"),
 *       @OA\Property(property="data", type="string", example="null")),
 *        )
 *     )
 * ) 
 * 
 **/


class ApiController extends Controller
{
    public function index()
    {
        try {
            $data = CandidatModel::all();

            if ($data) {
                return ApiHelpers::resApi(200, 'Success', $data);
            } else {
                return ApiHelpers::resApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }

    public function show($id)
    {
        try {
            // Get data by id from DB
            $data = CandidatModel::find($id);

            if ($data) {
                // Set full url for asset resume
                $data['resume'] = asset('storage/' . $data['resume']);

                return ApiHelpers::resApi(200, 'Success', $data);
            } else if ($data === null) {
                return ApiHelpers::resApi(404, 'Candidat not found');
            } else {
                return ApiHelpers::resApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            // Validation rules
            $validateData = $request->validate([
                'name' => 'required',
                'education' => 'required',
                'birthday' => 'required|date',
                'experience' => 'required',
                'last_position' => 'required',
                'applied_position' => 'required',
                'skills' => 'required',
                'email' => 'required|email',
                'phone' => 'required|max_digits:18|numeric',
                'resume' => 'required|file|max:2048|mimetypes:application/pdf',
            ]);

            // Store image in storage folder
            $validateData['resume'] = $request->file('resume')->store('uploads');

            // Get and implode skills if array
            $skills = '';
            if (isset($validateData['skills'])) {
                if (is_array($validateData['skills'])) {
                    $skills = implode(',', $validateData['skills']);
                } else {
                    $skills = $validateData['skills'];
                }

                // Add skills to array $validateData
                $validateData['skills'] = $skills;
            }

            // Insert to DB
            $data = CandidatModel::create($validateData);

            if ($data) {
                // Set full url for asset resume
                $data['resume'] = asset('storage/' . $data['resume']);

                return ApiHelpers::resApi(200, 'Success created candidat', $data);
            } else {
                return ApiHelpers::resApi(400, 'Failed', $data);
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Get data by id from DB
            $dataCandidat = CandidatModel::find($id);

            // If data not found
            if ($dataCandidat === null) {
                return ApiHelpers::resApi(404, 'Candidat not found');
            }

            // Check if file resume exist
            $resumeRules = '';
            if ($request->file('resume')) {
                $resumeRules = 'file|max:2048|mimetypes:application/pdf';
            }

            // Validation rules
            $validateData = $request->validate([
                'name' => 'required',
                'education' => 'required',
                'birthday' => 'required|date',
                'experience' => 'required',
                'last_position' => 'required',
                'applied_position' => 'required',
                'skills' => 'required',
                'email' => 'required|email',
                'phone' => 'required|max_digits:18|numeric',
                'resume' => $resumeRules,
            ]);

            // Store image in storage folder
            if ($request->file('resume')) {
                $validateData['resume'] = $request->file('resume')->store('uploads');
            }

            // Get and implode skills if array
            $skills = '';
            if (isset($validateData['skills'])) {
                if (is_array($validateData['skills'])) {
                    $skills = implode(',', $validateData['skills']);
                } else {
                    $skills = $validateData['skills'];
                }

                // Add skills to array $validateData
                $validateData['skills'] = $skills;
            }

            // Update data from DB
            $data = CandidatModel::where('id', $id)->update($validateData);

            if ($data) {
                return ApiHelpers::resApi(200, 'Success updated candidat');
            } else {
                return ApiHelpers::resApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            // Get data by id from DB
            $data = CandidatModel::find($id);

            // If data not found
            if ($data === null) {
                return ApiHelpers::resApi(404, 'Candidat not found');
            }

            // Check if file resume exist and delete from storage
            if ($data['resume']) {
                Storage::delete($data['resume']);
            }

            // Delete data from DB
            $deleteData = CandidatModel::destroy($id);

            if ($deleteData) {
                return ApiHelpers::resApi(200, 'Success deleted candidat');
            } else {
                return ApiHelpers::resApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }

    public function login(Request $request)
    {
        try {
            // Validate request
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            // Get data user from DB
            $user = UserModel::where('username', $request['username'])->first();

            // Check username and password
            if ($user) {
                if (Hash::check($request['password'], $user['password'])) {
                    // Login success and create token
                    $token = JWTHelpers::encode($user['id'], $user['username'], $user['role']);

                    return ApiHelpers::resApi(200, 'Success', $token);
                }
            }

            return ApiHelpers::resApi(400, 'Username an password not match');
        } catch (Exception $error) {
            return ApiHelpers::resApi(400, $error->getMessage());
        }
    }
}
