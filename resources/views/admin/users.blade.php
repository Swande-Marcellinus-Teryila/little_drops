@extends('admin-layout.app')

@section("head")
<title>dashboard</title>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<link rel="stylesheet" href="{{asset('assets-admin/css/app.min.css')}}">
<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('assets-admin/bundles/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets-admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets-admin/css/style.css')}}">
<link rel="stylesheet" href="{{asset('assets-admin/css/components.css')}}">
<!-- Custom style CSS -->
<link rel="stylesheet" href="{{asset('assets-admin/css/custom.css')}}">
<link rel='shortcut icon' type='image/x-icon' href='{{asset('assets-admin/img/favicon.ico')}}' />
@endsection
@section("content")

<div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Customers ` </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Total</th>
                        <th>Current Status</th>
                        <th>GO TO  Dashboard</th>
                        <th>Go to Profile</th>
                        <th>Freeze toggle</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>{{$user->username}}</td>
                        <td>23</td>
                        <td>
                          @php
                          $status = "";
                          foreach($user->transaction as $transaction){ 
                          if($transaction->invest==1 && $transaction->cash_out_status==0){
                             $status = "Invest";
                          }
                          if($transaction->cash_out_status==1){
                            $status = "Cash Out";
                          }
                        }
                        echo $status;
                          @endphp  
                           
                        </td>
                        <td><a href="#" class="btn btn-primary">Go to Dashboard</a></td>
                        <td>---</td>
                        <td>kk</td>
                        <td><button class="btn btn-danger">Delete</button></td>
                      </tr>
                      @endforeach
                    
                     
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="settingSidebar">
      <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
      </a>
      <div class="settingSidebar-body ps-container ps-theme-default">
        <div class=" fade show active">
          <div class="setting-panel-header">Setting Panel
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Select Layout</h6>
            <div class="selectgroup layout-color w-50">
              <label class="selectgroup-item">
                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                <span class="selectgroup-button">Light</span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                <span class="selectgroup-button">Dark</span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Sidebar Color</h6>
            <div class="selectgroup selectgroup-pills sidebar-color">
              <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                  data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
              </label>
              <label class="selectgroup-item">
                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                  data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <h6 class="font-medium m-b-10">Color Theme</h6>
            <div class="theme-setting-options">
              <ul class="choose-theme list-unstyled mb-0">
                <li title="white" class="active">
                  <div class="white"></div>
                </li>
                <li title="cyan">
                  <div class="cyan"></div>
                </li>
                <li title="black">
                  <div class="black"></div>
                </li>
                <li title="purple">
                  <div class="purple"></div>
                </li>
                <li title="orange">
                  <div class="orange"></div>
                </li>
                <li title="green">
                  <div class="green"></div>
                </li>
                <li title="red">
                  <div class="red"></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <div class="theme-setting-options">
              <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                  id="mini_sidebar_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Mini Sidebar</span>
              </label>
            </div>
          </div>
          <div class="p-15 border-bottom">
            <div class="theme-setting-options">
              <label class="m-b-0">
                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                  id="sticky_header_setting">
                <span class="custom-switch-indicator"></span>
                <span class="control-label p-l-10">Sticky Header</span>
              </label>
            </div>
          </div>
          <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
            <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
              <i class="fas fa-undo"></i> Restore Default
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('footer_links')
<script src="{{asset('assets-admin/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<script src="{{asset('assets-admin/bundles/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/jszip.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets-admin/bundles/datatables/export-tables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets-admin/js/page/datatables.js')}}"></script>
<!-- Template JS File -->
<script src="{{asset('assets-admin/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('assets-admin/js/custom.js')}}"></script>

@endsection