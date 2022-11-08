<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PostsProject;
use App\Models\Student;
use App\Models\Academic;
use App\Models\ApplyProject;
use App\Models\Requests;
use App\Models\Team;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $posts = PostsProject::paginate(9);
        return view('welcome', compact('posts'));
    }

    public function universityNetwork()
    {
        $users = User::all()->count();
        return view('universityNetwork', compact('users'));
    }

    public function postProject()
    {
        $careers = Career::all();
        return view('postProject')->with('careers', $careers);
    }

    public function addPostProject(Request $request)
    {
        $request['user_id'] = Auth::id();
        $request['tags'] = null;
        $project = $request->all();
        $filename = "";

        if ($request->hasFile('image')) {
            $file = Arr::get($request, 'image');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('image')->move("uploads/projects", $filename);
            $project['image'] = $filename;
        }

        $filename = "";

        if ($request->hasFile('document')) {
            $file = Arr::get($request, 'document');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('document')->move("uploads/projects", $filename);
            $project['document'] = $filename;
        }


        PostsProject::create($request->all());
        return redirect('/postProject')->with('message', 'Guardado con exito.')->with('typealert', 'success');
    }
    public function getProfile()
    {

        $user = Auth::user();
        $careers = Career::all();
        if ($user->student == null) {
            return redirect("/addProfile");
        }

        return view('profile', compact('user'))->with("careers", $careers);
    }
    public function addProfile()
    {
        $user = Auth::user();
        $careers = Career::all();
        return view("addProfile", compact('user'))->with("careers", $careers);
    }


    public function editPostProfile(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', '=',  Auth::id())->first();
        $filename = "";


        if ($request->hasFile('avatar')) {
            $imgPrevial = $user->avatar;
            $file = Arr::get($request, 'avatar');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('avatar')->move("img/avatars", $filename);

            $prevPath = 'img/avatars/' . $imgPrevial;

            if ($imgPrevial) {
                if (file_exists($prevPath)) {
                    unlink('img/avatars/' . $imgPrevial);
                }
            }
            $user['avatar'] = $filename;
        }

        $filename = "";



        if ($request->hasFile('document')) {
            $docprevial = $user->document;
            $file = Arr::get($request, 'document');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('document')->move("img/avatars", $filename);

            $prevPath = 'img/avatars/' . $docprevial;

            if ($docprevial) {
                if (file_exists($prevPath)) {
                    unlink('img/avatars/' . $docprevial);
                }
            }
            $user['document'] = $filename;
        }

        $user->save();

        $student = Student::where('user_id', '=',  Auth::id())->first();
        $student->update($data);

        return back()->with('message', 'Se ha guardado exitosamente')->with('typealert', 'success');
    }

    public function editProfileAcademic(Request $request)
    {
        $data = $request->all();
        $user = User::where('id', '=',  Auth::id())->first();
        $filename = "";
        $imgPrevial = $user->avatar;

        if ($request->hasFile('avatar')) {
            $file = Arr::get($request, 'avatar');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('avatar')->move("img/avatars", $filename);

            $prevPath = 'img/avatars/' . $imgPrevial;

            if ($imgPrevial) {
                if (file_exists($prevPath)) {
                    unlink('img/avatars/' . $imgPrevial);
                }
            }
            $user['avatar'] = $filename;
        }


        $filename = "";



        if ($request->hasFile('document')) {
            $docprevial = $user->document;
            $file = Arr::get($request, 'document');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('document')->move("img/avatars", $filename);

            $prevPath = 'img/avatars/' . $docprevial;

            if ($docprevial) {
                if (file_exists($prevPath)) {
                    unlink('img/avatars/' . $docprevial);
                }
            }
            $user['document'] = $filename;
        }


        $user->save();
        $academic = Academic::where('user_id', '=',  Auth::id())->first();
        $academic->update($data);
        return back()->with('message', 'Se ha guardado exitosamente')->with('typealert', 'success');
    }

    public function faq()
    {

        return view('/faq');
    }

    public function myProjects()
    {
        $projects = PostsProject::where('user_id', Auth::id())->get();
        return view('myprojects', compact('projects'));
    }

    public function viewProject($project_id)
    {
        $project = PostsProject::where('id', $project_id)->first();

        $project->tags = json_decode($project->tags);
        // $tags = $project->tags;
        return view('project', compact('project'));
    }

    public function editProject(int $project_id)
    {
        $project = PostsProject::where('id', $project_id)->first();
        $careers = Career::all();

        $project->tags = json_decode($project->tags);

        $project->tags = implode(',', $project->tags);

        return view('editProject', compact('project'))->with('careers', $careers);
    }

    public function editPostProject(Request $request, int $project_id)
    {
        $project = PostsProject::where('id', $project_id)->first();

        $filename = "";
        $imgPrevial = $project->image;

        if ($request->hasFile('image')) {
            $file = Arr::get($request, 'image');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('image')->move("uploads/projects", $filename);

            $prevPath = 'uploads/projects' . $imgPrevial;

            if ($imgPrevial) {
                if (file_exists($prevPath)) {
                    unlink('uploads/projects/' . $imgPrevial);
                }
            }
        }
        $project['image'] = $filename;

        $filename = "";
        $imgPrevial = $project->document;

        if ($request->hasFile('document')) {
            $file = Arr::get($request, 'document');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('document')->move("uploads/projects", $filename);

            $prevPath = 'uploads/projects' . $imgPrevial;

            if ($imgPrevial) {
                if (file_exists($prevPath)) {
                    unlink('uploads/projects/' . $imgPrevial);
                }
            }
        }
        $project['document'] = $filename;
        $project->save();
        return back()->with('message', 'Se ha guardado exitosamente')->with('typealert', 'success');
    }

    public function applyProject(int $project_id)
    {
        $request = new Requests();
        $request->user_id = Auth::id();
        $request->project_id = $project_id;
        $request->status = 1;
        $request->save();
        return back()->with('message', 'Solicitud echa con exito.')->with('typealert', 'success');
    }

    public function acceptRequest($request_id)
    {
        $request = Requests::where('id', $request_id)->first();
        $request->status = 2;
        $accept = new ApplyProject();
        $accept->owner_id = Auth::id();
        $accept->user_id = $request->user_id;
        $accept->project_id = $request->project_id;
        $project = $accept->project->title;
        $team = Team::where('project_id', $request->project_id)->first();

        if ($team == null) {
            $team = new Team();
            $team->owner_id = Auth::id();
            $team->user1_id = $request->user_id;
            $team->project_id = $request->project_id;
            $team->save();
            $auth = User::where('id', Auth::id())->first();
            $auth->team_id = $team->id;
            $auth->save();
        } else {
            $team->user2_id = $request->user_id;
            $team->save();
        }

        $user = User::where('id', $request->user_id)->first();
        $user->team_id = $team->id;

        $user->save();
        $accept->save();
        $request->save();


        $user->email = "israelcastro997@gmail.com";
        $name = $user->name;
        $_to = $user->email;

        /*Mail::send('mails.requestAccept', array('name' => $name, 'project' => $project), function ($message) use ($_to) {
            $message->from('myproject@israelcastro.net', 'My Project');

            $message->to($_to)->subject('Solicitud aceptada');
        });*/

        return back()->with('message', 'Miembro aceptado con exito.')->with('typealert', 'success');
    }

    public function getApplycants(int $project_id)
    {
        $requests = Requests::where('Project_id', $project_id)->where('status', 1)->get();
        return view('applycants')->with('requests', $requests);
    }

    public function team()
    {
        $team = Team::where('id', Auth::user()->team_id)->first();
        return view('team', compact('team'));
    }

    public function viewProfileAcademic($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('viewProfileAcademic', compact('user'));
    }
    public function viewProfile($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('viewProfile', compact('user'));
    }

    public function session()
    {
        Auth::logout();
        return redirect('/');
    }
    public function getProfileAcademic()
    {
        $user = Auth::user();
        if ($user->academic == null) {
            return redirect("/addProfile");
        }

        return view('profileAcademic', compact('user'));
    }

    public function addProfileStudent(Request $request)
    {
        $request["user_id"] = Auth::id();
        $user = User::where('id', '=',  Auth::id())->first();
        $filename = "";

        if ($request->hasFile('avatar')) {
            $file = Arr::get($request, 'avatar');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('avatar')->move("img/avatars", $filename);
        }
        $user['avatar'] = $filename;
        $user->save();
        Student::create($request->all());
        return redirect("/profile")->with('message', 'Se ha guardado exitosamente')->with('typealert', 'success');
    }

    public function addProfileAcademic(Request $request)
    {
        $request["user_id"] = Auth::id();
        $user = User::where('id', '=',  Auth::id())->first();
        $filename = "";

        if ($request->hasFile('avatar')) {
            $file = Arr::get($request, 'avatar');
            $filename =  Str::random(4) . "-" . $file->getClientOriginalName();
            $request->file('avatar')->move("img/avatars", $filename);
        }
        $user['avatar'] = $filename;
        $user->save();
        Academic::create($request->all());

        return redirect("/profileAcademic")->with('message', 'Se ha guardado exitosamente')->with('typealert', 'success');
    }

    public function deletProfileAcademic()
    {
        $academic = Academic::where('user_id', '=',  Auth::id())->first();

        $academic->delete($academic);

        return redirect("/")->with('message', 'Se ha eliminado exitosamente')->with('typealert', 'success');
    }

    public function deletProfileStudent()
    {
        $student = Student::where('user_id', '=',  Auth::id())->first();

        $student->delete($student);

        return redirect("/")->with('message', 'Se ha eliminado exitosamente')->with('typealert', 'success');
    }

    public function deletAccount(Request $request)
    {
        $user = User::where('id', '=', Auth::id())->first();

        $user->delete($user);

        return redirect("/")->with('message', 'La cuenta ha sido eliminada exitosamente')->with('typealert', 'success');
    }


    public function search(Request $request)
    {
        $users = User::all()->count();
        $search = trim($request->get('search'));

        $students = Student::where('paternal_surname_student', 'LIKE', '%' . $search . '%')
            ->orWhere('maternal_surname_student', 'LIKE', '%' . $search . '%')->orWhere('name_student', 'LIKE', '%' . $search . '%')
            ->orderBy('paternal_surname_student', 'asc')
            ->paginate(10);

        return view('universityNetwork', compact('students', 'search', 'users'));
    }

    public function addAcademic()
    {
        $academics = Academic::all();
        return view('addAcademic', compact('academics'));
    }

    public function addPostAcademic(int $user_id)
    {
        $user = Auth::user();
        $team = Team::where('id', $user->team_id)->first();
        $team->advisor_id = $user_id;
        $team->save();
        return redirect("/team")->with('message', 'El Acesor se ha agregado exitosamente')->with('typealert', 'success');
    }
}
