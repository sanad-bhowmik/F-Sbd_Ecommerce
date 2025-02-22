@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('Comparison Products')}}</h1>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Add Comparison Products')}}</h5>

    </div>

<div class="modal-body">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between responsive-gap">
        <!-- First Dropdown -->
        <div class="form-group flex-grow-1">
            <label for="categoryFilter">{{ translate('Select Category') }}</label>
            <select class="form-control" id="categoryFilter">
                <option value="">{{ translate('Select Product') }}</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- HR with VS text (Center Divider) -->
        <div class="d-flex flex-column align-items-center mx-3">
            <hr class="w-100 border-gray-300 my-2">
            <span class="px-2 text-gray-500 font-bold text-sm">VS</span>
            <hr class="w-100 border-gray-300 my-2">
        </div>

        <!-- Second Dropdown -->
        <div class="form-group flex-grow-1">
            <label for="statusFilter">{{ translate('Select Status') }}</label>
            <select class="form-control" id="statusFilter">
                <option value="">{{ translate('Select Product') }}</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="text-center mt-3">
        <button type="submit" name="button" value="publish"
            class="mx-2 btn btn-success w-230px btn-md rounded-2 fs-14 fw-700 shadow-success action-btn">
            {{ translate('Save & Publish') }}
        </button>
    </div>
</div>

</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection

<style>
    @media (max-width: 768px) {
        .responsive-gap {
            gap: 0px !important; /* Remove gap on small screens */
        }
    }

    @media (min-width: 769px) {
        .responsive-gap {
            gap: 50px !important; /* Large gap on bigger screens */
        }
    }
</style>
