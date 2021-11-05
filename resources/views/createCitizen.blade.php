@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Citizen') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('createCitizen') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select id="gender" name="gender"  class="form-control">
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="State" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select id="state_id" name="state_id"  class="form-control">
                                    <option value="">...Select State...</option>
                                    @foreach ($collection as $item)
                                        <option value={{$item->id}}>{{$item->name}}</option>
                                    @endforeach
                                </select>

                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Lga" class="col-md-4 col-form-label text-md-right">{{ __('Lga') }}</label>

                            <div class="col-md-6">
                                <select id="lga_id" name="lga_id"  class="form-control">
                                    <option value="">...Select Lga...</option>
                                </select>

                                @error('lga_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="Ward" class="col-md-4 col-form-label text-md-right">{{ __('Ward') }}</label>

                            <div class="col-md-6">
                                <select id="ward_id" name="ward_id"  class="form-control">
                                    <option value="">Select Ward</option>
                                </select>

                                @error('ward_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('#state_id').change(function() {
            let stateId = $(this).val();
            $.ajax({ 
                url: "/citizen/state/"+stateId,
                type: "GET",
                success: function (response) {
                    if (response.data.length !== 0) {
                        var selectElem = $("#lga_id");
        
                        $.each(response.data, function(index, value){
                            console.log(value.id);
                            $("<option/>", {
                                value: value.id,
                                text: value.name
                            }).appendTo(selectElem);
                        });
                    } 
                }
		    });
        });

        $('#lga_id').change(function() { 
            let lgaId = $(this).val();
            $.ajax({ 
                url: "/citizen/lga/"+lgaId,
                type: "GET",
                success: function (response) {
                    if (response.data.length !== 0) {
                        var selectElem = $("#ward_id");
        
                        $.each(response.data, function(index, value){
                            console.log(value.id);
                            $("<option/>", {
                                value: value.id,
                                text: value.name
                            }).appendTo(selectElem);
                        });
                    } 
                }
		    });
        });
    });
</script>
@endsection