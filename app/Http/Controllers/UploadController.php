<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreUploadRequest;
    use App\Http\Requests\UpdateUploadRequest;
    use App\Models\Upload;
    use Carbon\Carbon;
    use Illuminate\Http\Response;
    use Illuminate\Http\UploadedFile;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;

    class UploadController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Response
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
         * @param \App\Http\Requests\StoreUploadRequest $request
         * @return \Illuminate\Http\RedirectResponse
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
            while (Upload::where('file_name', $fileName)->exists()) {
                static $i = 0;
                $i++;
                $fileName = $backup . "_$i";
            }
            $fileName .= ".$extension";

            $path = implode('/', [config('app.asset_url'), Carbon::now()->format('Y/m')]);
            $file->move($path, $fileName);
            $data['file_name'] = $fileName;
            $data['url'] = url(implode('/', [$path, $fileName]));

            $upload = (new Upload($data))->save();
            return redirect()->back();
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Models\Upload $upload
         * @return Response
         */
        public function show(Upload $upload)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Models\Upload $upload
         * @return Response
         */
        public function edit(Upload $upload)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \App\Http\Requests\UpdateUploadRequest $request
         * @param \App\Models\Upload $upload
         * @return Response
         */
        public function update(UpdateUploadRequest $request, Upload $upload)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Upload $upload
         * @return Response
         */
        public function destroy(Upload $upload)
        {
            //
        }
    }
