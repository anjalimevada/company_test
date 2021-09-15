@extends('admin.layouts.mainlayout')
    @section('style')
    <link href="{{ asset('assets/plugins/bootstrap-table/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    @endsection
    @section('content')
    
        <!-- Start content -->
        <div class="content">
             <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="container-fluid">
                        <div class="page-header">
                            <h3 class="page-title">Companies</h3>
                            <div class="page-actions mt-4">
                                <a href="{{route('companyRegister')}}" class="btn btn-default"> Add Company</a>
                                <a href="{{ route('adminLogout') }}" class="btn btn-default"> Logout</a>
                            </div>
                        </div>
                        <div class="table-responsive mt-4">    
                        <table id="user_table" 
                            class="table-bordered"
                            data-toggle="tooltip"
                            data-toolbar="#toolbar"
                            data-sort-name="id"
                            data-sort-order="desc"
                            data-url="{{ url('admin/ajax_listing') }}" 
                            data-page-list="[10, 20, 50]"
                            data-page-size="10"
                            data-pagination="true" 
                            data-side-pagination="server"
                            >  
                            <thead>
                                <tr> 
                                    <th data-field="id" data-sortable="true">Id</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="email"> Email </th>
                                    <th data-field="mobile">Mobile</th>
                                    <th data-field="address">Address</th>
                                    <th data-field="website">Website</th>
                                    <th data-field="logo">Logo</th>
                                    <th data-field="is_deleted" data-align="center" data-sortable="true">Status</th>
                                </tr>
                            </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
             </div>
            </div>
        </div>
    @endsection

    @section('script')  
        <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script> 
        <script src="{{ asset('assets/pages/jquery.bs-table.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-table/js/bootstrap-table.min.js') }}"></script>
        <script type="text/javascript">
            var table=$("#user_table");
            $(document).ready(function() {
                table.bootstrapTable({
                    'processing':true,
                    'serverSide':true
                 });
            });
        </script>   
    @endsection
    