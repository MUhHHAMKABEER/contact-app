@extends('layouts.main')

@section('title', 'Contacts APP | All Contacts')

@section('content')
    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Contacts</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('contacts.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i>
                                        Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($messege = session('messege'))
                                @include('contacts._alerts')
                            @endif
                            @include('contacts._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $contact->first_name }}</td>
                                            <td>{{ $contact->last_name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->company->name }}</td>
                                            <td width="150">
                                                <a href="{{ route('contacts.show', $contact->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                        class="fa fa-eye fa-lg"></i></a>
                                                <a href="{{ route('contacts.edit', $contact->id) }}"
                                                    class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                                        class="fa fa-edit fa-lg"></i></a>
                                                <a href="{{ route('contacts.destroy', $contact->id) }}"
                                                    class="btn-delete btn btn-sm btn-circle btn-outline-danger"
                                                    title="Delete"><i class="fa fa-times fa-lg"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @include('contacts._modal')

                                    </form>
                                </tbody>
                            </table>

                            <div>
                                {{ $contacts->appends(request()->only('compant_id','search'))->links() }}
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
