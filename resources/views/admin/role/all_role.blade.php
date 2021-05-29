@extends('admin.admin_master')
<link href="{{asset('adminbackend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Admin Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Admin List
                <a href="{{route('create.admin')}}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
            </h6>


            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Email</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->phone }}</td>
                                <td><span class="badge btn btn-danger">Setting</span></td>
                                <td>
                                    <a href="{{ URL::to('edit/admin/' . $row->id) }} "
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('delete/admin/' . $row->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div><!-- sl-mainpanel -->

    <script src="{{asset('adminbackend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('adminbackend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminbackend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>

    <script>
        $(function($){
          'use strict';
  
          $('#datatable1').DataTable({
            responsive: true,
            language: {
              searchPlaceholder: 'Search...',
              sSearch: '',
              lengthMenu: '_MENU_ items/page',
            }
          });
        });
      </script>
@endsection
