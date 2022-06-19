<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Assignment 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light bg-gradient">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-md-12">
                @if (session('status'))
                    <div class="alert alert-success mt-3">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mt-3">
                    <div class="card-header">Form TP1</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('module.personal', ['id' => 1]) }}"
                            class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full name</label>
                                <input type="text" name="fullName"
                                    class="form-control @error('fullName') is-invalid @enderror">
                                @error('fullName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 pe-lg-1">
                                    <div class="mb-3">
                                        <label for="placeOfBirth" class="form-label">Place of Birth</label>
                                        <input type="text" name="placeOfBirth"
                                            class="form-control @error('placeOfBirth') is-invalid @enderror">
                                        @error('placeOfBirth')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 ps-lg-1">
                                    <div class="mb-3">
                                        <label for="dateOfBirth" class="form-label">Date of Birth</label>
                                        <input type="date" name="dateOfBirth"
                                            class="form-control @error('dateOfBirth') is-invalid @enderror">
                                        @error('dateOfBirth')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="profilePicture" class="form-label">Profile Picture (Mandatory)</label>
                                <input type="file" name="profilePicture"
                                    class="form-control @error('profilePicture') is-invalid @enderror" accept="image/*">
                                @error('profilePicture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="certificates" class="form-label">Certificates (Optional)</label>
                                <input type="file" name="certificates"
                                    class="form-control @error('certificates') is-invalid @enderror"
                                    accept="application/vnd.rar, application/zip">
                                @error('certificates')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Resume (Optional)</label>
                                <input type="file" name="resume"
                                    class="form-control @error('resume') is-invalid @enderror" accept="application/pdf">
                                @error('resume')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
