@extends('layouts.app')

@push('scripts')

<script>
    var file = document.getElementById('file');
    file.onchange = function() {
        if(file.files.length > 0) {
            document.getElementById('file-name').innerHTML = file.files[0].name;
        }
    }
</script>

@endpush

@section('content')
    <div class="columns">
        @push('nav-menu')
            @include('trips._sidebar', ['trip' => $trip])
        @endpush

        <div class="column">
            <h1 class="title">{{ __('Add a Person') }}</h1>

            @include('layouts.flash')

            <form action="{{ route('trips.people.store', $trip) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="file has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image" id="file">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fa fa-upload"></i>
                            </span>
                            <span class="file-label">
                                Choose a photo...
                            </span>
                        </span>
                        <span class="file-name" id="file-name">
                            ...
                        </span>
                    </label>
                </div>

                @include('trips.people._form')

                <button type="submit" class="button is-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection