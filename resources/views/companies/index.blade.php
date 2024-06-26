@extends('layouts.main')

@section('title', 'Contacts APP | All Companies')

@section('content')
    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Companies</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('companies.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i>
                                        Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($messege = session('messege'))
                                @include('companies._alerts')
                            @endif
                            @include('companies._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contacts</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->contacts->count() }}</td>
                                            <td width="150">
                                                <a href="{{ route('companies.show', $company->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                        class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('companies.edit', $company->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                                        class="fa fa-edit fa-lg"></i></a>
                                                <a href="{{ route('companies.destroy', $company->id) }}"
                                                    class="btn-delete btn btn-sm btn-circle btn-outline-danger"
                                                    title="Delete"><i class="fa fa-times fa-lg"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @include('companies._modal')

                                    </form>
                                </tbody>
                            </table>

                            <div>
                                {{ $companies->appends(request()->only('company_id','search'))->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
<style>

</style>
