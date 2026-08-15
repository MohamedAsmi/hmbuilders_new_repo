<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BaseController;
use App\Models\contact;
use App\Models\inquire;
use App\Models\ModelProject;
use App\Models\Plan;
use App\Models\PlanImage;
use App\Models\team;
use App\Models\service;
use App\Models\project;
use App\Models\project_image;
class UserController extends BaseController
{
    public function index()
    {
        $projects =project::count();
      
        return view('welcome')->with(['projects'=> $projects]);
    }
    public function about()
    {
        $teams =team::all();
        return view('about')->with(['teams'=> $teams]);

    }
    public function service()
    {
        $services =service::all();
        return View('services')->with(['services'=> $services]);

    }
    public function projects()
    {
        $projects =project::orderBy('id', 'DESC')->paginate(9);
        $projectarrs=[];
        foreach($projects as $project){

            $projectsimage =project_image::where('project_id',$project->id)->first();
            $projectarrs[$project->id]=$project;
            $projectarrs[$project->id]['image'] = $project->cover_image ?: ($projectsimage ? $projectsimage->image : '');
  

        }

        return view('projects')->with(['projectarrs' => $projectarrs,'paginator'=>$projects]);
    }
    public function listprojects($id)
    {

        $projectdetails=project::where('id',$id)->first();
        $projectsimage =project_image::where('project_id',$id)->paginate(100); 
        $projectimage=project_image::where('project_id',$id)->first();
        $coverImage = $projectdetails->cover_image ?: ($projectimage->image ?? '');

        // dd($projectsimage);
        return view('list_projects')->with(['projectarrs' => $projectsimage,'paginator'=>$projectsimage,'projectdetails'=>$projectdetails,'projectimage'=>$projectimage,'coverImage'=>$coverImage]);
    }

    public function plans()
    {

        $projects =Plan::orderBy('id', 'DESC')->paginate(9);
        $projectarrs=[];
        foreach($projects as $project){

            $projectsimage =PlanImage::where('project_id',$project->id)->first();
            $projectarrs[$project->id]=$project;
            $projectarrs[$project->id]['image']=$projectsimage->image ?? '';
  

        }

        return view('plans')->with(['projectarrs' => $projectarrs,'paginator'=>$projects]);
    }

    public function listPlans($id)
    {

        $projectdetails=Plan::where('id',$id)->first();
        $projectsimage =PlanImage::where('project_id',$id)->paginate(100); 
                                        $projectimage=Plan::join('plan_images','plans.id','plan_images.project_id')->where('plans.id',$id)->first();

                // dd($projectsimage);
                return view('list_plans')->with(['projectarrs' => $projectsimage,'paginator'=>$projectsimage,'projectdetails'=>$projectdetails,'projectimage'=>$projectimage]);
    }
    
    public function contact()
    {
        return view('contacts');
    }

    public function savemessage(Request $request){
        $id = contact::insertRow([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
      
        return response()->json(['success' => 'Form submitted successfully.']);

        
    }
    public function saveinquiresmessage(Request $request){

        $id = inquire::insertRow([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'mobile' => $request->mobile,
            'service' => $request->service,
            'message' => $request->message,
        ]);
        return response()->json(['success' => 'Form submitted successfully.']);
        // return redirect()->back();
        
    }
}
