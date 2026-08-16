<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Http\Requests\StoreserviceRequest;
use App\Http\Requests\UpdateserviceRequest;
use App\Http\Controllers\BaseController;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class ServiceController extends BaseController
{
    private const ICON_IMAGE_PATTERN = '/\.(svg|png|jpe?g|gif|webp)$/i';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('services');
    }

    public function serviceAdmin(){

        return View('Admin.services');
    }

    public function servicelist(){
        $rows = service::all();

        return DataTables::of($rows)
            ->editColumn('image', function ($model) {
                if (empty($model->image)) {
                    return '<span class="admin-table-placeholder">No image</span>';
                }

                $filename = str_replace(':', '_', $model->image);
                $src = e(asset('image/' . $filename));
                $alt = e($model->title ?: 'Service image');

                return '<img src="' . $src . '" alt="' . $alt . '" class="admin-table-thumb">';
            })
            ->editColumn('icon', function ($model) {
                $icon = trim((string) $model->icon);

                if ($icon === '') {
                    return '<span class="admin-table-placeholder">No icon</span>';
                }

                if ($this->isIconImage($icon)) {
                    $src = e($this->iconImageUrl($icon));
                    $alt = e($model->title ?: 'Service icon');

                    return '<span class="admin-service-icon admin-service-icon-image" title="' . e($icon) . '"><img src="' . $src . '" alt="' . $alt . '"></span>';
                }

                if (!$this->isIconClass($icon)) {
                    return '<span class="admin-service-icon" title="' . e($icon) . '"><span class="admin-service-icon-text">' . e(Str::upper(Str::limit($icon, 3, ''))) . '</span></span>';
                }

                return '<span class="admin-service-icon" title="' . e($icon) . '"><i class="' . e($icon) . '"></i></span>';
            })
            ->addColumn('actions', function ($model) {
                return '<div class="table-actions">
                <a href="javascript:void(0)" class="load-modal" title="Edit"
                data-url="' . route('service.modal', ['id' => $model->id]) . '">
                    <i class="fas fa-edit text-primary"></i>
                </a>
                <a href="javascript:void(0)" class="delete" title="Delete"
                data-url="' . route('delete.service', ['id' => $model->id]) . '">
                    <i class=" dripicons-trash text-danger"></i>
                </a>
                </div>';
                        
            })
            ->rawColumns(['image', 'icon', 'actions'])
            ->addIndexColumn()
            ->make(true);
    }

    public function service($id = null){

        $service = $id ? service::findOrFail($id) : null;
        return View('Admin.modals.add_service_modal')->with(['service' => $service]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreserviceRequest $request)
    {

        $filename = null;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);

        }


        $icon = trim((string) $request->icon);
        if ($request->file('icon_image')) {
            $icon = $this->storeIconImage($request->file('icon_image'));
        }
        
    
        service::insertRow([
            'image' => $filename,
            'icon' => $icon,
            'title' => $request->title,
            'description' => $request->description,
            'features' => trim((string) $request->features),
        ]);

        
        return self::response('success', 'Successfully Added New Service!');
    }

    public function delete($id)
    {
        service::deleteById($id);
        return self::response('success', 'Deleted!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateserviceRequest  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = service::findOrFail($id);

        $request->validate([
            'image' => ['nullable'],
            'icon' => [empty($service->icon) ? 'required_without:icon_image' : 'nullable', 'nullable', 'string', 'max:255'],
            'icon_image' => [empty($service->icon) ? 'required_without:icon' : 'nullable', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp'],
            'title' => ['required'],
            'description' => ['required'],
            'features' => ['nullable', 'string'],
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'features' => trim((string) $request->features),
        ];

        $icon = trim((string) $request->icon);
        if ($request->file('icon_image')) {
            $data['icon'] = $this->storeIconImage($request->file('icon_image'));
        } elseif ($icon !== '') {
            $data['icon'] = $icon;
        }

        if($request->file('image')){
            $file = $request->file('image');
            $data['image'] = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('image'), $data['image']);
        }

        service::updateById($id, $data);

        return self::response('success', 'Successfully Updated Service!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(service $service)
    {
        //
    }

    private function storeIconImage($file): string
    {
        $directory = 'service-icons';
        $destination = public_path('image/' . $directory);

        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = strtolower($file->getClientOriginalExtension());
        $filename = date('YmdHi') . '-' . Str::slug($name) . '-' . Str::random(6) . '.' . $extension;

        $file->move($destination, $filename);

        return $directory . '/' . $filename;
    }

    private function isIconImage(string $icon): bool
    {
        $path = parse_url($icon, PHP_URL_PATH) ?: $icon;

        return (bool) preg_match(self::ICON_IMAGE_PATTERN, $path);
    }

    private function isIconClass(string $icon): bool
    {
        return (bool) preg_match('/^(flaticon-|fa[srbld]?\s|fa-|mdi\s|mdi-|uil\s|uil-|dripicons-|ti-|bx\s|bx-|la\s|la-|icon-)/i', $icon);
    }

    private function iconImageUrl(string $icon): string
    {
        if (Str::startsWith($icon, ['http://', 'https://', '/'])) {
            return $icon;
        }

        return asset('image/' . str_replace(':', '_', $icon));
    }
}
