@extends('admin.admin_master')

@section('admin')
    <div class="sl-mainpanel">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>All Product</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Product List
                    <a href="{{route('add.product')}}" class="btn btn-sm btn-info" style="float: right;">Add Product</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Product Code</th>
                                <th class="wd-15p">Product Name</th>
                                <th class="wd-15p">Category</th>
                                <th class="wd-15p">Sub Category</th>
                                <th class="wd-15p">Brand</th>
                                <th class="wd-15p">Quantity</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-20p">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $row)
                            <tr>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->product_name }}</td>
                                <td>{{ $row->category->category_name }}</td>
                                <td>{{ $row->subcategory->subcategory_name }}</td>
                                <td>{{ $row->brand->brand_name }}</td>
                                <td>{{ $row->product_quantity }}</td>
                                <td>
                                    @if ($row->status == 1)
                                      <span class="badge badge-success">Active</span>  
                                    @else
                                    <span class="badge badge-danger">Inactive</span>  
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ URL::to('admin/edit/product/' . $row->id) }} "
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ URL::to('/admin/delete/product/' . $row->id) }}"
                                        class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-mainpanel -->
    @endsection
