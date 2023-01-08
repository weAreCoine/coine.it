<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreUploadRequest;
    use App\Http\Requests\UpdateUploadRequest;
    use App\Models\Upload;
    use Illuminate\Http\Response;

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
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \App\Http\Requests\StoreUploadRequest $request
         * @return Response
         */
        public function store(StoreUploadRequest $request)
        {
            //
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
