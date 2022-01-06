@extends('admin.layout.base') @section('title', 'Contact Details') @section('data-page-id', 'contactTable') @section('content')
<div class="container-fluid">
    @include('includes.message')
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <h4 class="mt-0 header-title">Contacts Tables</h4>
                        @if(count($contacts))
                        <table class="table table-striped table-bordered" cellspacing="0" width="100%" data-form="deleteForm">
                            <thead>
                                <tr class="titles">
                                    <!-- <th>Id</th> -->
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td class="c-table__cell">{{ $contact['username'] }}</td>
                                    <td class="c-table__cell">{{ $contact['email'] }}</td>
                                    <td class="c-table__cell">{{ $contact['subject'] }}</td>
                                    <td class="c-table__cell">{{ $contact['message'] }}</td>
                                    <td class="c-table__cell">{{ $contact['added'] }}</td>
                                    <td class="c-table__cell">
                                        <!-- deleted size button -->
                                        <div data-toggle="tooltip" data-placement="top" title="Delete size" style="display: inline-block;">
                                            <form method="POST" action="/admin/contact/{{$contact['id']}}/delete" class="delete-item">
                                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}" />
                                                <button type="submit" class="btn-sm btn-danger delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- table end -->
                        <!-- pagination start -->
                        <hr />
                        <ul class="pagination justify-content-end">
                            {!! $links !!}
                        </ul>
                        @else
                        <p>You have not created any size</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content Wrapper -->
    </div>
    <!-- container -->
</div>
@include('includes.delete-model') @endsection
