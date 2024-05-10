<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreUploadRequest;
    use App\Http\Requests\UpdateUploadRequest;
    use App\Models\Upload;
    use Carbon\Carbon;
    use File;
    use http\Env\Request;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Response;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;
    use MongoDB\Driver\Server;
    use Storage;

    class UploadController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            return view('Models.Upload.index')->with([
                'uploads' => Upload::orderBy('created_at', 'DESC')->paginate(20),
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param StoreUploadRequest $request
         * @return RedirectResponse
         */
        public function store(StoreUploadRequest $request)
        {
            /**
             * @var  UploadedFile $file
             */
            $file = $request->validated()['file'];
            $extension = $file->extension();
            $fileName = Str::slug($file->getClientOriginalName());
            $fileName = Str::substr($fileName, 0, -strlen($extension));
            $data = [
                'description' => $request->get('description', ''),
                'alt' => $request->get('alt', ''),
            ];
            if (str_starts_with($file->getMimeType(), 'image')) {
                $image = Image::make($file);
                $data['width'] = $image->width();
                $data['height'] = $image->height();
            }
            $backup = $fileName;
            while (Upload::where('file_name', "$fileName.$extension")->exists()) {
                static $i = 0;
                $i++;
                $fileName = $backup . "_$i";
            }
            $fileName .= ".$extension";
            $path = implode('/', [config('app.upload_url'), Carbon::now()->format('Y/m')]);
            $file->move($path, $fileName);
            $data['file_name'] = $fileName;
            $data['url'] = url(implode('/', [$path, $fileName]));

            $upload = (new Upload($data))->save();
            return redirect()->back();
        }

        /**
         * Display the specified resource.
         *
         * @param Upload $upload
         * @return Response
         */
        public function show(Upload $upload)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Upload $upload
         * @return Response
         */
        public function edit(Upload $upload)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param UpdateUploadRequest $request
         * @param Upload $upload
         * @return Response
         */
        public function update(UpdateUploadRequest $request, Upload $upload)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Upload $upload
         * @return RedirectResponse
         */
        public function destroy(Upload $upload)
        {
            if (File::exists(public_path($upload->getPath())) && File::delete(public_path($upload->getPath())) && $upload->delete()) {
                session()->flash('success', 'File eliminato con successo.');
            } else {
                session()->flash('error', 'Impossibile eliminare il file.');
            }
            return redirect()->back();
        }
    }
