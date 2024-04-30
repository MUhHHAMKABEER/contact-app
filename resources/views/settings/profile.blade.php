 @extends('layouts.main')

@section('title', 'Contact | Setting | Edit Profile')

@section('content')
    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Settings
                        </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action active">Profile</span></a>
                            <a href="#" class="list-group-item list-group-item-action">Account</span></a>
                            <a href="#" class="list-group-item list-group-item-action">Import & Export</span></a>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->


                <div class="col-md-9">
                    @if ($messege = session('messege'))
                        @include('contacts._alerts')
                    @endif
                    <form action="{{ route('setting.profile.update') }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card">
                            <div class="card-header card-title">
                                <strong>Edit Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" value="{{ old('first_name', $user->first_name) }}"
                                                name="first_name" id="first_name"
                                                class="form-control @error('first_name') is-invalid @enderror">
                                            @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" value="{{ old('last_name', $user->last_name) }}"
                                                name="last_name" id="last_name"
                                                class="form-control @error('last_name') is-invalid @enderror">
                                            @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" value="{{ old('company', $user->company) }}"
                                                name="company" id="company"
                                                class="form-control @error('company') is-invalid @enderror">

                                        </div>

                                        <div class="form-group">
                                            <label for="bio">Bio</label>
                                            <textarea value="{{ old('bio', $user->bio) }}" name="bio" id="biod" rows="3"
                                                class="form-control @error('bio') is-invalid @enderror"></textarea>

                                        </div>
                                    </div>
                                    <div class="offset-md-1 col-md-3">
                                        <div class="form-group">
                                            <label for="bio">Profile picture</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new img-thumbnail"
                                                    style="width: 150px; height: 150px;">
                                                    <img src="{{ $user->profileUrl() }}" alt=".why.">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists img-thumbnail"
                                                    style="max-width: 150px; max-height: 150px;"></div>
                                                <div class="mt-2">
                                                    <span class="btn btn-outline-secondary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="profile_picture" accept="image/*">
                                                        <!-- Make sure to give a proper name to the input -->
                                                    </span>
                                                    <a href="#" class="btn btn-outline-secondary fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>

                                            </div>
                                            @error('profile_picture')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <button type="submit" class="btn btn-success">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection





