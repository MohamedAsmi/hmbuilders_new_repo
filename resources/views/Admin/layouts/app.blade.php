<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('Admin.layouts.head')
@stack('css')

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":true, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
<!-- Begin page -->
<div class="wrapper">

@include('Admin.layouts.left_bar')
    <div class="content-page">
        <div class="content">
        @include('Admin.layouts.top_bar')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                @yield('breadcrumb')
                            </div>
                            <h4 class="page-title">@yield('page-title')</h4>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <script>document.write(new Date().getFullYear())</script>
                        © Copyright All Rights Reserved <a href="https://addonlk.net/">| Developed by Addon IT</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<div id="modal" class="modal fade col-md-8" tabindex="-1" role="dialog" aria-hidden="true"></div>

<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="primary-header-modalLabel">Delete</h4>
                <button type="button" class="btn-close" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form class="form-horizontal" id="ajax-form" method="DELETE">
                <div class="modal-body">
                    @csrf
                    Are your sure want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" data-loading-text="Deleting...">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('Admin.layouts.right_bar')

@include('Admin.layouts.scripts')
@stack('js')
</body>

</html>
