<!DOCTYPE html>
<html>
<head>
    <title>Profile Image Upload</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Upload Profile Image
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Select Profile Image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">
                            Upload Image
                        </button>
                    </form>

                    @error('proflie_image')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                    
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>