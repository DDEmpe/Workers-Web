@extends ('landing.layouts.mains')
@section('container')
    {{-- @dd($company_categories) --}}
    <div class="main-body">
        {{-- BREADCRUMB --}}
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/profile">{{ auth()->user()->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
            </ol>
        </nav>
        {{-- Breadcrumb --}}

        <form action="edit" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="rounded-circle" style="width: 15vw; height: 15vw; overflow: hidden;">
                                    <img src="{{ $user->profile_img }}" alt="Admin" style="width:100%; height:auto">
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="profile_img" class="form-label">Edit Foto Profil</label>
                                    <input type="hidden" name="oldprofile_img" value="{{ $user->profile_img }}">
                                    <input class="form-control form-control-sm" name="profile_img" id="profile_img"
                                        type="file">
                                </div>

                                <div class="mt-3">
                                    <h4>{{ $user->name }}</h4>
                                    <p class="text-secondary mb-1">
                                        {{ $user->company_detail->company_category->company_category_name }}</p>
                                    <div>

                                    </div>
                                    <p class="text-muted font-size-sm">{{ $user->address }}</p>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path
                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                            </path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">{{ $user->company_detail->website }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-twitter me-2 icon-inline text-info">
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">{{ $user->company_detail->twitter }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">{{ $user->company_detail->instagram }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">{{ $user->company_detail->facebook }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" value="3" name="status_id">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $user->name) }}" name="name">
                                    @error('name')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Company Category</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <select class="form-select" name="company_category_id" id='showform'>
                                        @foreach ($company_categories as $category)
                                            @if ($user->company_detail->company_category->id == $category->id)
                                                <option value="{{ $category->id }}" selected>
                                                    {{ $category->company_category_name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">
                                                    {{ $category->company_category_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email', $user->email) }}" name="email">
                                    @error('email')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $user->telephone) }}" name="telephone">
                                    @error('phone')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control  @error('address') is-invalid @enderror"
                                        value="{{ old('address', $user->address) }}" name="address">
                                    @error('address')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Facebook</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                                        value="{{ old('facebook', $user->company_detail->facebook) }}" name="facebook">
                                    @error('facebook')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Twitter</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                                        value="{{ old('twitter', $user->company_detail->twitter) }}" name="twitter">
                                    @error('twitter')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Website</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('Website') is-invalid @enderror"
                                        value="{{ old('Website', $user->company_detail->website) }}" name="website">
                                    @error('Website')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Instagram</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control @error('Instagram') is-invalid @enderror"
                                        value="{{ old('Instagram', $user->company_detail->instagram) }}"
                                        name="instagram">
                                    @error('Instagram')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Google maps iframe</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <textarea class="form-control @error('googlemaps') is-invalid @enderror"
                                        name="googlemaps"
                                        rows="3">{{ old('googlemaps', $user->company_detail->googlemaps) }}</textarea>
                                    @error('googlemaps')
                                        <div class="invlalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <h6 class="mb-0">Tentang Company</h6>
                                <input id="description" type="hidden" name="description"
                                    Value="{{ old('description', $user->description) }}">
                                <trix-editor input="description"></trix-editor>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <small class="text-muted">
                                    Penjelasan Singkat Tentang Company
                                </small>
                            </div>

                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
